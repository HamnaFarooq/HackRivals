<?php

namespace App\Http\Controllers;

use App\Competition;
use App\Problem;
use App\Problems_in_competition;
use Illuminate\Http\Request;

class ProblemsInCompetitionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store( $compid , $probid)
    {
        $problem = Problem::where('id', $probid)->first();
        $competition = Competition::where('id', $compid)->first();
        if ($problem && $competition) {
            //get problems in competition where
            $alreadyexist =  Problems_in_competition::where([['competition_id' ,'=', $compid],[ 'problem_id','=', $probid]])->first();
            if($alreadyexist){
                $error = 'This problem already exists in this competition.';
                return redirect()->back()->with('error',$error);
            } else {
                Problems_in_competition::create(['competition_id' => $compid , 'problem_id' => $probid]);
            }
        }
        return redirect()->back();
        
    }

    public function show($cid , $pid)
    {
        $problem = problem::where('id',$pid)->with('user')->first();
        $comp = $cid;
        return view('problem.show', compact('problem', $problem , 'comp'));
    }

    public function destroy($compid, $proid)
    {
        Problems_in_competition::where([['competition_id', '=', $compid], ['problem_id', '=', $proid]])->first()->delete();
        return redirect('/competition/'. $compid .'/edit');
    }
}
