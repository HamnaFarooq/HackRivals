@extends('layouts.app')

@section('pagename')
{{$problem->name}}
@endsection

@section('content')

<div class="container">
  @if($errors->any())
  <div class="container">
    <div class="row bg-light py-3 justify-content-center">
      <div class="bg-light text-danger"> <b> {{ "There was an error. Please try again!" }} </b> </div>
    </div>
  </div>
  @endif

  <h3 class="">Problem Name</h3>
  <br>
  <div class="row">
    <div class="col-sm-9">
      <div class="bg-secondary rounded p-3">
        <p>{{$problem->statement}}</p>
        <br>
        <h5>Description</h5>
        <p class="mx-3">{{$problem->description}}</p>
        <br>
        <h5>Constraints</h5>
        <p class="mx-3">{{$problem->constraints}}</p>
        <br>
        <h5>Input Format</h5>
        <p class="mx-3">{{$problem->input_format}}</p>
        <br>
        <h5>Output Format</h5>
        <p class="mx-3">{{$problem->output_format}}</p>
        <br>
        <h5>Sample Input</h5>
        <p class="bg-primary m-3 p-3 text-white rounded">{{$problem->sample_input}}</p>
        <br>
        <h5>Sample Output</h5>
        <p class="bg-primary m-3 p-3 text-white rounded">{{$problem->sample_output}}</p>
        <br>
        @if($problem->explaination)
        <h5>Explaination</h5>
        <p class="mx-3">{{$problem->explaination}}</p>
        <br>
        @endif
        @if($problem->hint)
        <h5>Hint</h5>
        <p class="mx-3">{{$problem->hint}}</p>
        <br>
        @endif
      </div>

    </div>

    <div class="col-sm-3 text-center">
      <p> <b class="mx-3">Author:</b> {{$problem->user->name}} </p>
      <br>
      <p> <b class="mx-3">Difficulty:</b> {{$problem->level}} </p>
      <br>
      <p> <b class="mx-3">Max Points:</b> {{$problem->points}} </p>
      <br>
      <p> <b class="mx-3">Solved by:</b> {{$problem->solved_by}} </p>
    </div>


  </div>
  <div class="row my-5">
    <div class="col-sm-8">
      <h5>Test your code here</h5>
      <div class="sec-widget" data-widget="33e3794dd681f8770e91f69247aff06f"></div>
      <script>
        SEC_HTTPS = true;
        SEC_BASE = "compilers.widgets.sphere-engine.com";
        (function(d, s, id) {
          SEC = window.SEC || (window.SEC = []);
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s);
          js.id = id;
          js.src = (SEC_HTTPS ? "https" : "http") + "://" + SEC_BASE + "/static/sdk/sdk.js";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, "script", "sphere-engine-compilers-jssdk"));
      </script>
    </div>

    <div class="col-sm-4">
      <h5>Submit your code here</h5>
      <form action="/submitcode" method="POST">
        @csrf

        <div class="form-group">
          <label for="language">Language:</label>
          <select name="language" class="form-control">
            <option value="cpp">cpp</option>
            <option value="c">c</option>
            <option value="objective-c">objective-c</option>
            <option value="java">java</option>
            <option value="kotlin">kotlin</option>
            <option value="scala">scala</option>
            <option value="swift">swift</option>
            <option value="csharp">csharp</option>
            <option value="go">go</option>
            <option value="haskell">haskell</option>
            <option value="erlang">erlang</option>
            <option value="perl">perl</option>
            <option value="python">python</option>
            <option value="python3">python3</option>
            <option value="ruby">ruby</option>
            <option value="php">php</option>
            <option value="bash">bash</option>
            <option value="r">r</option>
            <option value="javascript">javascript</option>
            <option value="coffeescript">coffeescript</option>
            <option value="vb">vb</option>
            <option value="cobol">cobol</option>
            <option value="fsharp">fsharp</option>
            <option value="d">d</option>
            <option value="clojure">clojure</option>
            <option value="elixir">elixir</option>
            <option value="mysql">mysql</option>
            <option value="rust">rust</option>
            <option value="scheme">scheme</option>
            <option value="commonlisp">commonlisp</option>
            <option value="plain">plain</option>
          </select>
        </div>

        <div class="form-group">
          <label for="solution">Code:</label>
          <textarea name="solution" class="form-control" rows="15"></textarea>
        </div>
        <input type="hidden" name="points" value="{{$problem->points}}">
        <input type="hidden" name="problem_id" value="{{$problem->id}}">
        @if($comp)
        <input type="hidden" name="source" value="{{$comp}}">
        @else
        <input type="hidden" name="source" value="practice">
        @endif

        @if($errors->any())
        @foreach ($errors->all() as $error)
        <div class="text-danger">
          {{$error}}
        </div>
        @endforeach
        @endif

        <div class="text-right">
          <button class="btn btn-primary">
            Submit Code
          </button>
        </div>
      </form>
    </div>
  </div>

</div>

@endsection