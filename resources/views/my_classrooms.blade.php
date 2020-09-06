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

        <div class="col-sm-4">
          <div class="card border-info mb-3">
            <div class="card-header">Class Name</div>
            <div class="card-body">
              <h5 class="card-title">USerName</h5>
              <h6 class="card-text">Date Created: 10/2/2020</h6>
            </div>
          </div>
        </div>

      </div>

</div>
@endsection
