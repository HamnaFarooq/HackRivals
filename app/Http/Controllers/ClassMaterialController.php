<?php

namespace App\Http\Controllers;

use App\Class_material;
use Illuminate\Http\Request;

class ClassMaterialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return redirect('/home');
    }

    public function create()
    {
        return view('class_material.create');
    }

    public function store(Request $request)
    {
        Class_material::create($request->all());

        Validator::make($request->all(), [
            'title' => 'required|max:255',
            'announcement' => 'required|max:255',
            'classroom_id' => 'required|max:255',
            'competition_id' => 'required|max:255',
        ])->validate();

        return redirect()->back();
    }

    public function show($id)
    {
        return redirect('/home');
    }

    public function edit($id)
    {
        return redirect('/home');
    }

    public function update(Request $request, $id, $mid)
    {
        $updatedclass_material = Class_material::where([['id', '=', $mid]])->first();
        Validator::make($request->all(), [
            'title' => 'required|max:255',
            'announcement' => 'required|max:255',
        ])->validate();
        $updatedclass_material->update($request->all());
        return redirect()->back();

    }

    public function destroy($id, $mid)
    {
        Class_material::where([['id', '=', $mid]])->first()->delete();
        return redirect()->back();

    }
}
