@extends('layouts.app')
@section('content')
<div class="content">
    <div class="title m-b-md">
        contests
    </div>

    <div class="">
        <a href="/contest/create" class="btn btn-primary">Add another contest</a>
    </div>

    <div class="">
        @foreach ( $contests as $contest )

        <div class="col col-md-2" style=" min-width:25rem; padding:10px; border-radius:10px; margin:5px;">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$contest->name}}</h5>
                    <p class="card-text">{{$contest->contest_type}}</p>
                    <p class="card-text">{{$contest->creator_id}}</p>
                    <p class="card-text">{{$contest->starts}}</p>
                    <p class="card-text">{{$contest->ends}}</p>
                    <a href="/contest/{{$contest->id}}" class="btn btn-primary">View</a>
                    <a href="/contest/{{$contest->id}}/edit" class="btn btn-primary">Edit</a>
                    <form class="" action="/contest/{{$contest->id}}" method="post">
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