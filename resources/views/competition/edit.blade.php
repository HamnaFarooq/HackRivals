@include('partials.edit_competition_form')
@include('partials.add_user_problem_form')
@include('partials.add_problem_form')

@extends('layouts.app')

@section('pagename')
Edit {{$competition->name}}
@endsection

@section('content')

<div class="container-fluid">
  <div class="container">
    <h3>Edit {{$competition->name}}</h3>

    <div class="text-right">
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
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_user_problem">Add Your Problem</button>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_problem">Add HackRival Problem</button>
        </div>

        <div class="card border-info mb-3">
          <div class="card-header">Problem Name</div>
        </div>

      </div>
      <div class="tab-pane fade pt-3" id="statistics">
        <div class="row">
          <div class="col-sm-3">
            <div class="card border-info mb-3">
              <div class="card-header">Signup Count:</div>
              <div class="card-body">
                <p class="card-text">0</p>
              </div>
            </div>
          </div>

          <div class="col-sm-3">
            <div class="card border-info mb-3">
              <div class="card-header">Number of Submissions:</div>
              <div class="card-body">
                <p class="card-text">0</p>
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
                      <!-- <tr>
                          <td>567</td>
                          <td> user@email.com</td>
                        </tr> -->
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