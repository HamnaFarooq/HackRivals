@extends('layouts.app')
@section('content')
<!-- <div class="content">
    <div class="title m-b-md">
        {{$problem->name}}
    </div>

    <div class="">

        <p class="card-text">{{$problem->points}}</p>
        <p class="card-text">{{$problem->statement}}</p>
        <p class="card-text">{{$problem->description}}</p>
        <p class="card-text">{{$problem->constraints}}</p>
        <p class="card-text">{{$problem->input_format}}</p>
        <p class="card-text">{{$problem->output_format}}</p>
        <p class="card-text">{{$problem->hint}}</p>
        <p class="card-text">{{$problem->explaination}}</p>
        <a href="/problem/{{$problem->id}}/edit" class="btn btn-primary">Edit</a>
        <form class="" action="/problem/{{$problem->id}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger" name="button">Delete</button>
        </form>


    </div>

</div> -->

<div class="container">

        <h3 class="">Problem Name</h3>
        <br>
        <div class="row">
          <div class="col-sm-9">
            <div class="bg-secondary rounded p-3">
              <p>{{$problem->statement}}</p>
              <br>
              <h5>Description</h5>
              <p class="mx-3">{{$problem->description}}</p>
              <br>
              <h5>Constraints</h5>
              <p class="mx-3">{{$problem->constraints}}</p>
              <br>
              <h5>Input Format</h5>
              <p class="mx-3">{{$problem->input_format}}</p>
              <br>
              <h5>Sample Input</h5>
              <p class="bg-primary m-3 p-3 rounded">
                3
                <br>
                0 10 20
              </p>
              <br>
              <h5>Output Format</h5>
              <p class="mx-3">{{$problem->output_format}}</p>
              <br>
              <h5>Sample Output</h5>
              <p class="bg-primary m-3 p-3 rounded">30</p>
              <br>
              <h5>Explaination</h5>
              <p class="mx-3">{{$problem->explaination}}</p>
              <br>
              <h5>Hint</h5>
              <p class="mx-3">{{$problem->hint}}</p>
              <br>
            </div>

            <div class="">
              IDE here
            </div>

          </div>

          <div class="col-sm-3 text-center">
            <p> <b class="mx-3">Author:</b> {{$problem->user->name}} </p>
            <br>
            <p> <b class="mx-3">Difficulty:</b> Easy </p>
            <br>
            <p> <b class="mx-3">Max Points:</b> {{$problem->points}} </p>
            <br>
            <p> <b class="mx-3">Solved by:</b> 283 </p>
          </div>
        </div>

      </div>

@endsection