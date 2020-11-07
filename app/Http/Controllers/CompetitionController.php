<?php

namespace App\Http\Controllers;

use App\Competition;
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

    public function index()
    {
        return redirect('/home');
    }

    public function store(Request $request)
    {
        $request->merge(['user_id' => Auth::id()]);
        Competition::create($request->all());
        return redirect()->back();
    }

    public function show($id)
    {
        $competition = Competition::where('id', $id)->with('rankings')->with('problems')->first();
        if ($competition) {
            if($competition->user_id == Auth::id())
            {
                $error = 'Creator can edit competition from here.';
            return redirect('/competition/'.$id.'/edit')->with('error',$error);
            }
            $now = Carbon::now()->toDateTimeString();
            if ($now < Carbon::parse($competition->ends)) {
                $check = Users_in_competition::where([['user_id', '=', Auth::id()], ['competition_id', '=', $competition->id]])->get()->first();
                if ($check) {
                    return view('competition.show', compact('competition', $competition));
                }
            }
        }
        $error='No competition exists with this ID.';
        return redirect()->back()->with('error', $error);
    }

    public function edit($id)
    {
        $competition = Competition::where('id', $id)->with('problems')->with('participents')->withCount('participents')->withCount('rankings')->first();
        if ($competition && (Auth::id() == $competition->user_id || Auth::user()->user_type == 'admin')) {
            $problems = Problem::where([['user_id', '=', Auth::id()]])->get();
            $hackrivalprob = Problem::where([['problem_type', '=', 'HackRivals']])->get();
            return view('competition.edit', compact('competition', 'problems', 'hackrivalprob'));
        } else {
            $error = 'Only competition creator can edit the competition.';
            return redirect('/user_admin')->with('error',$error);
        }
    }

    public function update(Request $request, $id)
    {
        $updatedcompetition = Competition::where('id', $id)->first();
        $updatedcompetition->update($request->all());
        return redirect()->back();
    }

    public function destroy($id)
    {
        competition::where('id', $id)->first()->delete();
        return redirect('/competition');
    }
}
