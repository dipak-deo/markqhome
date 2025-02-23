@extends('home.master')
@section('title',$page_detail->title)
@section('body')
<div class="page-banner">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 page-column">
          {{-- <h1>Why <span>Choose</span> Us?</h1> --}}
          <h1>{{ $page_detail->title }}</h1>
          {!! $page_detail->content !!}
        </div>
      </div>
    </div>
  </div>
  @foreach($data as $key=>$items)
  @if($key%2 == 0)
  <div class="process-section">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 process-left">
          <h5>DESIGN YOUR DREAM HOME ON YOUR PROPERTY</h5>
          <h2>{{ $items->title }}</h2>
          <ul>
            <li>Discover our customizable home designs, perfect for a streamlined building experience.</li>
            <li>Explore pre-designed homes offering exceptional value and quality.</li>
            <li>Find the perfect home for your lifestyle and budget.</li>
          </ul>
          <a href="#" class="btn btn-process">View Process <i class="fa fa-arrow-right"></i></a>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 process-right">
          
        </div>
      </div>
  </div>
  @else
  
  <div class="process-sections">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 precess-left1">
          
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 process-right1">
          <h5>SIMPLIFY YOUR HOME BUILDING JOURNEY</h5>
          <h2>Home & Land Package</h2>
          <ul>
            <li>Simplify your journey with our curated land and home pairings.</li>
            <li>Explore packages tailored to your needs and desired location.</li>
            <li>Experience the ease of a combined land and home purchase.</li>
          </ul>
          <a href="#" class="btn btn-process">View Process <i class="fa fa-arrow-right"></i></a>
        </div>
      </div>
  </div>
  @endif
  @endforeach
  

@endsection