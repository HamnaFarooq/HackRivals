@extends('layouts.app')
@section('pagename')
Home
@endsection

@section('content')
<div class="container">
    <div class="py-3">
        SubLevel Progress
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
        </div>
        <div class="text-right">255 / 300 points</div>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <div class="py-3">
                Level
                <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 15%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="text-right">level 2</div>
            </div>

            <div class="py-3">
                SubLevel
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="text-right">sublevel 3</div>
            </div>

            <h3> Practice</h3>
            <p class="text-muted"> to earn points </p>
            <div class="col">
                    
                    <div class="row">
                        <div class="card border-info mb-3">
                            <div class="card-header">Problem Name</div>
                            <div class="card-body">
                                <h4 class="card-title">Statement:</h4>
                                <p class="card-text"> Sometimes theoretical issues have clear practical consequences, but sometimes their relevance is less immediately obvious. To identify why the problem matters </p>
                                <a href="" > <button type="button" class="btn btn-primary"> Attempt </button> </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card border-info mb-3">
                            <div class="card-header">Problem Name</div>
                            <div class="card-body">
                                <h4 class="card-title">Statement:</h4>
                                <p class="card-text"> Sometimes theoretical issues have clear practical consequences, but sometimes their relevance is less immediately obvious. To identify why the problem matters </p>
                                <a href="" > <button type="button" class="btn btn-primary"> Attempt </button> </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card border-info mb-3">
                            <div class="card-header">Problem Name</div>
                            <div class="card-body">
                                <h4 class="card-title">Statement:</h4>
                                <p class="card-text"> Sometimes theoretical issues have clear practical consequences, but sometimes their relevance is less immediately obvious. To identify why the problem matters </p>
                                <a href="" > <button type="button" class="btn btn-primary"> Attempt </button> </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card border-info mb-3">
                            <div class="card-header">Problem Name</div>
                            <div class="card-body">
                                <h4 class="card-title">Statement:</h4>
                                <p class="card-text"> Sometimes theoretical issues have clear practical consequences, but sometimes their relevance is less immediately obvious. To identify why the problem matters </p>
                                <a href="" > <button type="button" class="btn btn-primary"> Attempt </button> </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card border-info mb-3">
                            <div class="card-header">Problem Name</div>
                            <div class="card-body">
                                <h4 class="card-title">Statement:</h4>
                                <p class="card-text"> Sometimes theoretical issues have clear practical consequences, but sometimes their relevance is less immediately obvious. To identify why the problem matters </p>
                                <a href="" > <button type="button" class="btn btn-primary"> Attempt </button> </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card border-info mb-3">
                            <div class="card-header">Problem Name</div>
                            <div class="card-body">
                                <h4 class="card-title">Statement:</h4>
                                <p class="card-text"> Sometimes theoretical issues have clear practical consequences, but sometimes their relevance is less immediately obvious. To identify why the problem matters </p>
                                <a href="" > <button type="button" class="btn btn-primary"> Attempt </button> </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card border-info mb-3">
                            <div class="card-header">Problem Name</div>
                            <div class="card-body">
                                <h4 class="card-title">Statement:</h4>
                                <p class="card-text"> Sometimes theoretical issues have clear practical consequences, but sometimes their relevance is less immediately obvious. To identify why the problem matters </p>
                                <a href="" > <button type="button" class="btn btn-primary"> Attempt </button> </a>
                            </div>
                        </div>
                    </div>
            
            </div>
        </div>

        <div class="col-sm-4 my-5">
            <canvas id="myChart" style="width: 100%; height:450px;"></canvas>
        </div>
        
    </div>

</div>


@endsection