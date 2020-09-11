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
          <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
          <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
          <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </div>

        <div class="py-3">
          SubLevel
        <div class="progress">
          <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
          <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
          <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
      <div class="py-3">
      <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade pt-4 active show" id="private-joined">
          <div class="row">
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

        <div class="tab-pane fade pt-4" id="public-joined">
          <div class="row">
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
      <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade pt-4 active show" id="private-joined">
          <div class="row">
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

        <div class="tab-pane fade pt-4" id="public-joined">
          <div class="row">
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