@extends('layouts.app')
@section('pagename')
Competition List
@endsection

@section('content')
<div class="container">

<div class="row">
            <h3 class="text-center">All Competition List</h3>
                        <table class="table table-hover">
                         <thead>
                          <tr>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($competitions as $competition)
                          <tr class="table-active">
                            <td>
                              <div class="row-sm-4">
                                  <div class="card border-info mb-3" >
                                    <div class="card-header">Name: {{$competition->name}}</div>
                                    <div class="card-body">
                                      <h4 class="card-title">Password: {{$competition->password}}</h4>
                                      <p class="card-text">Type: {{$competition->competition_type}}</p>
                                    </div>
                                  </div>
                                </div>
                            </td>
                            
                            <td><a href="/editCompetition/{{$competition->id}}"><button type="button" class="btn btn-primary">Edit</button></td></a>
                            
                            <td><a href="/deleteCompetition/{{$competition->id}}"><button type="button" class="btn btn-primary">Delete</button></td></a>
                           
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>        

</div>
@endsection