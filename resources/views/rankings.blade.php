@extends('layouts.app')
@section('pagename')
Rankings
@endsection

@section('content')
<div class="container">
    <h3 class="mb-5" >Rankings</h3>
<div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Rank</th>
                            <th scope="col">Name</th>
                            <th scope="col">Score</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-active">
                            
                            <td> 1 </td>
                            <td> {{ $user->name }} </td>
                            <td> 0 </td>
                            
                        </tr>
                    </tbody>
                </table>
            </div>


</div>
@endsection
