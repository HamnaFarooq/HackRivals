@extends('layouts.app')
@section('content')
<div class="content">
    <div class="title m-b-md">
    {{$announcement->name}}
    </div>

    <div class="">

        <div class="col col-md-2" style=" min-width:25rem; padding:10px; border-radius:10px; margin:5px;">
            <div class="card">
                <div class="card-body">
                    <p class="card-text">{{$announcement->announcement}}
                    <a href="/announcement/{{$announcement->id}}/edit" class="btn btn-primary">Edit</a>
                    <form class="" action="/announcement/{{$announcement->id}}" method="post">
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