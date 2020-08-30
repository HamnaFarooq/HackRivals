@extends('layouts.app')
@section('content')
<div class="content">
    <div class="title m-b-md">
    {{$class_material->title}}
    </div>

    <div class="">

        <p class="card-text">{{$class_material->announcement}}</p>
        <p class="card-text">{{$class_material->competition_id}}</p>
        <a href="/class_material/{{$class_material->id}}/edit" class="btn btn-primary">Edit</a>
        <form class="" action="/class_material/{{$class_material->id}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger" name="button">Delete</button>
        </form>


    </div>

</div>
@endsection