@extends('layouts.app')
@section('pagename')
Classrooms
@endsection

<!-- foreach loop $classrooms -->

@section('content')
<div class="container">
  <div class="row">
    <h3 class="text-center">All Classrooms List</h3>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>

        @foreach ($classrooms as $classroom)
        <tr class="table-active">
          <td>
            <div class="row-sm-4">
              <div class="card border-info mb-3">
                <div class="card-header">Name: {{$classroom->name}}</div>
                <div class="card-body">
                  <p class="card-text">Type: {{$classroom->classroom_type}}
                    <p>
                      <h4 class="card-title">Password: {{$classroom->password}}</h4>
                </div>
              </div>
            </div>
          </td>
          <td><a href="/admin/editClassroom/{{$classroom->id}}"><button type="button" class="btn btn-primary">Edit</button></a></td>
          <td><a href="/admin/deleteClassroom/{{$classroom->id}}"><button type="button" class="btn btn-primary">Delete</button></a></td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>
</div>
@endsection