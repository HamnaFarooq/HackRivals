@extends('layouts.app')
@section('pagename')
Edit Competition
@endsection

@section('content')
<div class="container-fluid">
  <div class="container">
    <h3>Edit Private Competition</h3>
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#details">Details</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#landing_page">Landing Page</a>
      </li>
      

    </ul>

    <form action="/competition/{{$competition->id}}" method="POST">
      @csrf
      @method('patch')

      <div class="form-group">
        <label for="name">Edit Competition Name:</label>
        <input type="text" class="form-control" name="name" value="{{$competition->name}}" placeholder="Enter Competition Name" required>
      </div>

      <div class="form-group">
        <label for="competition_type">Edit Type:</label>
        <select value="{{$competition->competition_type}}" name="competition_type" class="form-control" required>
          <option value="public">Public</option>
          <option value="private">Private</option>
        </select>
      </div>

      <div class="form-group">
        <label for="password">Edit Password:</label>
        <input type="password" class="form-control" name="password" value="{{$competition->name}}"  placeholder="Enter Password" required>
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