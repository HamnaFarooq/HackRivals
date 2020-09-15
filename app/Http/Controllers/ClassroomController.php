<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\Competition;
use App\Competition_rankings;
use App\Classroom_rankings;
use App\Class_material;
use App\Users_in_classroom;
use Auth;
use Illuminate\Http\Request;

class ClassroomController extends Controller
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
        $request->merge(['user_id' => Auth::id()]);
        $created = Classroom::create($request->all());
        return redirect()->back();
    }

    public function show($id)
    {
        //check if joined only
        $classroom = Classroom::where('id', $id)->with('materials')->with('rankings')->first();
        if ($classroom) {
            //find this user and this class both in Users in classroom table
            if($classroom->user_id == Auth::id())
            {
                $error = 'Teacher can edit classroom from here.';
            return redirect('/classroom/'.$id.'/edit')->with('error',$error);
            }
            $check = Users_in_classroom::where([['user_id', '=', Auth::id()], ['classroom_id', '=', $classroom->id]])->get();
            if ($check) {
                return view('classroom.show', compact('classroom', $classroom));
            }
        }
        $error = 'You are not a member of this class';
        return redirect('/my_classrooms')->with('error',$error);
    }

    public function edit($id)
    {
        //check if creator or admin only
        $classroom = Classroom::where('id', $id)->with('materials')->first();
        if ($classroom && (Auth::id() == $classroom->user_id || Auth::user()->user_type == 'admin')) {
            $competitions = Competition::where([['user_id', '=', Auth::id()], ['competition_type', '=', 'private']])->get();
            return view('classroom.edit', compact('classroom', 'competitions'));
        } else {
            $error = 'Only teacher can edit classroom.';
            return redirect('/user_admin')->with('error',$error);
        }
    }

    public function update(Request $request, $id)
    {
        $updatedclassroom = Classroom::find($id)->first();
        $updatedclassroom->update($request->all());
        return redirect()->back();
    }

    public function destroy($id)
    {
        Classroom::find($id)->first()->delete();
        return redirect('/home');
    }

    public function updateRankings($id)
    {
        //id classrom.... is competitions -> rankings and save those in classroom rankings
        $classroom = Classroom::where('id',$id)->with('materials')->get();
        if ($classroom) {
            $materials = Class_material::where('classroom_id',$id)->get();
            Classroom_rankings::where('classroom_id', $id)->delete();
            foreach ($materials as $material) {
                $cid = $material->competition_id;
                if ($cid) {
                    $ranks = Competition_rankings::where('competition_id', $cid)->get();
                    foreach ($ranks as $rank) {
                        $user = $rank->user_id;
                        $points = $rank->points;
                        $exists = Classroom_rankings::where([['user_id', '=', $user], ['classroom_id', '=', $id]])->first();
                        if ($exists) {
                            // add this points to already there points
                            $exists->points = $exists->points + $points;
                            $exists->update(['points' => $points]);
                        } else {
                            // create new user, class and this points
                            Classroom_rankings::create(['points' => $points, 'user_id' => $user, 'classroom_id' => $id]);
                        }
                    }
                }
            }
        }
        return redirect()->back();
    }
}
