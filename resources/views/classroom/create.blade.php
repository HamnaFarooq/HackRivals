@extends('layouts.app')
@section('content')

<a href="/classroom" class="btn"> Go Back </a>

    <div class="container-fluid">
      <div class="container">
        <h2>Add classroom</h2>
        <form action="/classroom" method="POST" autocomplete="off">
            @csrf

          <div class="form-group">
            <label for="name">classroom Name:</label>
            <input type="text" class="form-control" name="name" placeholder="Enter classroom name" required>
          </div>

          <div class="form-group">
            <label for="classroom_type">Type:</label>
            <select name="classroom_type" class="form-control" required>
              <option value="public">Public</option>
              <option value="private">Private</option>
            </select>
          </div>

          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
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

          <button type="submit" class="btn btn-primary">Submit</button>

        </form>
        </div>
    	</div>

@endsection