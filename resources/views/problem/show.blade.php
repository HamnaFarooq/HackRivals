@extends('layouts.app')
@section('content')
<div class="content">
    <div class="title m-b-md">
    {{$problem->name}}
    </div>

    <div class="">

                    <p class="card-text">{{$problem->points}}</p>
                    <p class="card-text">{{$problem->statement}}</p>
                    <p class="card-text">{{$problem->description}}</p>
                    <p class="card-text">{{$problem->constraints}}</p>
                    <p class="card-text">{{$problem->input_format}}</p>
                    <p class="card-text">{{$problem->output_format}}</p>
                    <p class="card-text">{{$problem->hint}}</p>
                    <p class="card-text">{{$problem->explaination}}</p>
                    <a href="/problem/{{$problem->id}}/edit" class="btn btn-primary">Edit</a>
                    <form class="" action="/problem/{{$problem->id}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger" name="button">Delete</button>
                    </form>


    </div>

</div>
@endsection