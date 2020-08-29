@extends('layouts.app')
@section('content')
<div class="content">
    <div class="title m-b-md">
    {{$contest->name}}
    </div>

    <div class="">

        <div class="col col-md-2" style=" min-width:25rem; padding:10px; border-radius:10px; margin:5px;">
            <div class="card">
                <div class="card-body">
                    <p class="card-text">{{$contest->contest_type}}</p>
                    <p class="card-text">{{$contest->creator_id}}</p>
                    <p class="card-text">{{$contest->starts}}</p>
                    <p class="card-text">{{$contest->ends}}</p>
                    <a href="/contest/{{$contest->id}}/edit" class="btn btn-primary">Edit</a>
                    <form class="" action="/contest/{{$contest->id}}" method="post">
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