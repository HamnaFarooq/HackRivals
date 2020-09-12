<?php

namespace App\Http\Controllers;

use App\Problem;
use App\Solved_problems;
use Auth;
use Illuminate\Http\Request;

class SolvedProblemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getCorrectSubmissions($request)
    {
        $prob = Problem::find($request->problem_id)->with('test_cases')->first();
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
            $ans = json_decode($response, true)['stdout'];
            //match this ans to case->output
            if ($case->output == $ans) {
                $matches = array_merge($matches, [$num => 'yes']);
            } else {
                $matches = array_merge($matches, [$num => 'no']);
            }
            $num = $num + 1;
        }
        return $matches;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $test_cases = app('App\Http\Controllers\SolvedProblemsController')->getCorrectSubmissions($request);
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

        if ($request->source == 'practice') {
            $go = "/problem/" . $request->problem_id;
        } else {
            $go = "/contest/" . $request->source;
        }

        return view('problem.submit', compact('test_cases', 'points', 'aggregatepoints', 'pointspercent', 'aggregatepointspercent', "total" , 'go'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Solved_problems  $solved_problems
     * @return \Illuminate\Http\Response
     */
    public function show(Solved_problems $solved_problems)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Solved_problems  $solved_problems
     * @return \Illuminate\Http\Response
     */
    public function edit(Solved_problems $solved_problems)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Solved_problems  $solved_problems
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solved_problems $solved_problems)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Solved_problems  $solved_problems
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solved_problems $solved_problems)
    {
        //
    }
}
