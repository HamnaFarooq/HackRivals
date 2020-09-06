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
                <h3 class="m-3">UserName</h3>
                <h5>Username@email.com</h5>
            </div>
        </div>

        <div class="col-sm-7 text-center">
            <h3 class="m-3"> <b>Rank:</b> <i> Professional </i></h3>
            <div class="bg-primary m-3 p-1 pt-2 rounded">
                <p> <b class="mx-2">Problems Attempted: </b> 53 </p>
            </div>
            <p> <b class="mx-2">Problems Solved: </b> 17 </p>
            <div class="bg-primary m-3 p-1 pt-2 rounded">
                <p> <b class="mx-2">Joined Competitions: </b> 5 </p>
            </div>
            <p> <b class="mx-2">Joined Classes: </b> 7 </p>
            <div class="bg-primary m-3 p-1 pt-2 rounded">
                <p> <b class="mx-2">Last Login: </b> 13 September 200AD </p>
            </div>
            <p> <b class="mx-2">Join Date: </b> 30 August 2020 </p>
        </div>
    </div>

</div>
@endsection