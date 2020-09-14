@extends('layouts.app')
@section('pagename')
Profile
@endsection

@section('content')
<div class="container">

    <div class="row">
        <div class="col-sm-5">
            <div class="text-center pb-3 pt-5">
                {!! file_get_contents('images/profilepic.svg') !!}
                <h3 class="m-3">{{ Auth::user()->name }}</h3>
                <h5>{{ Auth::user()->email }}</h5>
            </div>
        </div>

        <div class="col-sm-7 text-center">
            <h3 class="m-3"> <b>Rank:</b> <i> {{$rank}} </i></h3>
            <div class="bg-primary m-3 p-1 pt-2 rounded text-white">
                <p> <b class="mx-2">Problems Attempted: </b> {{$attempts}} </p>
            </div>
            <p> <b class="mx-2">Problems Solved: </b> {{$solvedproblems}} </p>
            <div class="bg-primary m-3 p-1 pt-2 rounded  text-white">
                <p> <b class="mx-2">Joined Competitions: </b> {{$user->joined_competitions_count}} </p>
            </div>
            <p> <b class="mx-2">Joined Classes: </b> {{$user->joined_classrooms_count}} </p>
            <div class="bg-primary m-3 p-1 pt-2 rounded text-white">
                <p> <b class="mx-2">Last Problem Solved: </b> {{$user->last_solved_on}} </p>
            </div>
            <p> <b class="mx-2">Join Date: </b> {{$user->created_at}} </p>
        </div>
    </div>

</div>
@endsection