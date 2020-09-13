<?php

namespace App\Http\Controllers;

use App\Problem;
use Auth;
use Illuminate\Http\Request;

class ProblemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $problems = problem::all();
        return view('problem.index', compact('problems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('problem.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->user_type == 'super') {
            $request->merge(['problem_type' => 'HackRivals']);
        }
        else{
            $request->merge(['problem_type' => 'private']);
        }
        $level = $request->level;
        $sublevel = $request->sub_level;
        if($level==1){
            if($sublevel == 1){
                $score= 10;
            } elseif($sublevel == 2){
                $score= 20;
            } elseif($sublevel == 3){
                $score= 30;
            } elseif($sublevel == 4){
                $score= 40;
            } elseif($sublevel == 5){
                $score= 50;
            }
        }
        elseif($level== 2){
            if($sublevel == 1){
                $score= 60;
            } elseif($sublevel == 2){
                $score= 70;
            } elseif($sublevel == 3){
                $score= 80;
            } elseif($sublevel == 4){
                $score= 90;
            } elseif($sublevel == 5){
                $score= 100;
            }
        }
        elseif($level== 3){
            if($sublevel == 1){
                $score= 110;
            } elseif($sublevel == 2){
                $score= 120;
            } elseif($sublevel == 3){
                $score= 130;
            } elseif($sublevel == 4){
                $score= 140;
            } elseif($sublevel == 5){
                $score= 150;
            }
        }
        elseif($level== 4){
            if($sublevel == 1){
                $score= 160;
            } elseif($sublevel == 2){
                $score= 170;
            } elseif($sublevel == 3){
                $score= 180;
            } elseif($sublevel == 4){
                $score= 190;
            } elseif($sublevel == 5){
                $score= 200;
            }
        }
        elseif($level== 5){
            if($sublevel == 1){
                $score= 210;
            } elseif($sublevel == 2){
                $score= 220;
            } elseif($sublevel == 3){
                $score= 230;
            } elseif($sublevel == 4){
                $score= 240;
            } elseif($sublevel == 5){
                $score= 250;
            }
        }
        elseif($level== 6){
            if($sublevel == 1){
                $score= 260;
            } elseif($sublevel == 2){
                $score= 270;
            } elseif($sublevel == 3){
                $score= 280;
            } elseif($sublevel == 4){
                $score= 290;
            } elseif($sublevel == 5){
                $score= 300;
            }
        }
        elseif($level== 7){
            if($sublevel == 1){
                $score= 310;
            } elseif($sublevel == 2){
                $score= 320;
            } elseif($sublevel == 3){
                $score= 330;
            } elseif($sublevel == 4){
                $score= 340;
            } elseif($sublevel == 5){
                $score= 350;
            }
        }
        elseif($level== 8){
            if($sublevel == 1){
                $score= 360;
            } elseif($sublevel == 2){
                $score= 370;
            } elseif($sublevel == 3){
                $score= 380;
            } elseif($sublevel == 4){
                $score= 390;
            } elseif($sublevel == 5){
                $score= 400;
            }
        }
        $request->merge(['user_id' => Auth::id(),'points' => $score, 'solved_by' => 0, 'total_attempts' => 0 ]);
        problem::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $problem = problem::where('id',$id)->with('user')->first();
        $comp = null;
        return view('problem.show', compact('problem', $problem , 'comp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $problem = problem::where('id', $id)->first();
        if ($problem && (Auth::id() == $problem->user_id || Auth::user()->user_type == 'admin')) {
            return view('problem.edit', compact('problem'));
        } else {
            return redirect('/user_admin');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updatedproblem = problem::find($id)->first();
        $updatedproblem->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        problem::find($id)->first()->delete();
        return redirect()->back();
    }
}
