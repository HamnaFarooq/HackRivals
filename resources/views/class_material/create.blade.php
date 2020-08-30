@extends('layouts.app')
@section('content')

<a href="/class_material" class="btn"> Go Back </a>

    <div class="container-fluid">
      <div class="container">
        <h2>Add class_material</h2>
        <form action="/class_material" method="POST" autocomplete="off">
            @csrf

          <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" placeholder="Enter Title" required>
          </div>

          <div class="form-group">
            <label for="announcement">Announcement (optional):</label>
            <input type="textarea" rows="40" class="form-control" name="announcement" placeholder="Enter announcement" required>
          </div>

          <div class="form-group">
          <label for="announcement">Competition (optional):</label>
          <button class="btn btn-secondary">Create Competition</button>
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