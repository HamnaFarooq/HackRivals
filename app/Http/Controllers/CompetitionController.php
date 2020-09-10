<?php

namespace App\Http\Controllers;

use App\competition;
use App\Problem;
use App\Users_in_competition;
use Auth;
use Illuminate\Http\Request;

class competitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $competitions = competition::all();
        return view('competition.index',compact('competitions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   /* public function create()
    {
        return view('competition.create');
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['user_id' => Auth::id() ]);
        $competition = competition::create($request->all());
        return redirect('/competition/'.$competition['id'].'/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $competition = competition::where('id', $id)->first();
        if($competition){
            $check = Users_in_competition::where([['user_id', '=', Auth::id()], ['competition_id', '=', $competition->id]])->get();
            if($check){
                return view('competition.show',compact('competition',$competition));
            } else{
                return redirect('/my_competitions');
            }
        } else{
            return redirect('/my_competitions');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $competition = competition::where('id', $id)->with('problems')->first();
        if ($competition && (Auth::id() == $competition->user_id || Auth::user()->user_type == 'admin')){
            $problems = Problem::where([['user_id', '=', Auth::id()] ])->get();
            return view('competition.edit',compact('competition','problems'));
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
        $updatedcompetition = competition::where('id', $id)->first();
        $updatedcompetition->update($request->all());
        return redirect('/competition/'.$updatedcompetition['id'].'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        competition::find($id)->first()->delete();
        return redirect('/competition');
    }
}
