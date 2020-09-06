<?php

namespace App\Http\Controllers;

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
        return view('my_classrooms');
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
        return view('user_admin');
    }

    public function profile()
    {
        return view('profile');
    }
}
