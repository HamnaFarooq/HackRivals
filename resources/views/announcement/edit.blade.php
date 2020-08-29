@extends('layouts.app')
@section('content')

<a href="announcement" class="btn"> Go Back </a>

    <div class="container-fluid">
      <div class="container">
        <h2>Edit announcement</h2>
        <form action="/announcement/{{$announcement->id}}" method="POST">
            @csrf
            @method('patch')

          <div class="form-group">
            <label for="name">Announcement:</label>
            <input type="textarea" class="form-control" name="announcement" value="{{$announcement->announcement}}" placeholder="Enter announcement" required>
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