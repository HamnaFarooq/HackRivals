<?php

namespace App\Http\Controllers;

use App\Users_in_competition;
use Illuminate\Http\Request;
use App\Competition;
use Auth;

class UsersInCompetitionController extends Controller
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
        $compete = Competition::where('id', $request->competition_id)->first();
        if ( $compete && ( $compete->password == $request->password || $request->password == 'class' )  )
        {
            $request->merge(['user_id' => Auth::id()]);
            Users_in_competition::create($request->all());
            return redirect('/competition/' . $request->competition_id);
        } 
        else 
        {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Users_in_competition  $users_in_competition
     * @return \Illuminate\Http\Response
     */
    public function show(Users_in_competition $users_in_competition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Users_in_competition  $users_in_competition
     * @return \Illuminate\Http\Response
     */
    public function edit(Users_in_competition $users_in_competition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Users_in_competition  $users_in_competition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users_in_competition $users_in_competition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Users_in_competition  $users_in_competition
     * @return \Illuminate\Http\Response
     */
    public function destroy($competition_id)
    {
        //
        Users_in_competition::where([['user_id', '=', Auth::id()],['competition_id', '=', $competition_id]])->first()->delete();
        return redirect('/my_competitions');
    }
}
