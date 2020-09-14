@extends('layouts.app')
@section('pagename')
Edit Classroom
@endsection

@section('content')
<div class="container">



    <div class="container-fluid">
      <div class="container">
        <h2>Edit classroom</h2>
        <form action="/admin/updateClassroom/{{$classroom->id}}" method="POST" autocomplete="off">
        @csrf
      @method('patch')

          <div class="form-group">
            <label for="name">Classroom Name:</label>
            <input type="text" value="{{$classroom->name}}" class="form-control" name="name" placeholder="Enter classroom name" required>
          </div>

          <div class="form-group">
            <label for="classroom_type">Type:</label>
            <select value="{{$classroom->classroom_type}}" name="classroom_type" class="form-control" required>
              <option value="public">Public</option>
              <option value="private">Private</option>
            </select>
          </div>

          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" value="{{$classroom->password}}" class="form-control" name="password" placeholder="Enter Password" required>
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

</div>
@endsection