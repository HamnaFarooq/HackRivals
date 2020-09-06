@include('partials.registerform')
@include('partials.loginform')

@extends('layouts.app')
@section('pagename')
HackRivals
@endsection

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-6">
            <div class="mt-md-5">
                <!-- <img src="{{url('/images/programmer.svg')}}" alt="Programmer"/> -->
                {!! file_get_contents('images/programmer.svg') !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="mt-5 pt-md-5 text-center">
                <h2>WELCOME!</h2>
                <br>
                <p>To a place where you can enhance you coding skills at your own pace!</p>
                <p> A platform that provides personalized algorithmic challenges in an environment where you can compete with your fellow peers. With every solved problem, you will earn points. The platform will also issue the rankings of the competitors according to their earned points.</p>
                <button type="button" class="btn btn-primary px-5" data-toggle="modal" data-target="#register">Get Started</button>
            </div>
        </div>
    </div>

</div>
@endsection
