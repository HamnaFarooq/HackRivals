@extends('layouts.app')

@section('pagename')
View {{$problem->name}}
@endsection

@section('content')

    <div class="container-fluid">
      <div class="container">
        <h2>View {{$problem->name}}</h2>

          <div>
            <h5> Problem Name: </h5>
            <p class="px-5"> {{$problem->name}} </p class="px-5">
          </div>

          <div>
            <h5> Level: </h5>
            <p class="px-5"> {{$problem->level}} </p class="px-5">
          </div>

          <div class="">
            <h5> Sub-Level: </h5>
            <p class="px-5"> {{$problem->sub_level}} </p class="px-5">
          </div>

          <div class="">
            <h5> Problem Statement: </h5>
            <p class="px-5"> {{$problem->statement}} </p class="px-5">
          </div>

          <div class="">
            <h5> Problem Description: </h5>
            <p class="px-5"> {{$problem->description}} </p class="px-5">
          </div>

          <div class="">
            <h5> Constraints: </h5>
            <p class="px-5"> {{$problem->constraints}} </p class="px-5">
          </div>

          <div class="">
            <h5> Format: </h5>
            <p class="px-5"> {{$problem->p_format}} </p class="px-5">
          </div>

          <div class="">
            <h5> Output Format: </h5>
            <p class="px-5"> {{$problem->output_format}} </p class="px-5">
          </div>

          <div class="">
            <h5> Output Explaination: </h5>
            <p class="px-5"> {{$problem->explaination}}</p class="px-5">
          </div>

          <div class="">
            <h5> Hint: </h5>
            <p class="px-5"> {{$problem->hint}} </p class="px-5">
          </div>

        </div>
    	</div>

@endsection