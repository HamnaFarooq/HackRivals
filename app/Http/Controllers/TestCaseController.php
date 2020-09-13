<?php

namespace App\Http\Controllers;

use App\Test_case;
use App\Problem;
use Auth;
use Illuminate\Http\Request;

class TestCaseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $test_cases = test_case::where('problem_id',$id)->get();
        $problem = Problem::where('id',$id)->first();
        if ($problem && (Auth::id() == $problem->user_id || Auth::user()->user_type == 'admin')){
            return view('test_case.index',compact('test_cases','id'));
        }
        else {
            return redirect('/user_admin');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('test_case.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        test_case::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($probid,$id)
    // {
    //     $test_case = test_case::find($id)->first();
    //     return view('test_case.show',compact('test_case',$test_case));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($probid,$id)
    // {
    //     $test_case = test_case::where('id', $id)->first();
    //     return view('test_case.edit',compact('test_case'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $probid, $id)
    {
        $updatedtest_case = test_case::where('id',$id)->first();
        $updatedtest_case->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $probid, $id)
    {
        test_case::where('id',$id)->first()->delete();
        return redirect()->back();
    }
}
