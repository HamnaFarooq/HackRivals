<?php

namespace App\Http\Controllers;

use App\User;
use App\Classroom;
use App\Competition;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        if( !( Auth::user() && Auth::user()->user_type == 'admin') )
        {
            return redirect('/home');
        }
    }

    public function users()
    {
        $users = User::where( [ ['user_type','=', 'user'] , ['status' ,'=', 'unBlock' ] ])->get();
        $superusers = User::where( [ ['user_type','=', 'superuser'] , ['status' ,'=', 'unBlock' ] ])->get();
        $blockusers = User::where( [ ['user_type','=', 'user'] , ['status' ,'=', 'block' ] ])->get();
        $blockedsuperusers = User::where( [ ['user_type','=', 'superuser'] , ['status' ,'=', 'block' ] ])->get();
        return view('admin.users',compact('users','superusers','blockusers','blockedsuperusers'));
    }

    public function classrooms()
    {
        $classrooms = Classroom::all();
        return view('admin.classrooms',compact('classrooms'));
    }

    public function competitions()
    {
        $competitions = Competition::all();
        return view('admin.competitions',compact('competitions'));
    }

    public function editCompetition($id)
    {
        $competition = Competition::where('id',$id)->first();
        return view('admin.editCompetition',compact('competition'));
        
    }

    public function editClassroom($id)
    {
        $classroom = Classroom::where('id',$id)->first();
        return view('admin.editClassroom',compact('classroom'));
    }


    public function updateClassroom(Request $request, $id)
    {
        $updatedclassroom = Classroom::where('id',$id)->first();
        $updatedclassroom->update($request->all());
        return redirect('/admin/classrooms');
    }

    public function updateCompetition(Request $request, $id)
    {
        $updatedcompetition = competition::where('id', $id)->first();
        $updatedcompetition->update($request->all());
        return redirect('/admin/competitions');
    }

    public function deleteClassroom($id)
    {
        Classroom::where('id', $id)->first()->delete();
        return redirect('/admin/classrooms');
    }


    public function deleteCompetition($id)
    {
        Competition::where('id', $id)->first()->delete();
        return redirect('/admin/competition');
    }


    public function blockUser($id)
    {
        $user = User::where('id',$id);
        $user->update(['status'=>'block']);
        return redirect('/admin/users');
    }

    public function unBlockUser($id)
    {
        $user = User::where('id',$id);
        $user->update(['status'=>'unBlock']);
        return redirect('/admin/users');
    }

    public function deleteUser($id)
    {
        User::where('id', $id)->first()->delete();
        return redirect('/admin/users');
    }

    public function editUser($id)
    {
        $user = User::where('id',$id)->first();
        return view('admin.editUser',compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $updatedUser = User::where('id',$id)->first();
        $updatedUser->update($request->all());
        return redirect('/admin/users');
    }

}
