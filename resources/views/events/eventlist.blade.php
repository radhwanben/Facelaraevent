@extends('layouts.app-fokp')

@section('content')
<div class="container">
    <div class="row justify-content-center">


        @if (count($user) > 0)
        @foreach ($user as $u)
        <div class="col-md-4">
            <div class="card">
                <h5 class="card-header">event</h5>
                <div class="card-body">
                    <h5 class="card-title">event name:<br> {{ $u['name'] }}</h5>
                    <p class="card-text"><h5>event discription:</h5><br> {{ $u['description'] }}</p>
                    <p class="card-text">event start at: {{ Carbon\Carbon::parse($u['start_time'])->diffForHumans() }}</p>
                    <p class="card-text">event end at:{{ Carbon\Carbon::parse($u['end_time'])->diffForHumans() }}</p>
                    <p class="card-text">event location:<div id="map"></div></p>
                
                </div>
            </div>
        </div>
        
        @endforeach     
        @endif
    </div>
    </div>
</div>


@endsection
