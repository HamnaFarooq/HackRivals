@extends('layouts.app')
@section('content')
<div class="content">
    <div class="title m-b-md">
    {{$classroom->name}}
    </div>

    <div class="">

        <div class="col col-md-2" style=" min-width:25rem; padding:10px; border-radius:10px; margin:5px;">
            <div class="card">
                <div class="card-body">
                    <p class="card-text">{{$classroom->classroom_type}}</p>
                    <p class="card-text">{{$classroom->creator_id}}</p>
                    <p class="card-text">{{$classroom->starts}}</p>
                    <p class="card-text">{{$classroom->ends}}</p>
                    <a href="/classroom/{{$classroom->id}}/edit" class="btn btn-primary">Edit</a>
                    <form class="" action="/classroom/{{$classroom->id}}" method="post">
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