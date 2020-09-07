@extends('layouts.app')
@section('content')

<!-- <a href="competition" class="btn"> Go Back </a>

    <div class="container-fluid">
      <div class="container">
        <h2>Edit competition</h2>
        <form action="/competition/{{$competition->id}}" method="POST">
            @csrf
            @method('patch')

          <div class="form-group">
            <label for="name">competition Name:</label>
            <input type="text" class="form-control" name="name" value="{{$competition->name}}" placeholder="Enter competition name" required>
          </div>

          <div class="form-group">
            <label for="competition_type">Type:</label>
            <select name="competition_type" class="form-control" value="{{$competition->competition_type}}" required>
              <option value="public">Public</option>
              <option value="private">Private</option>
            </select>
          </div>

          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" value="{{$competition->password}}" placeholder="Enter Password" required>
          </div>

          <div class="form-group">
            <label for="starts">Starts:</label>
            <input type="datetime-local" name="starts" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="ends">Ends:</label>
            <input type="datetime-local" name="ends" class="form-control" required>
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
       -->

<div class="container-fluid">
  <div class="container">
    <h3>Create Competition</h3>
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#details">Details</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#landing_page">Landing Page</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#problems">Problems</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#statistics">Statistics</a>
      </li>

    </ul>

    <form action="/competition/{{$competition->id}}" method="POST">
      @csrf
      @method('patch')

      <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade  pt-3 show active" id="details">

          <div class="form-group">
            <label for="name">Competition Name:</label>
            <input type="text" class="form-control" name="name" value="{{$competition->name}}" placeholder="Enter Competition Name" required>
          </div>

          <div class="form-group">
            <label for="competition_type">Type:</label>
            <select name="competition_type" class="form-control" required>
              <option value="public">Public</option>
              <option value="private">Private</option>
            </select>
          </div>

          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" value="{{$competition->password}}" placeholder="Enter Password" required>
          </div>

          <div class="form-group">
            <label for="starts">Starts:</label>
            <input type="datetime-local" name="starts" class="form-control">
          </div>

          <div class="form-group">
            <label for="ends">Ends:</label>
            <input type="datetime-local" name="ends" class="form-control">
          </div>

        </div>
        <div class="tab-pane fade pt-3" id="landing_page">

          <div class="form-group">
            <label for="landing_image">Landing Page image</label>
            <input type="file" class="form-control-file" id="landing_image" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">The image should be 1024 x 768 at least.</small>
          </div>

          <div class="form-group">
            <label for="tagline">Competition Tagline:</label>
            <input type="text" class="form-control" name="tagline" placeholder="Enter Tagline" required>
          </div>

          <div class="form-group">
            <label for="description">Competition Description:</label>
            <input type="text" class="form-control" name="description" placeholder="Enter Description" required>
          </div>

          <div class="form-group">
            <label for="rules">Competition Rules:</label>
            <input type="text" class="form-control" name="rules" placeholder="Enter Rules" required>
          </div>

        </div>
        <div class="tab-pane fade pt-3" id="problems">

          <div class="card border-info mb-3">
            <div class="card-header">Problem Name</div>
          </div>

          <button type="button" class="btn btn-primary">Create Problem</button>
          <button type="button" class="btn btn-primary">Add Problem</button>

          <br>
          <div class="dropdown-divider"></div>

          <div class="text-right"> <button type="submit" class="btn btn-success">Submit</button> </div>


        </div>
        <div class="tab-pane fade pt-3" id="statistics">
          <div class="row">
            <div class="col-sm-3">
              <div class="card border-info mb-3">
                <div class="card-header">Signup Count:</div>
                <div class="card-body">
                  <p class="card-text">30</p>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <div class="card border-info mb-3">
                <div class="card-header">Number of Submissions:</div>
                <div class="card-body">
                  <p class="card-text">9</p>
                </div>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="card border-info mb-3">
                <div class="card-header">Sigups:</div>
                <div class="card-body">
                  <div class="row">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Email</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="table-active">
                          <td>567</td>
                          <td> user@email.com</td>
                        </tr>
                        <tr>
                          <td>567</td>
                          <td>username@gmail.com</td>
                        </tr>
                        <tr>
                          <td>567</td>
                          <td>username@gmail.com</td>
                        </tr>
                        <tr>
                          <td>567</td>
                          <td>username@gmail.com</td>
                        </tr>
                        <tr>
                          <td>567</td>
                          <td>username@gmail.com</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                </div>
              </div>
            </div>

          </div>

        </div>
      </div>

      @if($errors->any())
      @foreach ($errors->all() as $error)
      <div class="alert alert-danger">
        {{$error}}
      </div>
      @endforeach
      @endif
    </form>
  </div>
</div>


@endsection