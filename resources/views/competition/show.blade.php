@extends('layouts.app')

@section('pagename')
{{$competition->name}}
@endsection

@section('content')

<div class="container">
<h3 class="text-center">{{$competition->name}}</h3>
<div class="row">

    <div class="col-sm-8">
        <h5>Problems</h5>

        <div class="">
            <div class="card border-info mb-3">
                <div class="card-header">Problem Name</div>
                <div class="card-body">
                    <h4 class="card-title">Problem Statement:</h4>
                    <p class="card-text">1 line ki statement</p>
                </div>
            </div>


        </div>
        <div class="">
            <div class="card border-info mb-3">
                <div class="card-header">Problem Name</div>
                <div class="card-body">
                    <h4 class="card-title">Problem Statement:</h4>
                    <p class="card-text">1 line ki statement</p>
                </div>
            </div>
        </div>

        <div class="">
            <div class="card border-info mb-3">
                <div class="card-header">Problem Name</div>
                <div class="card-body">
                    <h4 class="card-title">Problem Statement:</h4>
                    <p class="card-text">1 line ki statement</p>
                </div>
            </div>


        </div>

    </div>

    <div class="col-sm-4">

        <h2>Users Rankings</h2>
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
        <a href="/leavecompetition/{{ $competition->id }}"> <button type="button" class="btn btn-primary mb-5">Leave Competition</button>
    </div>

</div>


@endsection