@include('partials.edit_competition_form')
@include('partials.add_user_problem_form')
@include('partials.create_problem_form')
@include('partials.add_problem_form')
@include('partials.competition_info')

@extends('layouts.app')

@section('pagename')
Edit {{$competition->name}}
@endsection

@section('content')

<div class="container-fluid">
  <div class="container">
    <h3>Edit {{$competition->name}}</h3>

    <div class="text-right">
      @if($competition->competition_type == 'private')
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#share_competition">Share</button>
      @endif
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_competition">Settings</button>
    </div>

    <ul class="nav nav-tabs pt-3">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#problems">Problems</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#statistics">Statistics</a>
      </li>
    </ul>

    <div id="myTabContent" class="tab-content">

      <div class="tab-pane fade show active" id="problems">

        <div class="text-right py-3">
          <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#create_problem">Create New Problem</button>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_user_problem">Add Your Problem</button>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_problem">Add Hackrival Problem</button>
        </div>

        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Problem Name</th>
              <th scope="col" class="text-right">View</th>
              <th scope="col" class="text-right">Remove</th>
            </tr>
          </thead>
          <tbody>

          @foreach ( $competition->problems as $problem )
            <tr>
              <td>
                <h5>{{$problem->name}}</h5>
              </td>
              <td class="text-right"> <a href="/problem/{{$problem->id}}"> <button type="button" class="btn btn-primary"> View </button> </a> </td>
              <td class="text-right"> <a href="/competition/{{$competition->id}}/removeproblem/{{$problem->id}}"> <button type="button" class="btn btn-danger"> Remove </button> </a> </td>
            </tr>
            @endforeach

          </tbody>
        </table>



      </div>
      <div class="tab-pane fade pt-3" id="statistics">
        <div class="row">
          <div class="col-sm-3">
            <div class="card border-info mb-3">
              <div class="card-header">Signup Count:</div>
              <div class="card-body">
                <p class="card-text">{{ 0 + $competition->participents_count }}</p>
              </div>
            </div>
          </div>

          <div class="col-sm-3">
            <div class="card border-info mb-3">
              <div class="card-header">Number of Submissions:</div>
              <div class="card-body">
                <p class="card-text">{{ 0 + $competition->ranks_count }}</p>
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="card border-info mb-3">
              <div class="card-header">Sigups:</div>
              <div class="card-body">
                <div class="row">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Email</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ( $competition->participents as $user)
                      <tr>
                          <td> {{ $user->id }} </td>
                          <td> {{ $user->email }} </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>

              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
</div>


@endsection