@include('partials.joincompetitionform')

@extends('layouts.app')
@section('pagename')
My Competitions
@endsection

@section('content')
<div class="container">

  <h3 class="text-center">My Competitions</h3>

  <ul class="nav nav-tabs mb-4">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#private-joined">Private</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#public-joined">Public</a>
    </li>
  </ul>

  <div class="text-right">
    <button type="button" class="btn btn-primary px-5" data-toggle="modal" data-target="#joincompetition">Join a Competition</button>
  </div>

  <div id="myTabContent" class="tab-content">
    <div class="tab-pane fade pt-4 active show" id="private-joined">
      <div class="row">

        @foreach ($user->joined_competitions as $competition)
        @if($competition->competition_type == 'private')
        <a href="/competition/{{$competition->id}}">
          <div class="col-sm-4">
            <div class="card border-info mb-3">
              <div class="card-header">{{$competition->name}}</div>
              <div class="card-body">
                <h6 class="card-text">Start Time: {{ $competition->starts }}</h6>
                <h6 class="card-text">End Time: {{ $competition->ends }}</h6>
              </div>
            </div>
          </div>
        </a>
        @endif
        @endforeach

      </div>
    </div>

    <div class="tab-pane fade pt-4" id="public-joined">
      <div class="row">

        @foreach ($user->joined_competitions as $competition)
        @if($competition->competition_type == 'public')
        <div class="col-sm-4">
          <a href="/competition/{{$competition->id}}">
            <div class="card border-info mb-3">
              <div class="card-header">{{$competition->name}}</div>
              <div class="card-body">
                <h6 class="card-text">Start Time: {{ $competition->starts }}</h6>
                <h6 class="card-text">End Time: {{ $competition->ends }}</h6>
              </div>
            </div>
          </a>
        </div>
        @endif
        @endforeach

      </div>
    </div>
  </div>
</div>
@endsection