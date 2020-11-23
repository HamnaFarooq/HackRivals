@include('partials.joinclassroomform')

@extends('layouts.app')
@section('pagename')
My Classrooms
@endsection

@section('content')
<div class="container">
  @if($errors->any())
  <div class="container">
    <div class="row bg-light py-3 justify-content-center">
      <div class="bg-light text-danger"> <b> {{ "There was an error. Please try again!" }} </b> </div>
    </div>
  </div>
  @endif

  <h3 class="text-center">My Classrooms</h3>

  <div class="text-right py-3">
    <button type="button" class="btn btn-primary px-5" data-toggle="modal" data-target="#joinclassroom">Join a Classroom</button>
  </div>

  <div class="row">

    @foreach ($user->joined_classrooms as $classroom)
    <div class="col-sm-4">
      <a href="/classroom/{{$classroom->id}}">
        <div class="card bg-light text-primary mb-3">
          <div class="card-header"> <b>{{ $classroom->name }}</b> </div>
          <div class="card-body">
            <h5 class="card-title"></h5>
            <h6 class="card-text"><b>Date Started:</b> {{ $classroom->starts }} </h6>
          </div>
        </div>
      </a>
    </div>
    @endforeach

  </div>

</div>
@endsection