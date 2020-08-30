@extends('layouts.app')
@section('content')

<div class="content">
    <div class="title m-b-md">
        class_materials
    </div>

    <div class="">
        <a href="/class_material/create" class="btn btn-primary">Add another class_material</a>
    </div>

    <div class="">
        @foreach ( $class_materials as $class_material )

        <div class="col col-md-2" style=" min-width:25rem; padding:10px; border-radius:10px; margin:5px;">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$class_material->title}}</h5>
                    <p class="card-text">{{$class_material->announcement}}</p>
                    <p class="card-text">{{$class_material->competition_id}}</p>
                    <a href="/class_material/{{$class_material->id}}" class="btn btn-primary">View</a>
                    <a href="/class_material/{{$class_material->id}}/edit" class="btn btn-primary">Edit</a>
                    <form class="" action="/class_material/{{$class_material->id}}" method="post">
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