<?php

namespace App\Http\Controllers;

use App\Classroom;
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
        $request->merge(['user_id' => Auth::id() ]);
        // dd($request);
        $created = Classroom::create($request->all());
        return redirect('/classroom/'.$created["id"].'/edit');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $classroom = Classroom::where('id', $id)->with('materials')->first();
        return view('classroom.show',compact('classroom',$classroom));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classroom = Classroom::where('id', $id)->with('materials')->first();
        return view('classroom.edit',compact('classroom'));
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
        return redirect('/classroom/'.$updatedclassroom["id"].'/edit');
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
}
