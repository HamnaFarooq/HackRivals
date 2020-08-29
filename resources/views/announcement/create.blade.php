@extends('layouts.app')
@section('content')

<a href="/announcement" class="btn"> Go Back </a>

    <div class="container-fluid">
      <div class="container">
        <h2>Add announcement</h2>
        <form action="/announcement" method="POST" autocomplete="off">
            @csrf

          <div class="form-group">
            <label for="announcement">Announcement:</label>
            <input type="text" class="form-control" name="announcement" placeholder="Enter Announcement" required>
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