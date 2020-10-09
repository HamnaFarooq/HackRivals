@extends('layouts.app')

@section('pagename')
Edit {{$problem->name}}
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
              <option value="1" {{ ($problem->level == '1' ? "selected":"") }} >Introduction</option>
              <option value="2" {{ ($problem->level == '2' ? "selected":"") }} >Linear Equations</option>
              <option value="3" {{ ($problem->level == '3' ? "selected":"") }} >Conditions</option>
              <option value="4" {{ ($problem->level == '4' ? "selected":"") }} >Loops</option>
              <option value="5" {{ ($problem->level == '5' ? "selected":"") }} >Logic Building</option>
              <option value="6" {{ ($problem->level == '6' ? "selected":"") }} >Vectors/Arrays</option>
              <option value="7" {{ ($problem->level == '7' ? "selected":"") }} >References/Pointers</option>
              <option value="8" {{ ($problem->level == '8' ? "selected":"") }} >Functions</option>
            </select>
          </div>

          <div class="form-group">
            <label for="level">Sub-Level:</label>
            <select name="level" class="form-control" required>
              <option value="1" {{ ($problem->sub_level == '1' ? "selected":"") }}>Biginner</option>
              <option value="2" {{ ($problem->sub_level == '2' ? "selected":"") }} >Novice</option>
              <option value="3" {{ ($problem->sub_level == '3' ? "selected":"") }} >Intermidiate</option>
              <option value="4" {{ ($problem->sub_level == '4' ? "selected":"") }} >Advanced</option>
              <option value="5" {{ ($problem->sub_level == '5' ? "selected":"") }} >Expert</option>
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