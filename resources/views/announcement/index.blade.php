@extends('layouts.app')
@section('content')
<div class="content">
    <div class="title m-b-md">
        announcements
    </div>

    <div class="">
        <a href="/announcement/create" class="btn btn-primary">Add another announcement</a>
    </div>

    <div class="">
        @foreach ( $announcements as $announcement )

        <div class="col col-md-2" style=" min-width:25rem; padding:10px; border-radius:10px; margin:5px;">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$announcement->announcement}}</h5>
                    <a href="/announcement/{{$announcement->id}}" class="btn btn-primary">View</a>
                    <a href="/announcement/{{$announcement->id}}/edit" class="btn btn-primary">Edit</a>
                    <form class="" action="/announcement/{{$announcement->id}}" method="post">
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