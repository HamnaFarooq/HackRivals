@extends('layouts.app')
@section('pagename')
Error
@endsection

@section('content')
<div class="container">

    <div class="my-5 p-3 bg-light border-warning">
        <h3>{{ $err }}</h3>
    </div>

    <a href="{{$go}}">
        <button class="btn btn-primary px-3">
            Go Back
        </button>
    </a>

</div>
@endsection