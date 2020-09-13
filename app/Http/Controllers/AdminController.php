<?php

namespace App\Http\Controllers;

use App\User;
use App\Classroom;
use App\Competition;
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
        $users = User::where( [ ['user_type','=', 'user'] , ['status' ,'=', 'unBlock' ] ])->get();
        $superusers = User::where( [ ['user_type','=', 'superuser'] , ['status' ,'=', 'unBlock' ] ])->get();
        $blockusers = User::where( [ ['user_type','=', 'user'] , ['status' ,'=', 'block' ] ])->get();
        $blockedsuperusers = User::where( [ ['user_type','=', 'superuser'] , ['status' ,'=', 'block' ] ])->get();
        return view('admin.home',compact('users','superusers','blockusers','blockedsuperusers'));
    }

    public function classroomsList()
    {
        $classrooms = Classroom::all();
        return view('admin.classroomsList',compact('classrooms'));
    }

    public function competitionList()
    {
        $competitions = Competition::all();
        return view('admin.competitionList',compact('competitions'));
    }

    public function publicCompetition()
    {
        $competitions = Competition::all();
        return view('admin.publicCompetition');
    }

    public function editPublicCompetition()
    {
        return view('admin.editPublicCompetition');
    }

    public function editCompetition($id)
    {
        $competition = Competition::where('id',$id)->first();
        return view('admin.editPrivateCompetition',compact('competition'));
        
    }

    public function editClassrooms($id)
    {
        $classroom = Classroom::where('id',$id)->first();
        return view('admin.editClassrooms',compact('classroom'));
    }


    public function updateClassroomsList(Request $request, $id)
    {
        $updatedclassroom = Classroom::where('id',$id)->first();
        $updatedclassroom->update($request->all());
        return redirect('/classroomsList/');
    }

    public function updateCompetition(Request $request, $id)
    {
        $updatedcompetition = competition::where('id', $id)->first();
        $updatedcompetition->update($request->all());
        return redirect('/competitionList/');
    }

    public function updateClassrooms(Request $request, $id)
    {
        $updatedclassrooms = Classroom::where('id', $id)->first();
        $updatedclassrooms->update($request->all());
        return redirect('/classroomsList/');
    }


    public function deleteClassroom($id)
    {
        Classroom::where('id', $id)->first()->delete();
        return redirect('/classroomsList');
    }


    public function deleteCompetition($id)
    {
        Competition::where('id', $id)->first()->delete();
        return redirect('/competitionList');
    }


    public function blockUser($id)
    {
        $user = User::find($id);
        $user->status = 'block';
        $user->save();
        return redirect('/home');
    }

    public function unBlockUser($id)
    {
        $user = User::find($id);
        $user->status = 'unBlock';
        $user->save();
        return redirect('/home');
    }

    public function deleteUser($id)
    {
        User::where('id', $id)->first()->delete();
        return redirect('/home');
    }

    public function deleteSuperUser($id)
    {
        User::where('id', $id)->first()->delete();
        return redirect('/home');
    }

    public function editUsers($id)
    {
        $user = User::where('id',$id)->first();
        return view('admin.editUsers',compact('user'));
    }

    public function updateEditUser(Request $request, $id)
    {
        $updatedUser = User::where('id',$id)->first();
        $updatedUser->update($request->all());
        return redirect('/home/');
    }

}
