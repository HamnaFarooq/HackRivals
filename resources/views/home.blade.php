@extends('layouts.app')
@section('pagename')
Home
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-8">
      <div class="py-3">
        Level
        <div class="progress">
          <div class="progress-bar bg-warning" role="progressbar" style="width: 15%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </div>

        <div class="py-3">
          SubLevel
        <div class="progress">
          <div class="progress-bar bg-success" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
      <div class="row">
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
                        <div class="card-header">Problem Name</div>
                        <div class="card-body">
                            <h4 class="card-title">Statement:</h4>

                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card border-info mb-3">
                        <div class="card-header">Problem Name</div>
                        <div class="card-body">
                            <h4 class="card-title">Statement:</h4>

                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card border-info mb-3">
                        <div class="card-header">Problem Name</div>
                        <div class="card-body">
                            <h4 class="card-title">Statement:</h4>

                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card border-info mb-3">
                        <div class="card-header">Problem Name</div>
                        <div class="card-body">
                            <h4 class="card-title">Statement:</h4>

                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card border-info mb-3">
                        <div class="card-header">Problem Name</div>
                        <div class="card-body">
                            <h4 class="card-title">Statement:</h4>

                        </div>
                    </div>
                </div>

            </div>
      </div>

    </div>
    <div class="col-sm-4">
    <canvas id="myChart" style="width: 500px; height:100%;"></canvas>
    </div>
  </div>
  <div class="py-3">
    SubLevel Progress
  <div class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
</div>
  </div>
</div>


@endsection