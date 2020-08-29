@extends('layouts.app')
@section('content')

<a href="contest" class="btn"> Go Back </a>

    <div class="container-fluid">
      <div class="container">
        <h2>Edit contest</h2>
        <form action="/contest/{{$contest->id}}" method="POST">
            @csrf
            @method('patch')

          <div class="form-group">
            <label for="name">contest Name:</label>
            <input type="text" class="form-control" name="name" value="{{$contest->name}}" placeholder="Enter contest name" required>
          </div>

          <div class="form-group">
            <label for="contest_type">Type:</label>
            <select name="contest_type" class="form-control" value="{{$contest->contest_type}}" required>
              <option value="public">Public</option>
              <option value="private">Private</option>
            </select>
          </div>

          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" value="{{$contest->password}}" placeholder="Enter Password" required>
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
    	</div>

@endsection