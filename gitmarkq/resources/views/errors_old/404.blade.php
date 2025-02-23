@extends('home.master')
@section('title','404 not found')
@section('body')
<div class="error-section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12">
          <h1>Oops!</h1>
          <h2>404 - Page not found</h2>
          <p>The page you are looking for might have been removed <span>had its name changed or is temporarily unavailable.</span> </p>
          <a href="{{ url('/') }}" class="btn btn-home">Go to homepage</a>
        </div>
      </div>
    </div>
  </div>
  
@endsection