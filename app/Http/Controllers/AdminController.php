<?php

namespace App\Http\Controllers;

use App\User;
use App\Classroom;
use App\Competition;
use App\Problem;
use App\Test_case;
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
        if(Auth::user()->user_type != 'admin' && (Auth::user()->email != 'rizfar@hackrivals.com'))
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

    public function problems()
    {
        if(Auth::user()->user_type != 'admin')
        {
            return redirect('/home');
        }
        $hackrivals_problems = Problem::where("problem_type","hackrivals")->withCount('test_cases')->get();
        $private_problems = Problem::where("problem_type","private")->withCount('test_cases')->get();
        return view('admin.problems',compact('hackrivals_problems','private_problems'));
    }

    public function admins()
    {
        if(Auth::user()->user_type != 'admin')
        {
            return redirect('/home');
        }
        $users = User::where("user_type","admin")->get();
        return view('admin.admins',compact('users'));
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
        return redirect('/admin/competitions');
    }

    public function makeAdmin($id)
    {
        if(Auth::user()->user_type != 'admin' && (Auth::user()->email != 'rizfar@hackrivals.com'))
        {
            return redirect('/home');
        }
        $user = User::where('id',$id)->first();
        $user->update(['user_type'=>'admin']);
        return redirect()->back();
    }

    public function removeAdmin($id)
    {
        if(Auth::user()->user_type != 'admin')
        {
            return redirect('/home');
        }
        $user = User::where('id',$id)->first();
        $user->update(['user_type'=>'User']);
        return redirect()->back();
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

    public function viewProblem($id)
    {
        if(Auth::user()->user_type != 'admin')
        {
            return redirect('/home');
        }
        $problem = Problem::where('id',$id)->first();
        return view('admin.viewProblem',compact('problem'));
    }

    public function copyProblem($id)
    {
        if(Auth::user()->user_type != 'admin')
        {
            return redirect('/home');
        }
        $problem = Problem::where('id',$id)->first();
        $copy = $problem->replicate();
        $copy->push();
        $copy->update(['problem_type'=>'hackrivals' , 'user_id' => Auth::id() , 'solved_by'=> 0 , 'total_attempts'=> 0]);
        // copy the test cases as well
        $testcases = Test_case::where('problem_id',$id)->get();

        foreach ($testcases as $case) {
            $newcase = $case->replicate();
            $newcase->push();
            $newcase->update(['problem_id'=>$copy->id]);
        }
        
        // Problem::where('id',$copy->id)->first()->delete();

        return redirect()->back();
    }

}
