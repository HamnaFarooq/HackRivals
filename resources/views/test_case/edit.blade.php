@extends('layouts.app')
@section('content')

<a href="test_case" class="btn"> Go Back </a>

    <div class="container-fluid">
      <div class="container">
        <h2>Edit test_case</h2>
        <form action="/test_case/{{$test_case->id}}" method="POST">
            @csrf
            @method('patch')

          <div class="form-group">
            <label for="input">test_case Input:</label>
            <input type="textarea" rows="40" class="form-control" name="input" value="{{$test_case->input}}" placeholder="Enter Input" required>
          </div>

          <div class="form-group">
            <label for="output">test_case Output:</label>
            <input type="textarea"  rows="40" class="form-control" name="output" value="{{$test_case->output}}" placeholder="Enter Output" required>
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