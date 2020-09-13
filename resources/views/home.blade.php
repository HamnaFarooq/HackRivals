@extends('layouts.app')
@section('pagename')
Home
@endsection

@section('content')
<div class="container">
    <div class="py-3">
        SubLevel Progress
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:<?= $progresspercentage; ?>%;"></div>
        </div>
        <div class="text-right">{{$aggregatedpoints}} / {{$max}} points</div>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <div class="py-3">
                Level
                <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" style="width:<?= $lvlpercentage; ?>%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="text-right">level {{$lvl}}</div>
            </div>

            <div class="py-3">
                SubLevel
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width:<?= $sblvlpercentage; ?>%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="text-right">sublevel {{$sublvl}}</div>
            </div>

            <h3> Practice</h3>
            <p class="text-muted"> to earn points </p>
            <div class="col-12">
             @foreach ($problem as $prob)
                    <div class="row">
                        <div class="card border-info mb-3">
                            <div class="card-header">{{$prob->name}}</div>
                            <div class="card-body">
                                <p class="card-title">{{$prob->statement}} </p>
                                <a href="/problem/{{$prob->id}}" > <button type="button" class="btn btn-primary"> Attempt </button> </a>
                            </div>
                        </div>
                    </div>
            @endforeach
                     
                
                   
            </div>
        </div>

        <div class="col-sm-4 my-5">
            <canvas id="myChart" style="width: 100%; height:450px;"></canvas>
        </div>
        
    </div>

</div>


@endsection