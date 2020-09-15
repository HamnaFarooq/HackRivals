<?php

namespace App\Http\Controllers;

use App\User;
use App\Competition;
use App\Classroom;
use App\Problem;
use App\Solved_problems;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        if (Auth::user()->user_type == 'admin') {
            return redirect('/admin/users');
        }
        //user points, aggregated points
        //  here Mahrukh
        $user = User::where('id', Auth::id())->first();
        $points = $user->points;
        $aggregatedpoints = $user->aggregate_points;
        $lvl = $user->level;
        $sublvl = $user->sub_level;
        if ($aggregatedpoints >= 0 && $aggregatedpoints <= 1050) {
            $lvl = 1;
            if ($aggregatedpoints >= 0 && $aggregatedpoints <= 70) {
                $sublvl = 1;
                $progresspercentage = ($aggregatedpoints / 70) * 100;
                $max = 70;
            } elseif ($aggregatedpoints > 70 && $aggregatedpoints <= 210) {
                $sublvl = 2;
                $progresspercentage = ($aggregatedpoints / 210) * 100;
                $max = 210;
            } elseif ($aggregatedpoints > 210 && $aggregatedpoints <= 420) {
                $sublvl = 3;
                $progresspercentage = ($aggregatedpoints / 420) * 100;
                $max = 420;
            } elseif ($aggregatedpoints > 420 && $aggregatedpoints <= 700) {
                $sublvl = 4;
                $progresspercentage = ($aggregatedpoints / 700) * 100;
                $max = 700;
            } elseif ($aggregatedpoints > 700 && $aggregatedpoints <= 1050) {
                $sublvl = 5;
                $progresspercentage = ($aggregatedpoints / 1050) * 100;
                $max = 1050;
            }
        } elseif ($aggregatedpoints > 1050 && $aggregatedpoints <= 3850) {
            $lvl = 2;
            if ($aggregatedpoints > 1050 && $aggregatedpoints <= 1470) {
                $sublvl = 1;
                $progresspercentage = ($aggregatedpoints / 1470) * 100;
                $max = 1470;
            } elseif ($aggregatedpoints > 1470 && $aggregatedpoints <= 1960) {
                $sublvl = 2;
                $progresspercentage = ($aggregatedpoints / 1960) * 100;
                $max = 1960;
            } elseif ($aggregatedpoints > 1960 && $aggregatedpoints <= 2520) {
                $sublvl = 3;
                $progresspercentage = ($aggregatedpoints / 2520) * 100;
                $max = 2520;
            } elseif ($aggregatedpoints > 2520 && $aggregatedpoints <= 3150) {
                $sublvl = 4;
                $progresspercentage = ($aggregatedpoints / 3150) * 100;
                $max = 3150;
            } elseif ($aggregatedpoints > 3150 && $aggregatedpoints <= 3850) {
                $sublvl = 5;
                $progresspercentage = ($aggregatedpoints / 3850) * 100;
                $max = 3850;
            }
        } elseif ($aggregatedpoints > 3850 && $aggregatedpoints <= 8400) {
            $lvl = 3;
            if ($aggregatedpoints > 3850 && $aggregatedpoints <= 4620) {
                $sublvl = 1;
                $progresspercentage = ($aggregatedpoints / 4620) * 100;
                $max = 4620;
            } elseif ($aggregatedpoints > 4620 && $aggregatedpoints <= 5460) {
                $sublvl = 2;
                $progresspercentage = ($aggregatedpoints / 5460) * 100;
                $max = 5460;
            } elseif ($aggregatedpoints > 5460 && $aggregatedpoints <= 6370) {
                $sublvl = 3;
                $progresspercentage = ($aggregatedpoints / 6370) * 100;
                $max = 6370;
            } elseif ($aggregatedpoints > 6370 && $aggregatedpoints <= 7350) {
                $sublvl = 4;
                $progresspercentage = ($aggregatedpoints / 7350) * 100;
                $max = 7350;
            } elseif ($aggregatedpoints > 7350 && $aggregatedpoints <= 8400) {
                $sublvl = 5;
                $progresspercentage = ($aggregatedpoints / 8400) * 100;
                $max = 8400;
            }
        } elseif ($aggregatedpoints > 8400 && $aggregatedpoints <= 14700) {
            $lvl = 4;
            if ($aggregatedpoints > 8400 && $aggregatedpoints <= 9520) {
                $sublvl = 1;
                $progresspercentage = ($aggregatedpoints / 9520) * 100;
                $max = 9520;
            } elseif ($aggregatedpoints > 9520 && $aggregatedpoints <= 10710) {
                $sublvl = 2;
                $progresspercentage = ($aggregatedpoints / 10710) * 100;
                $max = 10710;
            } elseif ($aggregatedpoints > 10710 && $aggregatedpoints <= 11970) {
                $sublvl = 3;
                $progresspercentage = ($aggregatedpoints / 11970) * 100;
                $max = 11970;
            } elseif ($aggregatedpoints > 11970 && $aggregatedpoints <= 13300) {
                $sublvl = 4;
                $progresspercentage = ($aggregatedpoints / 13300) * 100;
                $max = 13300;
            } elseif ($aggregatedpoints > 13300 && $aggregatedpoints <= 14700) {
                $sublvl = 5;
                $progresspercentage = ($aggregatedpoints / 14700) * 100;
                $max = 14700;
            }
        } elseif ($aggregatedpoints > 14700 && $aggregatedpoints <= 22750) {
            $lvl = 5;
            if ($aggregatedpoints > 14700 && $aggregatedpoints <= 16170) {
                $sublvl = 1;
                $progresspercentage = ($aggregatedpoints / 16170) * 100;
                $max = 16170;
            } elseif ($aggregatedpoints > 16170 && $aggregatedpoints <= 17710) {
                $sublvl = 2;
                $progresspercentage = ($aggregatedpoints / 17710) * 100;
                $max = 17710;
            } elseif ($aggregatedpoints > 17710 && $aggregatedpoints <= 19320) {
                $sublvl = 3;
                $progresspercentage = ($aggregatedpoints / 19320) * 100;
                $max = 19320;
            } elseif ($aggregatedpoints > 19320 && $aggregatedpoints <= 21000) {
                $sublvl = 4;
                $progresspercentage = ($aggregatedpoints / 21000) * 100;
                $max = 21000;
            } elseif ($aggregatedpoints > 21000 && $aggregatedpoints <= 22750) {
                $sublvl = 5;
                $progresspercentage = ($aggregatedpoints / 22750) * 100;
                $max = 22750;
            }
        } elseif ($aggregatedpoints > 22750 && $aggregatedpoints <= 32550) {
            $lvl = 6;
            if ($aggregatedpoints > 22750 && $aggregatedpoints <= 24570) {
                $sublvl = 1;
                $progresspercentage = ($aggregatedpoints / 24570) * 100;
                $max = 24570;
            } elseif ($aggregatedpoints > 24570 && $aggregatedpoints <= 26460) {
                $sublvl = 2;
                $progresspercentage = ($aggregatedpoints / 26460) * 100;
                $max = 26460;
            } elseif ($aggregatedpoints > 26460 && $aggregatedpoints <= 28420) {
                $sublvl = 3;
                $progresspercentage = ($aggregatedpoints / 28420) * 100;
                $max = 28420;
            } elseif ($aggregatedpoints > 28420 && $aggregatedpoints <= 30450) {
                $sublvl = 4;
                $progresspercentage = ($aggregatedpoints / 30450) * 100;
                $max = 30450;
            } elseif ($aggregatedpoints > 30450 && $aggregatedpoints <= 32550) {
                $sublvl = 5;
                $progresspercentage = ($aggregatedpoints / 32550) * 100;
                $max = 32550;
            }
        } elseif ($aggregatedpoints > 32550 && $aggregatedpoints <= 44100) {
            $lvl = 7;
            if ($aggregatedpoints > 32550 && $aggregatedpoints <= 34720) {
                $sublvl = 1;
                $progresspercentage = ($aggregatedpoints / 34720) * 100;
                $max = 34720;
            } elseif ($aggregatedpoints > 34720 && $aggregatedpoints <= 36960) {
                $sublvl = 2;
                $progresspercentage = ($aggregatedpoints / 36960) * 100;
                $max = 36960;
            } elseif ($aggregatedpoints > 36960 && $aggregatedpoints <= 39270) {
                $sublvl = 3;
                $progresspercentage = ($aggregatedpoints / 39270) * 100;
                $max = 39270;
            } elseif ($aggregatedpoints > 39270 && $aggregatedpoints <= 41650) {
                $sublvl = 4;
                $progresspercentage = ($aggregatedpoints / 41650) * 100;
                $max = 41650;
            } elseif ($aggregatedpoints > 41650 && $aggregatedpoints <= 44100) {
                $sublvl = 5;
                $progresspercentage = ($aggregatedpoints / 70) * 100;
                $max = 44100;
            }
        } elseif ($aggregatedpoints > 44100 && $aggregatedpoints <= 57400) {
            $lvl = 8;
            if ($aggregatedpoints > 44100 && $aggregatedpoints <= 46620) {
                $sublvl = 1;
                $progresspercentage = ($aggregatedpoints / 46620) * 100;
                $max = 46620;
            } elseif ($aggregatedpoints > 46620 && $aggregatedpoints <= 49210) {
                $sublvl = 2;
                $progresspercentage = ($aggregatedpoints / 49210) * 100;
                $max = 49210;
            } elseif ($aggregatedpoints > 49210 && $aggregatedpoints <= 51870) {
                $sublvl = 3;
                $progresspercentage = ($aggregatedpoints / 51870) * 100;
                $max = 51870;
            } elseif ($aggregatedpoints > 51870 && $aggregatedpoints <= 54600) {
                $sublvl = 4;
                $progresspercentage = ($aggregatedpoints / 54600) * 100;
                $max = 54600;
            } elseif ($aggregatedpoints > 54600 && $aggregatedpoints <= 57400) {
                $sublvl = 5;
                $progresspercentage = ($aggregatedpoints / 57400) * 100;
                $max = 57400;
            }
        }
        $lvlpercentage = ($lvl / 8) * 100;
        $sblvlpercentage = ($sublvl / 5) * 100;
        //get problems where type is hackrivals and user's sublevel and level.

        $problem = Problem::where([['problem_type', '=', 'HackRivals'], ['level', '=', $lvl], ['sub_level', '=', $sublvl]])->inRandomOrder()->limit(5)->get();

        return view('home', compact('points', 'aggregatedpoints', 'lvl', 'sublvl', 'lvlpercentage', 'sblvlpercentage', 'progresspercentage', 'max', 'problem'));
    }

    public function classrooms()
    {
        if (Auth::user()->user_type == 'admin') {
            return redirect('/admin/users');
        }
        $user = User::find(Auth::id())->with('joined_classrooms')->first();
        return view('my_classrooms', compact('user', $user));
    }

    public function competitions()
    {
        if (Auth::user()->user_type == 'admin') {
            return redirect('/admin/users');
        }
        $user = User::find(Auth::id())->with('joined_competitions')->first();
        $public = Competition::where([['competition_type', '=', 'public']])->get();
        return view('my_competitions', compact('user', 'public'));
    }

    public function rankings()
    {
        if (Auth::user()->user_type == 'admin') {
            return redirect('/admin/users');
        }
        $users = User::orderBy('points', 'DESC')->take(100)->get();
        return view('rankings', compact('users'));
    }

    public function user_admin()
    {
        if (Auth::user()->user_type == 'admin') {
            return redirect('/admin/users');
        }
        $user = User::where('id', Auth::id())->with('problems')->first();
        $classrooms = Classroom::where('user_id', Auth::id())->withCount('students')->get();
        $competitions = Competition::where('user_id', Auth::id())->withCount('participents')->get();
        return view('user_admin', compact('user', 'classrooms', 'competitions'));
    }

    public function profile()
    {
        if (Auth::user()->user_type == 'admin') {
            return redirect('/admin/users');
        }
        $user = User::where([['id', '=', Auth::id()]])->withCount('joined_classrooms')->withCount('joined_competitions')->first();
        $solved = Solved_problems::where([['source', '=', 'practice'], ['user_id', '=', Auth::id()]])->get();
        $solvedproblems = count($solved);
        $attempts = 0;
        foreach ($solved as $row) {
            $attempts = $attempts + $row->attempts;
        }
        $Authuser = User::where([['id', '=', Auth::id()]])->first();
        $level = $Authuser->level;
        if ($level == 1) {
            $rank = 'Beginner';
        } elseif ($level == 2) {
            $rank = 'Novice';
        } elseif ($level == 3) {
            $rank = 'Intermediate';
        } elseif ($level == 4) {
            $rank = 'Advanced';
        } elseif ($level == 5) {
            $rank = 'Expert';
        } elseif ($level == 6) {
            $rank = 'Professional';
        } elseif ($level == 7) {
            $rank = 'Master';
        } elseif ($level == 8) {
            $rank = 'Legend';
        }
        return view('profile', compact('user', 'solvedproblems', 'attempts', 'rank'));
    }
}
