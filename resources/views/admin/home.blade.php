@extends('layouts.app')
@section('pagename')
Home
@endsection

@section('content')
<div class="container">

        <h3>All Lists</h3>
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#user_list">User List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#modetator_list">Moderator List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#block_user">Block User</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#block_moderator">Block Moderator</a>
          </li>


        </ul>

        <form action="/competitiion" method="POST" autocomplete="off">

          <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade  pt-3 show active" id="user_list">

              <h2>All Users List</h2>
              <table class="table table-hover">
                         
                         <thead>
                          <tr>
                            <th scope="col">Profile Pic</th>
                            <th scope="col">Email</th>
                            <th scope="col">User Type</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                            <th scope="col">Block</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="table-active">
                            <td><img src="" alt="image here"></td>
                            <td> user@email.com</td>
                            <td>Student</td>
                            <td><button type="button" class="btn btn-primary">Edit</button></td>
                            <td><button type="button" class="btn btn-primary">Block</button></td>
                            <td><button type="button" class="btn btn-primary">Delete</button></td>
                          </tr>
                          <tr>
                            <td><img src="" alt="image here"></td>
                            <td> user@email.com</td>
                            <td>Teacher</td>
                            <td><button type="button" class="btn btn-primary">Edit</button></td>
                            <td><button type="button" class="btn btn-primary">Block</button></td>
                            <td><button type="button" class="btn btn-primary">Delete</button></td>
                          </tr>
                          <tr>
                            <td><img src="" alt="image here"></td>
                            <td> user@email.com</td>
                            <td>Student</td>
                            <td><button type="button" class="btn btn-primary">Edit</button></td>
                            <td><button type="button" class="btn btn-primary">Block</button></td>
                            <td><button type="button" class="btn btn-primary">Delete</button></td>
                          </tr>
                        </tbody>
                      </table>

            </div>
            <div class="tab-pane fade pt-3" id="modetator_list">

              <h2>All Moderator List</h2>
              
                    <table class="table table-hover">
                         
                         <thead>
                          <tr>
                            <th scope="col">Profile Pic</th>
                            <th scope="col">Moderator Email</th>
                            <th scope="col">User Type</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                            <th scope="col">Block</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="table-active">
                            <td><img src="" alt="image here"></td>
                            <td> moderator@email.com</td>
                            <td>moderator</td>
                            <td><button type="button" class="btn btn-primary">Edit</button></td>
                            <td><button type="button" class="btn btn-primary">Block</button></td>
                            <td><button type="button" class="btn btn-primary">Delete</button></td>
                          </tr>
                          <tr>
                            <td><img src="" alt="image here"></td>
                            <td> moderator@email.com</td>
                            <td>moderator</td>
                            <td><button type="button" class="btn btn-primary">Edit</button></td>
                            <td><button type="button" class="btn btn-primary">Block</button></td>
                            <td><button type="button" class="btn btn-primary">Delete</button></td>
                          </tr>
                          <tr>
                            <td><img src="" alt="image here"></td>
                            <td> moderator@email.com</td>
                            <td>moderator</td>
                            <td><button type="button" class="btn btn-primary">Edit</button></td>
                            <td><button type="button" class="btn btn-primary">Block</button></td>
                            <td><button type="button" class="btn btn-primary">Delete</button></td>
                          </tr>
                        </tbody>
                      </table>


            </div>
            <div class="tab-pane fade pt-3" id="block_user">

              <h2>Block Users List</h2>
              
              <table class="table table-hover">
                         
                         <thead>
                          <tr>
                            <th scope="col">Profile Pic</th>
                            <th scope="col">User Email</th>
                            <th scope="col">User Type</th>
                            <th scope="col">UnBlock</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="table-active">
                            <td><img src="" alt="image here"></td>
                            <td> User@email.com</td>
                            <td>Student</td>
                            <td><button type="button" class="btn btn-primary">UnBlock</button></td>
                          </tr>
                          <tr>
                            <td><img src="" alt="image here"></td>
                            <td> User@email.com</td>
                            <td>Teacher</td>
                            <td><button type="button" class="btn btn-primary">UnBlock</button></td>
                            
                          </tr>
                          <tr>
                            <td><img src="" alt="image here"></td>
                            <td> User@email.com</td>
                            <td>Student</td>
                            <td><button type="button" class="btn btn-primary">UnBlock</button></td>
                            
                          </tr>
                        </tbody>
                      </table>
              

            </div>
            <div class="tab-pane fade pt-3" id="block_moderator">
              
              <h2>Block Moderator List</h2>
              
              <table class="table table-hover">
                         
                         <thead>
                          <tr>
                            <th scope="col">Profile Pic</th>
                            <th scope="col">Moderator Email</th>
                            <th scope="col">User Type</th>
                            <th scope="col">UnBlock</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="table-active">
                            <td><img src="" alt="image here"></td>
                            <td> moderator@email.com</td>
                            <td>moderator</td>
                            <td><button type="button" class="btn btn-primary">UnBlock</button></td>
                          </tr>
                          <tr>
                            <td><img src="" alt="image here"></td>
                            <td> moderator@email.com</td>
                            <td>moderator</td>
                            <td><button type="button" class="btn btn-primary">UnBlock</button></td>
                            
                          </tr>
                          <tr>
                            <td><img src="" alt="image here"></td>
                            <td> moderator@email.com</td>
                            <td>moderator</td>
                            <td><button type="button" class="btn btn-primary">UnBlock</button></td>
                            
                          </tr>
                        </tbody>
                      </table>
              
              </div>
        </div>
      </form>

    </div>
@endsection