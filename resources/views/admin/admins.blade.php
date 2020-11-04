@extends('layouts.app')
@section('pagename')
Admins
@endsection

@section('content')
<div class="container">

  <h2>Admins</h2>
  <table class="table table-hover">

        <thead>
          <tr>
            <th scope="col">Username</th>
            <th scope="col">User Type</th>
            <th scope="col">Administrator</th>

          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr class="table-active">
            <td> {{$user->name}} </td>
            <td>{{$user->user_type}}</td>
            <td><a href="/admin/removeAdmin/{{$user->id}}"><button type="button" class="btn btn-primary">Remove</button></a></td>
          </tr>
          @endforeach
        </tbody>
      </table>

</div>
@endsection