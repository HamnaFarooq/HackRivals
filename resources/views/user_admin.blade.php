@include('partials.createclassroomform')
@include('partials.createproblemform')

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
                        <tr class="table-active">
                            <td>567</td>
                            <td> user@email.com</td>
                            <td> user@email.com</td>
                            <td> user@email.com</td>
                        </tr>
                        <tr>
                            <td>567</td>
                            <td>username@gmail.com</td>
                            <td>username@gmail.com</td>
                            <td>username@gmail.com</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="competitions">

            <div class="text-right"> <button type="button" class="btn btn-primary my-3">Create Competition</button></div>
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
                        <tr class="table-active">
                            <td>567</td>
                            <td> user@email.com</td>
                            <td> user@email.com</td>
                            <td> user@email.com</td>
                        </tr>
                        <tr>
                            <td>567</td>
                            <td>username@gmail.com</td>
                            <td>username@gmail.com</td>
                            <td>username@gmail.com</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="problems">
            <div class="text-right"> <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#createproblem">Create Problems</button></div>
            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Problem Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-active">
                            <td>Hamna</td>

                        </tr>
                        <tr>
                            <td>Shani PF</td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
</form>


</div>
@endsection