@extends('layouts.app')
@section('pagename')
Rankings
@endsection

@section('content')
<div class="container">
    <h3 class="mb-5">Rankings</h3>
    <div class="row">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Rank</th>
                    <th scope="col">Name</th>
                    <th scope="col">Points</th>

                </tr>
            </thead>
            <tbody>

                @foreach ( $users as $indexKey=>$user )
                <tr class="table-active">
                    <td> {{ $indexKey+1 }} </td>
                    <td> {{ $user->name }} </td>
                    <td> {{ $user->points }} </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>


</div>
@endsection