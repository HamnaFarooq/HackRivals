@extends('layouts.app')
@section('content')
<div class="content">
    <div class="title m-b-md">
    Rank:
    </div>

    <div class="">

                    <p class="card-text">{{$rank->points}}</p>
                    <a href="/rank/{{$rank->id}}/edit" class="btn btn-primary">Edit</a>
                    <form class="" action="/rank/{{$rank->id}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger" name="button">Delete</button>
                    </form>


    </div>

</div>
@endsection