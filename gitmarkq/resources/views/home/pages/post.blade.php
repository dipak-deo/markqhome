@extends('home.master')
@section('title',$data->title)
@section('body')

<div class="page-banner">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 page-column">
          <h1>Details <span>{{ $data->title }}</span></h1>
          {{-- <p>Your dream home starts with a feeling. Experience that feeling first-hand – step inside our MarkQ Homes display homes today. Find a MARKQ Homes Display Home near you.</p> --}}
        </div>
      </div>
    </div>
  </div>
<div class="blog-detail-section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12">
          @if($data->image !=NULL)
          <img class="blog-details-img" src="{{ url($data->image) }}">
          @endif
          <h2>{{ $data->title }}</h2>
          {{-- <ul>
            <li><a href="#"><img src="./images/admin.jpeg" alt=""> John Doe</a></li>
            <li><a href="#"><i class="fa fa-clock"></i> Nov 24, 2024</a></li>
            <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
          </ul> --}}
          {!! $data->description !!}
        </div>
      </div>
    </div>
  </div>
@endsection