<?php

namespace App\Http\Controllers;
use App\Problem;
use App\Solved_problems;
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
        //check if this problem with this user from same source.
        //get test_cases_met from another function and store it in container to view.
        $data = solved_problems::where([['user_id', '=', Auth::id()], ['source', '=', $request->source]],['problem_id','=',$request->problem_id])->get()->first();
       // if data already exists in database
        if(data)
        {
            //get no of attempts from check and increment it
            $attempts = $request->attempts + 1;
            //if test_cases_met
                if($attempts == 2){
                    $aggregatepoints = $request->aggregated_points - (($request->aggregated_points * 20)/100);
                } elseif($attempts == 3){
                    $aggregatepoints = $request->aggregated_points - (($request->aggregated_points * 30)/100);
                } elseif($attempts == 4){
                    $aggregatepoints = $request->aggregated_points - (($request->aggregated_points * 40)/100);
                } elseif($attempts >= 5){
                    $aggregatepoints = $request->aggregated_points - (($request->aggregated_points * 50)/100);
                } 
                // assign 100% points to user
                $points = $request->points;
            //else
                //aggreagate points =0  
                $aggregatepoints = 0;
                // points are according to no of correct test_cases
 
            $updatedata = [
                'user_id'=>Auth::id(),
                'problem_id'=>$request->problem_id,
                'source'=>$request->source,
                'points_earned'=>$points,
                'aggregated_points'=>$aggregatepoints,
                'solution'=>$request->solution,
                'attempts'=>$attempts,
                'test_cases_met'=>$test_cases_met
            ];
            $data->update($updatedata->all());
        }
        else
        {
            //if test_cases_met
            $aggregatepoints = $request->aggregated_points - (($request->aggregated_points * 10)/100);
             
            //else 
                //aggreagate points =0 
                $aggregatepoints = 0; 
                // points are according to no of correct test_cases

            $insertdata = [
                'user_id'=>Auth::id(),
                'problem_id'=>$request->problem_id,
                'source'=>$request->source,
                'points_earned'=>$points,
                'aggregated_points'=>$aggregatepoints,
                'solution'=>$request->solution,
                'attempts'=>$attempts,
                'test_cases_met'=>$test_cases_met
            ];
            Solved_problems::create($insertdata);
        }
        return redirect('/user_admin');
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
