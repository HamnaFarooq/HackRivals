<?php

namespace App\Http\Controllers;

use App\User;
use App\competition;
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
        //user points, aggregated points
        //  here Mahrukh
        return view('home');
    }

    public function classrooms()
    {
        $user = User::find(Auth::id())->with('joined_classrooms')->first();
        return view('my_classrooms',compact('user',$user));
    }

    public function competitions()
    {
        $user = User::find(Auth::id())->with('joined_competitions')->first();
        $public = Competition::where([['competition_type','=','public']])->get();
        return view('my_competitions',compact('user','public'));
    }

    public function rankings()
    {
        $user = User::find(Auth::id())->first();
        // $users = User::all();
        return view('rankings',compact('user'));
    
    }

    public function user_admin()
    {
        $user = User::find(Auth::id())->with('classrooms')->with('problems')->with('competitions')->first();
        return view('user_admin',compact('user',$user));
    }

    public function profile()
    {
        $user = User::find(Auth::id())->first();
        return view('profile');
    }
}
