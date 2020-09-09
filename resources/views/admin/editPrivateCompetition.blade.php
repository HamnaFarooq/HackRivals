@extends('layouts.app')
@section('pagename')
Home
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

    <form action="/competition" method="POST" autocomplete="off">
      @csrf

      <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade  pt-3 show active" id="details">

          <div class="form-group">
            <label for="name">Edit Competition Name:</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Competition Name" required>
          </div>

          <div class="form-group">
            <label for="competition_type">Edit Type:</label>
            <select name="competition_type" class="form-control" required>
              <option value="public">Public</option>
              <option value="private">Private</option>
            </select>
          </div>

          <div class="form-group">
            <label for="password">Edit Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
          </div>


        </div>
        <div class="tab-pane fade pt-3" id="landing_page">

          <div class="form-group">
            <label for="landing_image">Landing Page image</label>
            <input type="file" class="form-control-file" id="landing_image" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">The image should be 1024 x 768 at least.</small>
          </div>

          <div class="form-group">
            <label for="tagline">Edit Competition Tagline:</label>
            <input type="text" class="form-control" name="tagline" placeholder="Enter Tagline" required>
          </div>

          <div class="form-group">
            <label for="description">Edit Competition Description:</label>
            <input type="text" class="form-control" name="description" placeholder="Enter Description" required>
          </div>

          <div class="form-group">
            <label for="rules">Edit Competition Rules:</label>
            <input type="text" class="form-control" name="rules" placeholder="Enter Rules" required>
          </div>


        </div>


      @if($errors->any())
      @foreach ($errors->all() as $error)
      <div class="alert alert-danger">
        {{$error}}
      </div>
      @endforeach
      @endif

      <div class="text-right"><button type="button" class="btn btn-primary">Update</button></div>

    </form>
  </div>
</div>
@endsection