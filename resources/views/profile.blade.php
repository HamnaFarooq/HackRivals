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
            <h3 class="m-3"> <b>Rank:</b> <i> Professional </i></h3>
            <div class="bg-primary m-3 p-1 pt-2 rounded">
                <p> <b class="mx-2">Problems Attempted: </b> 0 </p>
            </div>
            <p> <b class="mx-2">Problems Solved: </b> 0 </p>
            <div class="bg-primary m-3 p-1 pt-2 rounded">
                <p> <b class="mx-2">Joined Competitions: </b> 0 </p>
            </div>
            <p> <b class="mx-2">Joined Classes: </b> 0 </p>
            <div class="bg-primary m-3 p-1 pt-2 rounded">
                <p> <b class="mx-2">Last Login: </b> 11 September 2020 </p>
            </div>
            <p> <b class="mx-2">Join Date: </b> 11 September 2020 </p>
        </div>
    </div>

</div>
@endsection