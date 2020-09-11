@extends('layouts.app')

@section('pagename')
{{$classroom->name}}
@endsection

@section('content')

<div class="container">
    <h3 class="text-center">{{$classroom->name}}</h3>
    <div class="text-right"><button type="button" class="btn btn-primary mb-5">Share</button>
    <a href="/leaveclass/{{ $classroom->id }}"> <button type="button" class="btn btn-primary mb-5">Leave ClassRoom</button></div>

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

        

    </div>
</div>
@endsection