@extends('layouts.app')
@section('pagename')
Edit User
@endsection

@section('content')
<div class="container">



    <div class="container-fluid">
      <div class="container">
        <h2>Edit User</h2>
        <form action="/admin/updateUser/{{$user->id}}" method="POST" autocomplete="off">
        @csrf
      @method('patch')

          <div class="form-group">
            <label for="name">User Name:</label>
            <input type="text" value="{{$user->name}}" class="form-control" name="name" placeholder="Enter user name" required>
          </div>

          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" value="{{$user->email}}" class="form-control" name="email" placeholder="Enter user e-mail" required>
          </div>

          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" value="{{$user->password}}" class="form-control" name="password" placeholder="Enter Password" required>
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