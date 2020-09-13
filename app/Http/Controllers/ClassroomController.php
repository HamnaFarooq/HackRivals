<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\Competition;
use App\Users_in_classroom;
use Auth;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['user_id' => Auth::id()]);
        $created = Classroom::create($request->all());
        return redirect('/classroom/' . $created["id"] . '/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //check if joined only
        $classroom = Classroom::where('id', $id)->with('materials')->with('rankings')->first();
        if ($classroom) {
            //find this user and this class both in Users in classroom table
            $check = Users_in_classroom::where([['user_id', '=', Auth::id()], ['classroom_id', '=', $classroom->id]])->get();
            if ($check) {
                return view('classroom.show', compact('classroom', $classroom));
            }
        }
        return redirect('/my_classrooms');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //check if creator or admin only
        $classroom = Classroom::where('id', $id)->with('materials')->first();
        if ($classroom && (Auth::id() == $classroom->user_id || Auth::user()->user_type == 'admin')) {
            $competitions = Competition::where([['user_id', '=', Auth::id()], ['competition_type', '=', 'private']])->get();
            return view('classroom.edit', compact('classroom', 'competitions'));
        } else {
            return redirect('/user_admin');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updatedclassroom = Classroom::find($id)->first();
        $updatedclassroom->update($request->all());
        return redirect('/classroom/' . $updatedclassroom["id"] . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Classroom::find($id)->first()->delete();
        return redirect('/home');
    }

    public function updateRankings($id)
    {
        //id classrom.... is competitions -> rankings and save those in classroom rankings
        $classroom = Classroom::find($id)->with('materials')->get();
        $materials = $classroom->materials;

        foreach ( $materials as $material )
        {
            //
        }
    }
}
