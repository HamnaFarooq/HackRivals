@include('partials.create_problem_form')

@extends('layouts.app')
@section('pagename')
Problems
@endsection

@section('content')
<div class="container">
    @if($errors->any())
    <div class="container">
        <div class="row bg-light py-3 justify-content-center">
            <div class="bg-light text-danger"> <b> {{ "There was an error. Please try again!" }} </b> </div>
        </div>
    </div>
    @endif

    <div class="">
        <h3 class="text-center">All Problems List</h3>

        <div class="text-right">
            <button class="btn btn-primary" data-toggle="modal" data-target="#create_problem">Add a new Problem</button>
        </div>

        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#problems">Private Problems</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#hackrivals_problems">Hackrivals Problems</a>
            </li>
        </ul>

        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active pt-3 show active" id="problems">

                <h5>Private</h5>
                <table class="table table-hover">

                    <thead>
                        <tr>
                            <th scope="col">Problem Name</th>
                            <th scope="col">Level</th>
                            <th scope="col">Sublevel</th>
                            <th scope="col">Testcases</th>
                            <th scope="col">Solved By</th>
                            <th scope="col">Attempts</th>
                            <th scope="col">View</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                            <th scope="col">To Public</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($private_problems as $problem)
                        <tr class="table-active">
                            <td> {{$problem->name}} </td>
                            <td> {{$problem->level}} </td>
                            <td> {{$problem->sub_level}}</td>
                            <td> {{$problem->test_cases_count}} </td>
                            <td> {{$problem->solved_by}}</td>
                            <td> {{$problem->total_attempts}}</td>
                            <td><a href="/admin/viewProblem/{{$problem->id}}"><button type="button" class="btn btn-primary">View</button></td></a>
                            <td><a href="/problem/{{$problem->id}}/edit"><button type="button" class="btn btn-primary">Edit</button></td></a>
                            <td>
                                <form method="POST" action="/problem/{{$problem->id}}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                </form>
                            </td>
                            <td><a href="/admin/copyProblem/{{$problem->id}}"><button type="button" class="btn btn-primary">Copy</button></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <div class="tab-pane fade pt-3 show" id="hackrivals_problems">

                <h5>Hackrivals</h5>
                <table class="table table-hover">

                    <thead>
                        <tr>
                            <th scope="col">Problem Name</th>
                            <th scope="col">Level</th>
                            <th scope="col">Sublevel</th>
                            <th scope="col">Testcases</th>
                            <th scope="col">Solved By</th>
                            <th scope="col">Attempts</th>
                            <th scope="col">View</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hackrivals_problems as $problem)
                        <tr class="table-active">
                            <td> {{$problem->name}} </td>
                            <td> {{$problem->level}} </td>
                            <td> {{$problem->sub_level}}</td>
                            <td> {{$problem->test_cases_count}} </td>
                            <td> {{$problem->solved_by}}</td>
                            <td> {{$problem->total_attempts}}</td>
                            <td><a href="/admin/viewProblem/{{$problem->id}}"><button type="button" class="btn btn-primary">View</button></td></a>
                            <td><a href="/problem/{{$problem->id}}/edit"><button type="button" class="btn btn-primary">Edit</button></td></a>
                            <td>
                                <form method="POST" action="/problem/{{$problem->id}}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>

</div>
@endsection