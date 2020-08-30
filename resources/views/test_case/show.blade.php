@extends('layouts.app')
@section('content')
<div class="content">
    <div class="title m-b-md">
    Test Case:
    </div>

    <div class="">

                    <p class="card-text">{{$test_case->input}}</p>
                    <p class="card-text">{{$test_case->output}}</p>
                    <a href="/test_case/{{$test_case->id}}/edit" class="btn btn-primary">Edit</a>
                    <form class="" action="/test_case/{{$test_case->id}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger" name="button">Delete</button>
                    </form>


    </div>

</div>
@endsection