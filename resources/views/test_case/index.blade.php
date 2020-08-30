@extends('layouts.app')
@section('content')

<div class="content">
    <div class="title m-b-md">
        test_cases
    </div>

    <div class="">
        <a href="/test_case/create" class="btn btn-primary">Add another test_case</a>
    </div>

    <div class="">
        @foreach ( $test_cases as $test_case )

        <div class="col col-md-2" style=" min-width:25rem; padding:10px; border-radius:10px; margin:5px;">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$test_case->input}}</h5>
                    <p class="card-text">{{$test_case->output}}</p>
                    <a href="/test_case/{{$test_case->id}}" class="btn btn-primary">View</a>
                    <a href="/test_case/{{$test_case->id}}/edit" class="btn btn-primary">Edit</a>
                    <form class="" action="/test_case/{{$test_case->id}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger" name="button">Delete</button>
                    </form>
                </div>
            </div>
        </div>

        @endforeach

    </div>

</div>
@endsection