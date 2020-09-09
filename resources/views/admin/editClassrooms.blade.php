@extends('layouts.app')
@section('pagename')
Home
@endsection

@section('content')
<div class="container">

<a href="/" class="btn"> Go Back </a>

    <div class="container-fluid">
      <div class="container">
        <h2>Edit classroom</h2>
        <form action="/classroom" method="POST" autocomplete="off">
            @csrf

          <div class="form-group">
            <label for="name">Classroom Name:</label>
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

</div>
@endsection