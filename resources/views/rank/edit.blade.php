@extends('layouts.app')
@section('content')

<a href="rank" class="btn"> Go Back </a>

    <div class="container-fluid">
      <div class="container">
        <h2>Edit rank</h2>
        <form action="/rank/{{$rank->id}}" method="POST">
            @csrf
            @method('patch')

          <div class="form-group">
            <label for="points">rank Input:</label>
            <input type="text" class="form-control" name="points" value="{{$rank->points}}" placeholder="Enter Points" required>
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