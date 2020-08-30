@extends('layouts.app')
@section('content')

<div class="content">
    <div class="title m-b-md">
        Ranks
    </div>

    <div class="">
        <a href="/rank/create" class="btn btn-primary">Add another rank</a>
    </div>

    <div class="">
        @foreach ( $ranks as $rank )

        <div class="col col-md-2" style=" min-width:25rem; padding:10px; border-radius:10px; margin:5px;">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$rank->points}}</h5>
                    <a href="/rank/{{$rank->id}}" class="btn btn-primary">View</a>
                    <a href="/rank/{{$rank->id}}/edit" class="btn btn-primary">Edit</a>
                    <form class="" action="/rank/{{$rank->id}}" method="post">
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