@extends('layouts.app')
@section('pagename')
ClassRoomsList
@endsection

<!-- foreach loop $classrooms -->

@section('content')
<div class="container">
<div class="row">
            <h3 class="text-center">All Classrooms List</h3>
                        <table class="table table-hover">
                         <thead>
                          <tr>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="table-active">
                            <td>
                              <div class="row-sm-4">
                                  <div class="card border-info mb-3" >
                                    <div class="card-header">ClassRoom Name</div>
                                    <div class="card-body">
                                      <h4 class="card-title">Info card title</h4>
                                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                  </div>
                                </div>
                            </td>
                            
                            <td><button type="button" class="btn btn-primary">Edit</button></td>
                            <td><button type="button" class="btn btn-primary">Delete</button></td>
                          
                          <tr>
                            <td>
                              <div class="row-sm-4">
                                  <div class="card border-info mb-3" >
                                    <div class="card-header">ClassRoom Name</div>
                                    <div class="card-body">
                                      <h4 class="card-title">Info card title</h4>
                                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                  </div>
                                </div>
                            </td>
                            <td><button type="button" class="btn btn-primary">Edit</button></td>
                            <td><button type="button" class="btn btn-primary">Delete</button></td>
                          </tr>
                          <tr>
                            <td>
                              <div class="row-sm-4">
                                  <div class="card border-info mb-3" >
                                    <div class="card-header">ClassRoom Name</div>
                                    <div class="card-body">
                                      <h4 class="card-title">Info card title</h4>
                                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                  </div>
                                </div>
                            </td>
                            <td><button type="button" class="btn btn-primary">Edit</button></td>
                            <td><button type="button" class="btn btn-primary">Delete</button></td>
                          </tr>
                          <tr>
                            <td>
                              <div class="row-sm-4">
                                  <div class="card border-info mb-3" >
                                    <div class="card-header">ClassRoom Name</div>
                                    <div class="card-body">
                                      <h4 class="card-title">Info card title</h4>
                                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                  </div>
                                </div>
                            </td>
                            <td><button type="button" class="btn btn-primary">Edit</button></td>
                            <td><button type="button" class="btn btn-primary">Delete</button></td>
                          </tr>
                          <tr>
                            <td>
                              <div class="row-sm-4">
                                  <div class="card border-info mb-3" >
                                    <div class="card-header">ClassRoom Name</div>
                                    <div class="card-body">
                                      <h4 class="card-title">Info card title</h4>
                                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                  </div>
                                </div>
                            </td>
                            <td><button type="button" class="btn btn-primary">Edit</button></td>
                            <td><button type="button" class="btn btn-primary">Delete</button></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
</div>
@endsection