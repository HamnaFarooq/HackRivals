<?php

namespace App\Http\Controllers;

use App\Problem;
use Auth;
use Illuminate\Http\Request;

class ProblemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $problems = problem::all();
        return view('problem.index', compact('problems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('problem.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->user_type == 'super') {
            $request->merge(['problem_type' => 'HackRivals']);
        }
        else{
            $request->merge(['problem_type' => 'private']);
        }
        $request->merge(['user_id' => Auth::id(), 'points' => 10]);
        problem::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $problem = problem::find($id)->with('user')->first();
        return view('problem.show', compact('problem', $problem));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $problem = problem::where('id', $id)->first();
        if ($problem && (Auth::id() == $problem->user_id || Auth::user()->user_type == 'admin')) {
            return view('problem.edit', compact('problem'));
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
        $updatedproblem = problem::find($id)->first();
        $updatedproblem->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        problem::find($id)->first()->delete();
        return redirect()->back();
    }
}
