@include('partials.joinclassroomform')

@extends('layouts.app')
@section('pagename')
My Classrooms
@endsection

@section('content')
<div class="container">

  <h3 class="text-center">My Classrooms</h3>

  <div class="text-right py-3">
    <button type="button" class="btn btn-primary px-5" data-toggle="modal" data-target="#joinclassroom">Join a Classroom</button>
  </div>

  <div class="row">

    @foreach ($user->joined_classrooms as $classroom)
    <div class="col-sm-4">
      <a href="/classroom/{{$classroom->id}}">
        <div class="card border-info mb-3">
          <div class="card-header"> {{ $classroom->name }} </div>
          <div class="card-body">
            <h5 class="card-title"></h5>
            <h6 class="card-text">Date Started: {{ $classroom->starts }} </h6>
          </div>
        </div>
      </a>
    </div>
    @endforeach

  </div>

</div>
@endsection