@extends('layouts.app')
@section('content')

<!-- <a href="classroom" class="btn"> Go Back </a>

<div class="container-fluid">
  <div class="container">
    <h2>Edit classroom</h2>
    <form action="/classroom/{{$classroom->id}}" method="POST">
      @csrf
      @method('patch')

      <div class="form-group">
        <label for="name">classroom Name:</label>
        <input type="text" class="form-control" name="name" value="{{$classroom->name}}" placeholder="Enter classroom name" required>
      </div>

      <div class="form-group">
        <label for="classroom_type">Type:</label>
        <select name="classroom_type" class="form-control" value="{{$classroom->classroom_type}}" required>
          <option value="public">Public</option>
          <option value="private">Private</option>
        </select>
      </div>

      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" value="{{$classroom->password}}" placeholder="Enter Password" required>
      </div>

      <div class="form-group">
        <label for="starts">Starts:</label>
        <input type="datetime-local" name="starts" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="ends">Ends:</label>
        <input type="datetime-local" name="ends" class="form-control" required>
      </div>

      @if($errors->any())
      @foreach ($errors->all() as $error)
      <div class="alert alert-danger">
        {{$error}}
      </div>
      @endforeach
      @endif

      <button type="submit" class="btn btn-primary">Update</button>

    </form>
  </div>
</div> -->

<div class="container">
<h3 class="text-center">{{$classroom->name}}</h3>
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
          <tr class="table-active">
            <td>
              <div class="card border-info mb-3">
                <div class="card-header">Competition Name</div>
                <div class="card-body">
                  <h4 class="card-title">Title</h4>
                  <p class="card-text">Notes: ffffffffffffffffffffffffffffffffffffffffffffffffffffffsdddddddddddssd</p>
                  <!-- competition -->
                  <div class="card border-info mb-3">
                    <div class="card-header">Competition Name</div>
                    <div class="card-body">
                      <h4 class="card-title">CreatedBy:</h4>
                      <h6 class="card-text">Created Date:</h6>
                      <button type="button" class="btn btn-primary">Participate</button>
                    </div>
                  </div>
                </div>
              </div>
            </td>
            <td><button type="button" class="btn btn-primary">Edit</button></td>
            <td><button type="button" class="btn btn-primary">Delete</button></td>
          </tr>
          <tr>
            <td> </td>
            <td><button type="button" class="btn btn-primary">Edit</button></td>
            <td><button type="button" class="btn btn-primary">Delete</button></td>
          </tr>
          <tr>
            <td> </td>
            <td><button type="button" class="btn btn-primary">Edit</button></td>
            <td><button type="button" class="btn btn-primary">Delete</button></td>
          </tr>
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

</div>
@endsection