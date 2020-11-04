<?php

namespace App\Http\Controllers;

use App\Problem;
use Auth;
use Illuminate\Http\Request;

class ProblemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return redirect('/home');
    }

    public function store(Request $request)
    {
        if (Auth::user()->user_type == 'super' || Auth::user()->user_type == 'admin') {
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

    public function show($id)
    {
        $problem = problem::where('id',$id)->with('user')->first();
        $comp = null;
        return view('problem.show', compact('problem', $problem , 'comp'));
    }

    public function edit($id)
    {
        $problem = problem::where('id', $id)->first();
        if ($problem && (Auth::id() == $problem->user_id || Auth::user()->user_type == 'admin')) {
            return view('problem.edit', compact('problem'));
        } else {
            $error = 'Only problem creator can edit the problem.';
            return redirect('/user_admin')->with('error',$error);
        }
    }

    public function update(Request $request, $id)
    {
        $updatedproblem = problem::find($id)->first();
        $updatedproblem->update($request->all());
        return redirect()->back();
    }

    public function destroy($id)
    {
        problem::where("id",$id)->first()->delete();
        return redirect()->back();
    }
}
