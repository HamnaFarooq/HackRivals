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

    public function index($id)
    {
        $test_cases = test_case::where('problem_id',$id)->get();
        $problem = Problem::where('id',$id)->first();
        if ($problem && (Auth::id() == $problem->user_id || Auth::user()->user_type == 'admin')){
            return view('test_case.index',compact('test_cases','id'));
        }
        else {
            $error = 'Only problem creator can edit the test cases.';
            return redirect('/user_admin')->with('error',$error);
        }
    }

    public function store(Request $request)
    {
        test_case::create($request->all());
        
        Validator::make($request->all(), [
            'input' => 'required|max:255', 'output' => 'required|max:255', 'problem_id' => 'required|max:255',
        ])->validate();

        return redirect()->back();
    }

    public function update(Request $request, $probid, $id)
    {
        $updatedtest_case = test_case::where('id',$id)->first();
        
        Validator::make($request->all(), [
            'input' => 'required|max:255', 'output' => 'required|max:255', 'problem_id' => 'required|max:255',
        ])->validate();
        
        $updatedtest_case->update($request->all());
        return redirect()->back();
    }

    public function destroy( $probid, $id)
    {
        test_case::where('id',$id)->first()->delete();
        return redirect()->back();
    }

    public function show()
    {
        return redirect('/home');
    }

    public function edit()
    {
        return redirect('/home');
    }
}
