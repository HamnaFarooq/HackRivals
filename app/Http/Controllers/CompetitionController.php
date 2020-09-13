<?php

namespace App\Http\Controllers;

use App\competition;
use App\Problem;
use App\Users_in_competition;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class competitionController extends Controller
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
    public function index()
    {
        $competitions = competition::all();
        return view('competition.index', compact('competitions'));
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
        $request->merge(['user_id' => Auth::id()]);
        $competition = competition::create($request->all());
        return redirect('/competition/' . $competition['id'] . '/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $competition = competition::where('id', $id)->with('rankings')->with('problems')->first();
        if ($competition) {
            $now = Carbon::now()->toDateTimeString();
            if ($competition->starts < $now && $now < $competition->ends) {
                $check = Users_in_competition::where([['user_id', '=', Auth::id()], ['competition_id', '=', $competition->id]])->get()->first();
                if ($check) {
                    return view('competition.show', compact('competition', $competition));
                }
            }
        }
        return redirect('/my_competitions');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $competition = competition::where('id', $id)->with('problems')->with('participents')->withCount('participents')->withCount('rankings')->first();
        if ($competition && (Auth::id() == $competition->user_id || Auth::user()->user_type == 'admin')) {
            $problems = Problem::where([['user_id', '=', Auth::id()]])->get();
            $hackrivalprob = Problem::where([['problem_type', '=', 'HackRivals']])->get();
            return view('competition.edit', compact('competition', 'problems', 'hackrivalprob'));
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
        return redirect('/competition/' . $updatedcompetition['id'] . '/edit');
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
