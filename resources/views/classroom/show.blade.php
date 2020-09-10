@extends('layouts.app')
@section('content')
<!-- <div class="content">
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

</div> -->

<div class="container">
    <h3 class="text-center">{{$classroom->name}}</h3>

    <div class="row">

        <div class="col-sm-8">
            <h5>Material</h5>

            <div class="">

                @foreach ($classroom->materials as $material)

                <div class="col">
                    <div class="card border-info mb-3">
                        <div class="card-header">{{$material->title}}</div>
                        <div class="card-body">
                            @if( $material->announcement )
                            <p class="card-text"> {{$material->announcement}}</p>
                            @endif
                            @if( $material->competition_id )
                            <form action="/joincompetition" method="POST">
                                @csrf
                                <input type="hidden" name="competition_id" value="{{$material->competition_id}}">
                                <input type="hidden" name="password" value="class">
                                <button type="submit" class="btn btn-primary">Join Competition</button>
                            </form>
                            @endif</div>
                    </div>
                </div>

                @endforeach

            </div>
        </div>

        <div class="col-sm-4">

            <h2>Class Rankings</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Email</th>
                        <th scope="col">Points</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr class="table-active">
                        <td>33</td>
                        <td> user@email.com</td>
                        <td>Points</td>
                    </tr> -->
                </tbody>
            </table>

        </div>

        <a href="/leaveclass/{{ $classroom->id }}"> <button type="button" class="btn btn-primary mb-5">Leave ClassRoom</button>

    </div>
</div>
@endsection