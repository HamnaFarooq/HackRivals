@extends('layouts.app')
@section('content')
<div class="content">
    <div class="title m-b-md">
        classrooms
    </div>

    <div class="">
        <a href="/classroom/create" class="btn btn-primary">Add another classroom</a>
    </div>

    <div class="">
        @foreach ( $classrooms as $classroom )

        <div class="col col-md-2" style=" min-width:25rem; padding:10px; border-radius:10px; margin:5px;">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$classroom->name}}</h5>
                    <p class="card-text">{{$classroom->classroom_type}}</p>
                    <p class="card-text">{{$classroom->creator_id}}</p>
                    <p class="card-text">{{$classroom->starts}}</p>
                    <p class="card-text">{{$classroom->ends}}</p>
                    <a href="/classroom/{{$classroom->id}}" class="btn btn-primary">View</a>
                    <a href="/classroom/{{$classroom->id}}/edit" class="btn btn-primary">Edit</a>
                    <form class="" action="/classroom/{{$classroom->id}}" method="post">
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