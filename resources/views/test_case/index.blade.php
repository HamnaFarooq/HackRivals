@include('partials.add_test_case_form')

@extends('layouts.app')
@section('pagename')
Add Test_cases
@endsection
@section('content')


<div class="content">
    @if($errors->any())
    <div class="container">
        <div class="row bg-light py-3 justify-content-center">
            <div class="bg-light text-danger"> <b> {{ "There was an error. Please try again!" }} </b> </div>
        </div>
    </div>
    @endif
    <h3>Test Cases</h3>

    <div class="">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_test_case">Add another test_case</button>
    </div>

    <div class="row">
        @foreach ( $test_cases as $test_case )
        @include('partials.edit_test_case')

        <div class="col col-md-2" style=" min-width:25rem; padding:10px; border-radius:10px; margin:5px;">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Input:</h5>
                    <p class="card-text ml-5">{{$test_case->input}}</p>
                    <h5 class="card-title">Output:</h5>
                    <p class="card-text ml-5">{{$test_case->output}}</p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_{{$test_case->id}}"> Edit </button>
                    <form class="" action="/problem/{{$id}}/test_case/{{$test_case->id}}" method="post">
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