@extends('layouts.app')
@section('content')

<a href="/problem" class="btn"> Go Back </a>

    <div class="container-fluid">
      <div class="container">
        <h2>Add problem</h2>
        <form action="/problem" method="POST" autocomplete="off">
            @csrf

          <div class="form-group">
            <label for="name">Problem Name:</label>
            <input type="text" class="form-control" name="name" placeholder="Enter problem name" required>
          </div>

          <div class="form-group">
            <label for="level">Level:</label>
            <select name="level" class="form-control" required>
              <option value="1">Introduction</option>
              <option value="2">Linear Equations</option>
              <option value="3">Conditions</option>
              <option value="4">Loops</option>
              <option value="5">Logic Building</option>
              <option value="6">Vectors/Arrays</option>
              <option value="7">References/Pointers</option>
              <option value="8">Functions</option>
            </select>
          </div>

          <div class="form-group">
            <label for="sub_level">Sub-Level:</label>
            <select name="sub_level" class="form-control" required>
              <option value="1">Biginner</option>
              <option value="2">Novice</option>
              <option value="3">Intermidiate</option>
              <option value="4">Advanced</option>
              <option value="5">Expert</option>
            </select>
          </div>

          <div class="form-group">
            <label for="statement">Problem Statement:</label>
            <input type="textarea" rows="40" class="form-control" name="statement" placeholder="Enter problem statement" required>
          </div>

          <div class="form-group">
            <label for="name">Problem Description:</label>
            <input type="textarea" rows="40" class="form-control" name="description" placeholder="Enter problem description" required>
          </div>

          <div class="form-group">
            <label for="constraints">Constraints:</label>
            <input type="textarea" rows="5" class="form-control" name="constraints" placeholder="Enter constraints" required>
          </div>

          <div class="form-group">
            <label for="input_format">Input Format:</label>
            <input type="textarea" rows="5" class="form-control" name="input_format" placeholder="Enter input format" required>
          </div>

          <div class="form-group">
            <label for="output_format">Output Format:</label>
            <input type="textarea" rows="5" class="form-control" name="output_format" placeholder="Enter output format" required>
          </div>

          <div class="form-group">
            <label for="explaination">Output Explaination:</label>
            <input type="textarea" rows="5" class="form-control" name="explaination" placeholder="Enter explaination (optional)" >
          </div>

          <div class="form-group">
            <label for="hint">Hint:</label>
            <input type="textarea" rows="5" class="form-control" name="hint" placeholder="Enter hint (optional)" >
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