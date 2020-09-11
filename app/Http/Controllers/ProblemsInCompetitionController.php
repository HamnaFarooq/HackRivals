<?php

namespace App\Http\Controllers;

use App\Competition;
use App\Problem;
use App\Problems_in_competition;
use Illuminate\Http\Request;

class ProblemsInCompetitionController extends Controller
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
    public function store( $compid , $probid)
    {
        $problem = Problem::where('id', $probid)->first();
        $competition = Competition::where('id', $compid)->first();
        if ($problem && $competition) {
            //get problems in competition where
            $alreadyexist =  Problems_in_competition::where([['competition_id' ,'=', $compid],[ 'problem_id','=', $probid]])->first();
            if($alreadyexist){
                return redirect()->back();
            } else {
                Problems_in_competition::create(['competition_id' => $compid , 'problem_id' => $probid]);
            }
            
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Problems_in_competition  $problems_in_competition
     * @return \Illuminate\Http\Response
     */
    public function show(Problems_in_competition $problems_in_competition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Problems_in_competition  $problems_in_competition
     * @return \Illuminate\Http\Response
     */
    public function edit(Problems_in_competition $problems_in_competition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Problems_in_competition  $problems_in_competition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Problems_in_competition $problems_in_competition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Problems_in_competition  $problems_in_competition
     * @return \Illuminate\Http\Response
     */
    public function destroy($compid, $proid)
    {
        Problems_in_competition::where([['competition_id', '=', $compid], ['problem_id', '=', $proid]])->first()->delete();
        return redirect('/competition/'. $compid .'/edit');
    }
}
