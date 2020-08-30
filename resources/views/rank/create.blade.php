@extends('layouts.app')
@section('content')

<a href="/rank" class="btn"> Go Back </a>

    <div class="container-fluid">
      <div class="container">
        <h2>Add rank</h2>
        <form action="/rank" method="POST" autocomplete="off">
            @csrf

            <div class="form-group">
            <label for="points">rank Input: 1</label>
            <input type="text" class="form-control" name="points" placeholder="Enter Points" required>
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