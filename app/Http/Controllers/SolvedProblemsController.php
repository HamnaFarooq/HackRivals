<?php

namespace App\Http\Controllers;

use App\Problem;
use App\Solved_problems;
use App\User;
use App\Competition_rankings;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;

class SolvedProblemsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function getCorrectSubmissions($request)
    // {
    //     $prob = Problem::where('id',$request->problem_id)->with('test_cases')->first();
    //     $test_cases = $prob->test_cases;
    //     function httpPost($url, $data)
    //     {
    //         $curl = curl_init($url);
    //         curl_setopt($curl, CURLOPT_POST, true);
    //         curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    //         curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    //         $response = curl_exec($curl);
    //         curl_close($curl);
    //         return $response;
    //     }
    //     $matches = [];
    //     $num = 1;
    //     foreach ($test_cases as $case) {
    //         $req = httpPost(
    //             "http://api.paiza.io:80/runners/create",
    //             array("source_code" => $request->solution, "language" => $request->language, "input" => $case->input, "longpoll" => "true", "api_key" => "guest")
    //         );
    //         $res_id = json_decode($req, true)['id'];
    //         $response = file_get_contents("http://api.paiza.io:80/runners/get_details?id=" . $res_id . "&api_key=guest");
    //         dd(json_decode($response, true));
    //         if(json_decode($response, true)['build_stderr'])
    //         {

    //             return redirect('/home');
    //         }
    //         $ans = json_decode($response, true)['stdout'];
    //         $ans = rtrim($ans, "\n");
    //         //match this ans to case->output
    //         if ($case->output == $ans) {
    //             $matches = array_merge($matches, [$num => 'yes']);
    //         } else {
    //             $matches = array_merge($matches, [$num => json_decode($response, true)['stderr'] ]);
    //         }
    //         $num = $num + 1;
    //     }
    //     return $matches;
    // }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'solution' => 'required',
        ])->validate();

        if ($request->source == 'practice') {
            $go = "/problem/" . $request->problem_id;
        } else {
            $go = "/competition/" . $request->source;
        }

        // api function start
        $prob = Problem::where('id', $request->problem_id)->with('test_cases')->first();
        if ($prob->user_id == Auth::id()) {
            $error = 'Creator cannot solve his own problem';
            return redirect('/problem/' . $request->problem_id)->with('error', $error);
        }
        $test_cases = $prob->test_cases;
        function httpPost($url, $data)
        {
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($curl);
            curl_close($curl);
            return $response;
        }
        $matches = [];
        $num = 1;
        foreach ($test_cases as $case) {
            $req = httpPost(
                "http://api.paiza.io:80/runners/create",
                array("source_code" => $request->solution, "language" => $request->language, "input" => $case->input, "longpoll" => "true", "api_key" => "guest")
            );
            $res_id = json_decode($req, true)['id'];
            $response = file_get_contents("http://api.paiza.io:80/runners/get_details?id=" . $res_id . "&api_key=guest");
            // dd(json_decode($response, true));
            $err = json_decode($response, true)['result'];
            if ($err == "faliure" || $err == "") {
                if ($go == "/competition/" . $request->source) {
                    $go = $go . ("/problem/" . $request->problem_id);
                }
                if (json_decode($response, true)['build_stderr']) {
                    $err = json_decode($response, true)['build_stderr'];
                } else if (json_decode($response, true)['stderr']) {
                    $err = json_decode($response, true)['stderr'];
                }
                return view('problem.submit_error', compact('err', 'go')); // to a page that displays the error and returns back. 
            }
            $ans = json_decode($response, true)['stdout'];
            $ans = rtrim($ans, "\n");
            //match this ans to case->output
            if ($case->output == $ans) {
                $matches = array_merge($matches, [$num => 'yes']);
            } else {
                $matches = array_merge($matches, [$num => json_decode($response, true)['stderr']]);
            }
            $num = $num + 1;
        }
        $test_cases = $matches;
        //api function end
        // $test_cases = app('App\Http\Controllers\SolvedProblemsController')->getCorrectSubmissions($request);
        $test_cases_met = 0;
        foreach ($test_cases as $key => $val) {
            if ($val == 'yes') {
                $test_cases_met = $test_cases_met + 1;
            }
        }

        $data = solved_problems::where([['user_id', '=', Auth::id()], ['source', '=', $request->source]], ['problem_id', '=', $request->problem_id])->get()->first();
        // if data already exists in database
        if ($data) {
            //get no of attempts from check and increment it
            $attempts = $data->attempts + 1;
            //if test_cases_met
            if ($test_cases_met == sizeof($test_cases)) {
                if ($attempts == 2) {
                    $aggregatepoints = $request->points - (($request->points * 10) / 100);
                } elseif ($attempts == 3) {
                    $aggregatepoints = $request->points - (($request->points * 20) / 100);
                } elseif ($attempts == 4) {
                    $aggregatepoints = $request->points - (($request->points * 30) / 100);
                } elseif ($attempts == 5) {
                    $aggregatepoints = $request->points - (($request->points * 40) / 100);
                } elseif ($attempts >= 6) {
                    $aggregatepoints = $request->points - (($request->points * 50) / 100);
                }
                // assign 100% points to user
                $points = $request->points;
            } else {
                $aggregatepoints = 0;
                $points = ($request->points / sizeof($test_cases)) * $test_cases_met;
            }
            $updatedata = [
                'user_id' => Auth::id(),
                'problem_id' => $request->problem_id,
                'source' => $request->source,
                'points_earned' => $points,
                'aggregated_points' => $aggregatepoints,
                'solution' => $request->solution,
                'attempts' => $attempts,
                'test_cases_met' => $test_cases_met
            ];
            $data->update($updatedata);
        } else {
            if ($test_cases_met == sizeof($test_cases)) {
                $points = $request->points;
                $aggregatepoints = $request->points;
            } else {
                $aggregatepoints = 0;
                $points = ($request->points / sizeof($test_cases)) * $test_cases_met;
            }
            $attempts = 1;
            $insertdata = [
                'user_id' => Auth::id(),
                'problem_id' => $request->problem_id,
                'source' => $request->source,
                'points_earned' => $points,
                'aggregated_points' => $aggregatepoints,
                'solution' => $request->solution,
                'attempts' => $attempts,
                'test_cases_met' => $test_cases_met
            ];
            Solved_problems::create($insertdata);
        }

        $pointspercent = (($points + 0.05) / $request->points) * 100;
        $aggregatepointspercent = (($aggregatepoints + 0.05) / $request->points) * 100;
        $total = $request->points;
        $id = $request->problem_id;

        return view('problem.submit', compact('test_cases', 'points', 'aggregatepoints', 'pointspercent', 'aggregatepointspercent', "total", 'go', 'id'));
    }


    public function eval(Request $request)
    {
        if (strpos($request->go, 'problem') !== false) {
            // from prob
            // add attempt and solved by to problem id
            $problem = Problem::where('id', $request->problem_id)->first();
            $solved_by = $problem->solved_by;
            if ($problem->points == $request->points) {
                $solved_by = $problem->solved_by + 1;
            }
            $total_attempts = $problem->total_attempts + 1;
            $problem->update(['solved_by' => $solved_by, 'total_attempts' => $total_attempts]);
            // add points and agg points to user from Solved prob table
            $data = Solved_problems::where([['user_id', '=', Auth::id()], ['problem_id', '=', $request->problem_id], ['source', '=', 'practice']])->get();
            $points = 0;
            $aggregate_points = 0;
            foreach ($data as $d) {
                $points = $points + $d->points_earned;
                $aggregate_points = $aggregate_points + $d->aggregated_points;
            }
            $current_date_time = Carbon::now()->toDateTimeString();
            $user = User::where('id', Auth::id())->first();
            $user->update(['points' => $points, 'aggregate_points' => $aggregate_points, 'last_solved_on' => $current_date_time]);
        } else {
            // from comp
            //get competition id from $go and save data in rankings
            $id = str_replace("/competition/", "", $request->go);
            $data = Solved_problems::where([['user_id', '=', Auth::id()], ['problem_id', '=', $request->problem_id], ['source', '=', $id]])->get();
            $points = 0;
            foreach ($data as $d) {
                $points = $points + $d->points_earned;
            }
            //if row already exists
            $exists = Competition_rankings::where([['user_id', '=', Auth::id()], ['competition_id', '=', $id]])->first();
            if ($exists) {
                $exists->update(['points' => $points]);
            } else {
                Competition_rankings::create(['user_id' => Auth::id(), 'competition_id' => $id, 'points' => $points]);
            }
        }
        return redirect($request->go);
    }
}
