@extends('layouts.app')
@section('pagename')
Users
@endsection

@section('content')
<div class="container">

  <h3>Users</h3>
  <br>
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#user_list">User List</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#modetator_list">SuperUser List</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#block_user">Block User</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#block_moderator">Block SuperUser</a>
    </li>
  </ul>

  <div id="myTabContent" class="tab-content">
    <div class="tab-pane fade pt-3 show active" id="user_list">

      <h4>Users</h4>
      <table class="table table-hover">

        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">User Type</th>
            <th scope="col">Edit</th>
            <th scope="col">Block</th>
            <th scope="col">Admin</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr class="table-active">
            <td> {{$user->name}} </td>
            <td> {{$user->email}} </td>
            <td>{{$user->user_type}}</td>
            <td><a href="/admin/editUser/{{$user->id}}"><button type="button" class="btn btn-primary">Edit</button></td></a>
            <td><a href="/admin/blockUser/{{$user->id}}"><button type="button" class="btn btn-primary">Block</button></a></td>
            <td><a href="/admin/makeAdmin/{{$user->id}}"><button type="button" class="btn btn-primary">Make</button></a></td>

            <td><a href="/admin/deleteUser/{{$user->id}}"><button type="button" class="btn btn-primary">Delete</button></a></td>

          </tr>
          @endforeach
        </tbody>
      </table>

    </div>
    <div class="tab-pane fade pt-3" id="modetator_list">

      <h4>SuperUsers</h4>

      <table class="table table-hover">

        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">User Type</th>
            <th scope="col">Edit</th>
            <th scope="col">Block</th>
            <th scope="col">Admin</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach($superusers as $user)
          <tr class="table-active">
            <td> {{$user->name}} </td>
            <td> {{$user->email}} </td>
            <td>{{$user->user_type}}</td>
            <td><a href="/admin/editUser/{{$user->id}}"><button type="button" class="btn btn-primary">Edit</button></td></a>
            <td><a href="/admin/blockUser/{{$user->id}}"><button type="button" class="btn btn-primary">Block</button></a></td>
            <td><a href="/admin/makeAdmin/{{$user->id}}"><button type="button" class="btn btn-primary">Make</button></a></td>

            <td><a href="/admin/deleteUser/{{$user->id}}"><button type="button" class="btn btn-primary">Delete</button></td></a>
            </form>
          </tr>
          @endforeach
        </tbody>
      </table>


    </div>
    <div class="tab-pane fade pt-3" id="block_user">

      <h4>Block Users</h4>

      <table class="table table-hover">

        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">User Type</th>
            <th scope="col">UnBlock</th>

          </tr>
        </thead>
        <tbody>
          @foreach($blockusers as $user)
          <tr class="table-active">
            <td> {{$user->name}} </td>
            <td> {{$user->email}} </td>
            <td>{{$user->user_type}}</td>
            <td><a href="/admin/unBlockUser/{{$user->id}}"><button type="button" class="btn btn-primary">UnBlock</button></a></td>
          </tr>
          @endforeach
        </tbody>
      </table>


    </div>
    <div class="tab-pane fade pt-3" id="block_moderator">

      <h4>Blocked SuperUsers</h4>

      <table class="table table-hover">

        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">User Type</th>
            <th scope="col">UnBlock</th>

          </tr>
        </thead>
        <tbody>
          @foreach($blockedsuperusers as $user)
          <tr class="table-active">
            <td> {{$user->name}} </td>
            <td> {{$user->email}} </td>
            <td>{{$user->user_type}}</td>
            <td><a href="/unBlockUser/{{$user->id}}"><button type="button" class="btn btn-primary">UnBlock</button></a></td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  </div>

</div>
@endsection