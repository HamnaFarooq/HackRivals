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
        $updatedclass_material = Class_material::find($mid)->first();
        $updatedclass_material->update($request->all());
        return redirect()->back();

    }

    public function destroy($id, $mid)
    {
        Class_material::find($mid)->first()->delete();
        return redirect()->back();

    }
}
