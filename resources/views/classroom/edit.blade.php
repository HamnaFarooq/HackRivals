@include('partials.edit_classroom_form')
@include('partials.add_material_form')


@extends('layouts.app')

@section('pagename')
Edit Classroom
@endsection

@section('content')

<div class="container">
  <h3 class="text-center">{{$classroom->name}}</h3>

  <div class="text-right py-3 my-3">
    <button type="button" class="btn btn-primary px-5" data-toggle="modal" data-target="#add_material">Add Material</button>
    <button type="button" class="btn btn-primary px-5" data-toggle="modal" data-target="#edit_classroom">Settings</button>
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
          @include('partials.edit_material_form')
            <tr class="table-active">
              <td>
                <div class="card border-primary mb-3">
                  <div class="card-header">{{$material->title}}</div>
                  <div class="card-body">
                    <h4 class="card-title">Note:</h4>
                    <p class="card-text"> {{$material->announcement}}</p>
                    <p class="card-text"><b> Competition:</b> {{$material->contest_id}}</p>
                  </div>
                </div>
              </td>
              <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_material">Edit</button> </td>
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

      <h2>Class Rankings</h2>
      <table class="table table-hover">

        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Email</th>
            <th scope="col">Points</th>

          </tr>
        </thead>
        <tbody>
          <tr class="table-active">
            <td>33</td>
            <td> user@email.com</td>
            <td>Points</td>

          </tr>
          <tr class="table-active">
            <td>33</td>
            <td> user@email.com</td>
            <td>Points</td>

          </tr>
          <tr class="table-active">
            <td>33</td>
            <td> user@email.com</td>
            <td>Points</td>

          </tr>
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