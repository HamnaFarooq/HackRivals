@include('partials.edit_classroom_form')
@include('partials.add_material_form')
@include('partials.create_competition_form')

@extends('layouts.app')
@section('pagename')
Edit {{$classroom->name}}
@endsection

@section('content')


<div class="container">
  <h3 class="text-center">{{$classroom->name}}</h3>

  <div class="text-right py-3 my-3">
    <button type="button" class="btn btn-primary px-5" data-toggle="modal" data-target="#add_material">Add Material</button>
    <button type="button" class="btn btn-primary px-5" data-toggle="modal" data-target="#edit_classroom">Settings</button>
    <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#create_competition">Create Competition</button>
  </div>

  <div class="row">

    <div class="col-lg-8">

      <div class="row">

        <table class="table table-hover">

          <thead>
            <tr>
              <th scope="col">Material</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($classroom->materials as $material)
            <tr class="table-active">
              <td>
                <div class="card border-primary mb-3">
                  <div class="card-header">{{$material->title}}</div>
                  <div class="card-body">
                    @if( $material->announcement )
                    <p class="card-text"> {{$material->announcement}}</p>
                    @endif
                    @if( $material->competition_id )
                    <p class="card-text"><b> Competition:</b> <a href="/competition/{{$material->competition_id}}/edit"> <button class="btn btn-primary"> Edit Competition </button> </a> </p>
                    @endif
                  </div>
                </div>
              </td>
              <td> 
              @include('partials.edit_material_form')
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_{{$material->id}}">Edit</button> </td>
              <td>
                <form action="/classroom/{{$classroom->id}}/class_material/{{$material->id}}" method="post">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-primary" name="button">Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

      </div>
    </div>

    <div class="col-lg-4">

      <h2>Class Rankings <a href="/update_class_rankings/{{$classroom->id}}"> <button type="button" class="btn btn-primary"> Update </button> </a> </h2>
      <table class="table table-hover">

        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col"></th>
            <th scope="col">Points</th>

          </tr>
        </thead>
        <tbody>

          @foreach ($classroom->rankings as $rank)
          <tr class="table-active">
            <td> {{ $rank->user_id }} </td>
            <td> </td>
            <td> {{ $rank->points }} </td>
          </tr>
          @endforeach

        </tbody>
      </table>

    </div>

  </div>

  <div class="text-right py-3 my-3">
    <form class="" action="/classroom/{{$classroom->id}}" method="post">
      @csrf
      @method('delete')
      <button type="submit" class="btn btn-danger">Delete Classroom</button>
    </form>
  </div>

</div>
@endsection