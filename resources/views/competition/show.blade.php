@include('partials.competition_info')

@extends('layouts.app')

@section('pagename')
{{$competition->name}}
@endsection

@section('content')

<div class="container">
    <h3 class="text-center">{{$competition->name}}</h3>
    <div class="text-right"><button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#share_competition">Share</button>
        <a href="/leavecompetition/{{ $competition->id }}"> <button type="button" class="btn btn-primary mb-5">Leave Competition</button></a>
    </div>
    <div class="row">

        <div class="col-sm-8">
            <h5>Problems</h5>

            @foreach ($competition->problems as $problem)
            <div class="">
                <a href="/competition/{{$competition->id}}/problem/{{$problem->id}}">
                    <div class="card border-info mb-3">
                        <div class="card-header"> {{ $problem->name }} </div>
                        <div class="card-body">
                            <p class="card-text"> {{ $problem->statement }} </p>
                            <p class="card-text"> <b> Points: </b>  {{ $problem->points }} </p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach

        </div>

        <div class="col-sm-4">

            <h2>Users Rankings</h2>
            <table class="table table-hover">

                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col"></th>
                        <th scope="col">Points</th>

                    </tr>
                </thead>
                <tbody>

                @foreach ($competition->rankings as $rank)
                    <tr class="table-active">
                    <td> {{ $rank->user_id }} </td>
                    <td>  </td>
                    <td> {{ $rank->points }} </td>
                </tr>
                @endforeach

                </tbody>
            </table>

        </div>

    </div>


    @endsection