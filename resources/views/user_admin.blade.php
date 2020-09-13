@include('partials.createclassroomform')
@include('partials.create_problem_form')
@include('partials.create_competition_form')

@extends('layouts.app')
@section('pagename')
User Administration
@endsection

@section('content')
<div class="container">

    <h3>User Administration</h3>
    <ul class="nav nav-tabs mt-5">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#classrooms">Manage Classrooms</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " data-toggle="tab" href="#competitions">Manage Competitions</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#problems">Manage Problems</a>
        </li>


    </ul>

    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade show active" id="classrooms">

            <div class="text-right"> <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#createclassroom">Create Classrooms</button></div>
            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Classroom Name</th>
                            <th scope="col">Participants</th>
                            <th scope="col">Starts</th>
                            <th scope="col">Ends</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $classrooms as $classroom )
                        <tr class="table-active">
                            <td> {{ $classroom->name }} </td>
                            <td> {{ $classroom->students_count }} </td>
                            <td> {{ $classroom->starts }} </td>
                            <td> {{ $classroom->ends }} </td>
                            <td> <a href="/classroom/{{$classroom->id}}/edit" class="btn btn-primary">Manage</a> </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="competitions">

            <div class="text-right"> <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#create_competition" >Create Competition</button> </div>
            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Competition Name</th>
                            <th scope="col">Starts</th>
                            <th scope="col">Ends</th>
                            <th scope="col">Participants</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $competitions as $competition )
                        <tr class="table-active">
                            <td> {{ $competition->name }}</td>
                            <td> {{ $competition->starts }} </td>
                            <td> {{ $competition->ends }} </td>
                            <td> {{ $competition->participents_count }} </td>
                            <td> <a href="/competition/{{$competition->id}}/edit" class="btn btn-primary">Manage</a> </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="problems">
            <div class="text-right"> <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#create_problem">Create Problems</button></div>
            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Problem Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $user->problems as $problem )
                        <tr class="table-active">
                            <td> {{ $problem->name }} </td>
                            <td> <a href="/problem/{{$problem->id}}/edit" class="btn btn-primary">Manage</a> </td>
                            <td> <a href="/problem/{{$problem->id}}/test_case" class="btn btn-primary">Manage test cases</a> </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
</form>


</div>
@endsection