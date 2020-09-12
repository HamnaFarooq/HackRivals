@extends('layouts.app')
@section('pagename')
Submit
@endsection

@section('content')
<div class="container">
    <div>
        <a href="{{$go}}"> <button type="button" class="btn btn-primary"> Go Back </button> </a>
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
                @for ($x = 0; $x < $size; $x++ ) @if ( $test_cases[$keys[$x]]=='yes' ) <div class="col-sm-4">
                    <div class="col-sm-2">
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
                            </div>
                        </div>
                    </div>

                    @endif

                    @endfor


            </div>
        </div>
    </div>
</div>


@endsection