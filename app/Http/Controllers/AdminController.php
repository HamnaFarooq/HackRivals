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
    }

    public function users()
    {
        if(Auth::user()->user_type != 'admin')
        {
            return redirect('/home');
        }
        $users = User::where( [ ['user_type','=', 'user'] , ['status' ,'=', 'unBlock' ] ])->get();
        $superusers = User::where( [ ['user_type','=', 'superuser'] , ['status' ,'=', 'unBlock' ] ])->get();
        $blockusers = User::where( [ ['user_type','=', 'user'] , ['status' ,'=', 'block' ] ])->get();
        $blockedsuperusers = User::where( [ ['user_type','=', 'superuser'] , ['status' ,'=', 'block' ] ])->get();
        return view('admin.users',compact('users','superusers','blockusers','blockedsuperusers'));
    }

    public function classrooms()
    {
        if(Auth::user()->user_type != 'admin')
        {
            return redirect('/home');
        }
        $classrooms = Classroom::all();
        return view('admin.classrooms',compact('classrooms'));
    }

    public function competitions()
    {
        if(Auth::user()->user_type != 'admin')
        {
            return redirect('/home');
        }
        $competitions = Competition::all();
        return view('admin.competitions',compact('competitions'));
    }

    public function editCompetition($id)
    {
        if(Auth::user()->user_type != 'admin')
        {
            return redirect('/home');
        }
        $competition = Competition::where('id',$id)->first();
        return view('admin.editCompetition',compact('competition'));
        
    }

    public function editClassroom($id)
    {
        if(Auth::user()->user_type != 'admin')
        {
            return redirect('/home');
        }
        $classroom = Classroom::where('id',$id)->first();
        return view('admin.editClassroom',compact('classroom'));
    }


    public function updateClassroom(Request $request, $id)
    {
        if(Auth::user()->user_type != 'admin')
        {
            return redirect('/home');
        }
        $updatedclassroom = Classroom::where('id',$id)->first();
        $updatedclassroom->update($request->all());
        return redirect('/admin/classrooms');
    }

    public function updateCompetition(Request $request, $id)
    {
        if(Auth::user()->user_type != 'admin')
        {
            return redirect('/home');
        }
        $updatedcompetition = competition::where('id', $id)->first();
        $updatedcompetition->update($request->all());
        return redirect('/admin/competitions');
    }

    public function deleteClassroom($id)
    {
        if(Auth::user()->user_type != 'admin')
        {
            return redirect('/home');
        }
        Classroom::where('id', $id)->first()->delete();
        return redirect('/admin/classrooms');
    }


    public function deleteCompetition($id)
    {
        if(Auth::user()->user_type != 'admin')
        {
            return redirect('/home');
        }
        Competition::where('id', $id)->first()->delete();
        return redirect('/admin/competition');
    }


    public function blockUser($id)
    {
        if(Auth::user()->user_type != 'admin')
        {
            return redirect('/home');
        }
        $user = User::where('id',$id);
        $user->update(['status'=>'block']);
        return redirect('/admin/users');
    }

    public function unBlockUser($id)
    {
        if(Auth::user()->user_type != 'admin')
        {
            return redirect('/home');
        }
        $user = User::where('id',$id);
        $user->update(['status'=>'unBlock']);
        return redirect('/admin/users');
    }

    public function deleteUser($id)
    {
        if(Auth::user()->user_type != 'admin')
        {
            return redirect('/home');
        }
        User::where('id', $id)->first()->delete();
        return redirect('/admin/users');
    }

    public function editUser($id)
    {
        if(Auth::user()->user_type != 'admin')
        {
            return redirect('/home');
        }
        $user = User::where('id',$id)->first();
        return view('admin.editUser',compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        if(Auth::user()->user_type != 'admin')
        {
            return redirect('/home');
        }
        $updatedUser = User::where('id',$id)->first();
        $updatedUser->update($request->all());
        return redirect('/admin/users');
    }

}
