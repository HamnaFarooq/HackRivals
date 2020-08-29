@extends('layouts.app')
@section('content')

<div class="content">
    <div class="title m-b-md">
        Problems
    </div>

    <div class="">
        <a href="/problem/create" class="btn btn-primary">Add another problem</a>
    </div>

    <div class="">
        @foreach ( $problems as $problem )

        <div class="col col-md-2" style=" min-width:25rem; padding:10px; border-radius:10px; margin:5px;">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$problem->name}}</h5>
                    <p class="card-text">{{$problem->points}}</p>
                    <p class="card-text">{{$problem->statement}}</p>
                    <a href="/problem/{{$problem->id}}" class="btn btn-primary">View</a>
                    <a href="/problem/{{$problem->id}}/edit" class="btn btn-primary">Edit</a>
                    <form class="" action="/problem/{{$problem->id}}" method="post">
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