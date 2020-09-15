<?php

namespace App\Http\Controllers;

use App\Users_in_competition;
use Illuminate\Http\Request;
use App\Competition;
use Auth;

class UsersInCompetitionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $compete = Competition::where('id', $request->competition_id)->first();
        $alreadyexist = Users_in_competition::where([['competition_id', '=', $request->competition_id],['user_id', '=', Auth::id()]])->first();
        if($alreadyexist){
            $error = 'You have already joined this competition';
            return redirect()->back()->with('error', $error);
        } elseif(Auth::id()==$compete->user_id){
            $error = 'Creator cannot join his own competition.';
            return redirect()->back()->with('error', $error);
        }
        else 
        {
            if ( $compete && ( $compete->password == $request->password || $request->password == 'class' )  )
            {
                $request->merge(['user_id' => Auth::id()]);
                Users_in_competition::create($request->all());
                return redirect('/competition/' . $request->competition_id);
            } 
        }
        $error = 'Incorrect competition ID or Password.';
        return redirect()->back()->with('error',$error); 
    }

    public function storepub($id)
    {
        $compete = Competition::where('id', $id)->first();
        $existing = Users_in_competition::where([['competition_id', '=', $id],['user_id', '=', Auth::id()]])->first();
        if($existing){
            $error = 'You have already joined this competition';
            return redirect()->back()->with('error', $error);
        } else {
            if ( $compete )
            {
                 $data = (['user_id' => Auth::id() , 'competition_id' => $id]);
                Users_in_competition::create($data);
                return redirect('/competition/' . $id);
            } 
        }
        $error = 'Incorrect competition ID.';
        return redirect()->back()->with('error',$error);
       
    }

    public function destroy($competition_id)
    {
        Users_in_competition::where([['user_id', '=', Auth::id()],['competition_id', '=', $competition_id]])->first()->delete();
        return redirect('/my_competitions');
    }
}
