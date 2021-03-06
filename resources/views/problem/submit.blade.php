<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap_theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="icon" type="image/svg" href="/images/logo.svg">
    <title>Submit</title>

</head>

<body>

    <div class="container p-5">
        <div>
            <form action="/eval" method="post">
                @csrf
                <input type="hidden" name="go" value="{{$go}}">
                <input type="hidden" name="points" value="{{$points}}">
                <input type="hidden" name="problem_id" value="{{$id}}">
                <button type="submit" class="btn btn-primary"> Go Back </button>
            </form>
        </div>
        <div class="row">
            <div class="col">
                <div class="py-3">
                    Points
                    <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" style="width:<?= $pointspercent; ?>%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="text-right"> {{$points}} / {{$total}} points</div>
                </div>

                <div class="py-3">
                    Aggregate Points
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width:<?= $aggregatepointspercent; ?>%; " aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="text-right"> {{$aggregatepoints}} / {{$total}} points</div>
                </div>

                <div class="row mt-5">
                    @php
                    $keys = array_keys( $test_cases );
                    $size = sizeof($test_cases);
                    @endphp
                    @for ($x = 0; $x < $size; $x++ ) @if ( $test_cases[$keys[$x]]=='yes' ) <div class="col-sm-2">
                        <div class="card border-info mb-3">
                            <div class="card-header">TestCase {{ $keys[$x] }}</div>
                            <div class="card-body">
                                <img src="{{url('/images/tick.svg')}}" alt="Correct" />
                            </div>
                        </div>
                </div>

                @else

                <div class="col-sm-2">
                    <div class="card border-info mb-3">
                        <div class="card-header">TestCase {{ $keys[$x] }}</div>
                        <div class="card-body">
                            <img src="{{url('/images/cross.svg')}}" alt="Wrong" />
                            <div class="text-danger"> {{ $test_cases[$keys[$x]] }}</div>
                        </div>
                    </div>
                </div>

                @endif

                @endfor


            </div>
        </div>
    </div>
    </div>

</body>

</html>