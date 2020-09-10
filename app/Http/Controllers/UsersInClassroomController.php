<?php

namespace App\Http\Controllers;

use App\Users_in_classroom;
use App\Classroom;
use Auth;
use Illuminate\Http\Request;

class UsersInClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $class = Classroom::where('id', $request->classroom_id)->first();
        if ($class && $class->password == $request->password) 
        {
            $request->merge(['user_id' => Auth::id()]);
            Users_in_classroom::create($request->all());
            return redirect('/classroom/' . $request->classroom_id);
        } 
        else 
        {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Users_in_classroom  $users_in_classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Users_in_classroom $users_in_classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Users_in_classroom  $users_in_classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Users_in_classroom $users_in_classroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Users_in_classroom  $users_in_classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users_in_classroom $users_in_classroom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Users_in_classroom  $users_in_classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy($classroom_id)
    {
        Users_in_classroom::where([['user_id', '=', Auth::id()],['classroom_id', '=', $classroom_id]])->first()->delete();
        return redirect('/my_classrooms');
    }
}
