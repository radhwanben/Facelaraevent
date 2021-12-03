@extends('layouts.app')

@section('content')
    <div class="row">
      <div class="medium-6 columns">
        <h4>Friends of Knighswood Park App {{ $version }}</h4>
        <img class="thumbnail" src="images/attractions.jpg">
      </div>
      <div class="medium-6 large-5 columns">
        <p>The purpose of this site is to map all of the groups that are currently operating within Knightswood.</p>
        <p>As groups come and go, with changes happen often this site is a live document. </p>
        <p>Every group can register, update details and link their details to their social calenders (facebook, twitter, what's on, etc).</p>
      </div>
    </div>
@endsection
