@extends('layouts.app')

@section('pagename')
Edit {{$competition->name}}
@endsection

@section('content')

    <div class="container-fluid">
      <div class="container">
        <h2>Edit problem</h2>
        <form action="/problem/{{$problem->id}}" method="POST">
            @csrf
            @method('patch')

          <div class="form-group">
            <label for="name">Problem Name:</label>
            <input type="text" class="form-control" name="name" value="{{$problem->name}}" placeholder="Enter problem name" required>
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
            <label for="level">Sub-Level:</label>
            <select name="level" class="form-control" required>
              <option value="1">Biginner</option>
              <option value="2">Novice</option>
              <option value="3">Intermidiate</option>
              <option value="4">Advanced</option>
              <option value="5">Expert</option>
            </select>
          </div>

          <div class="form-group">
            <label for="statement">Problem Statement:</label>
            <textarea rows="2" class="form-control" name="statement" placeholder="Enter problem statement" required> {{$problem->statement}} </textarea>
          </div>

          <div class="form-group">
            <label for="name">Problem Description:</label>
            <textarea rows="5" class="form-control" name="description" placeholder="Enter problem description" required> {{$problem->description}} </textarea>
          </div>

          <div class="form-group">
            <label for="constraints">Constraints:</label>
            <textarea rows="1" class="form-control" name="constraints" placeholder="Enter constraints" required> {{$problem->constraints}} </textarea>
          </div>

          <div class="form-group">
            <label for="input_format">Input Format:</label>
            <textarea rows="2" class="form-control" name="input_format" placeholder="Enter input format" required> {{$problem->input_format}} </textarea>
          </div>

          <div class="form-group">
            <label for="output_format">Output Format:</label>
            <textarea rows="2" class="form-control" name="output_format" placeholder="Enter output format" required> {{$problem->output_format}} </textarea>
          </div>

          <div class="form-group">
            <label for="explaination">Output Explaination:</label>
            <textarea class="form-control" rows="3" name="explaination" placeholder="Enter explaination (optional)"> {{$problem->explaination}}</textarea>
          </div>

          <div class="form-group">
            <label for="hint">Hint:</label>
            <textarea rows="1" class="form-control" name="hint" placeholder="Enter hint (optional)"> {{$problem->hint}} </textarea>
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