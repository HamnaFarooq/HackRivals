@extends('layouts.app')
@section('pagename')
Home
@endsection

@section('content')
<div class="container">
    <div>
    <a href=""> <button type="button" class="btn btn-primary"> Go Back </button> </a>
    </div>
    <div class="row">
        <div class="col">
            <div class="py-3">
                Points
                <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 15%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>

            <div class="py-3">
                Aggregate Points
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-sm-4">
                    <div class="card border-info mb-3">
                        <div class="card-header">TestCase 1</div>
                        <div class="card-body">
                            <h4 class="card-title">Tick</h4>

                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card border-info mb-3">
                        <div class="card-header">TestCase 2</div>
                        <div class="card-body">
                            <h4 class="card-title">Cross</h4>

                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card border-info mb-3">
                        <div class="card-header">TestCase 3</div>
                        <div class="card-body">
                            <h4 class="card-title">Cross</h4>

                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card border-info mb-3">
                        <div class="card-header">TestCase 4</div>
                        <div class="card-body">
                            <h4 class="card-title">Tick</h4>

                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card border-info mb-3">
                        <div class="card-header">TestCase 5</div>
                        <div class="card-body">
                            <h4 class="card-title">Tick</h4>

                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card border-info mb-3">
                        <div class="card-header">TestCase 6</div>
                        <div class="card-body">
                            <h4 class="card-title">Cross</h4>

                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card border-info mb-3">
                        <div class="card-header">TestCase 7</div>
                        <div class="card-body">
                            <h4 class="card-title">Cross</h4>

                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card border-info mb-3">
                        <div class="card-header">testcase number Name</div>
                        <div class="card-body">
                            <h4 class="card-title">tick/Cross:</h4>

                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card border-info mb-3">
                        <div class="card-header">testcase number Name</div>
                        <div class="card-body">
                            <h4 class="card-title">tick/Cross:</h4>

                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card border-info mb-3">
                        <div class="card-header">testcase number Name</div>
                        <div class="card-body">
                            <h4 class="card-title">tick/Cross:</h4>

                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card border-info mb-3">
                        <div class="card-header">testcase number Name</div>
                        <div class="card-body">
                            <h4 class="card-title">tick/Cross:</h4>

                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card border-info mb-3">
                        <div class="card-header">testcase number Name</div>
                        <div class="card-body">
                            <h4 class="card-title">tick/Cross:</h4>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection