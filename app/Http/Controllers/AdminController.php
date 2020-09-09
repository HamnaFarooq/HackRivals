<?php

namespace App\Http\Controllers;

use App\User;
use App\Classrooms;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
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
        
        // if(Auth::user()->user_type == admin);
        // else return to '/'

        return view('admin.home');
    }

    public function classroomsList()
    {
        $classrooms = Classroom::all();
        return view('admin.classroomsList',compact('classrooms'));
    }

    public function privateCompetitionList()
    {
        return view('admin.privateCompetitionList');
    }

    public function publicCompetition()
    {
        return view('admin.publicCompetition');
    }

    public function editPublicCompetition()
    {
        return view('admin.editPublicCompetition');
    }

    public function editPrivateCompetition()
    {
        return view('admin.editPrivateCompetition');
    }

    public function editClassrooms()
    {
        return view('admin.editClassrooms');
    }

    //Admin Operations

    public function blockUser()
    {
        
    }

    public function unBlockUser()
    {
        
    }

    public function saveEditClassroom()
    {
        
    }

    public function saveEditCompetition()
    {
        
    }

    public function saveDeleteClassroom()
    {
        
    }

    public function saveDeleteCompetition()
    {
        
    }



}
