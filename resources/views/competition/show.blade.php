@extends('layouts.app')
@section('content')
<div class="content">
    <div class="title m-b-md">
    {{$competition->name}}
    </div>

    <div class="">

        <div class="col col-md-2" style=" min-width:25rem; padding:10px; border-radius:10px; margin:5px;">
            <div class="card">
                <div class="card-body">
                    <p class="card-text">{{$competition->competition_type}}</p>
                    <p class="card-text">{{$competition->creator_id}}</p>
                    <p class="card-text">{{$competition->starts}}</p>
                    <p class="card-text">{{$competition->ends}}</p>
                    <a href="/competition/{{$competition->id}}/edit" class="btn btn-primary">Edit</a>
                    <form class="" action="/competition/{{$competition->id}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger" name="button">Delete</button>
                    </form>
                </div>
            </div>
        </div>


    </div>

</div>
@endsection