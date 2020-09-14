<?php

namespace App\Http\Controllers;

use App\User;
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
        return view('home');
    }

    public function classrooms()
    {
        $user = User::find(Auth::id())->with('joined_classrooms')->first();
        return view('my_classrooms',compact('user',$user));
    }

    public function competitions()
    {
        return view('my_competitions');
    }

    public function rankings()
    {
        return view('rankings');
    }

    public function user_admin()
    {
        $user = User::find(Auth::id())->with('classrooms')->with('problems')->with('competitions')->first();
        return view('user_admin',compact('user',$user));
    }

    public function profile()
    {
        return view('profile');
    }
}
