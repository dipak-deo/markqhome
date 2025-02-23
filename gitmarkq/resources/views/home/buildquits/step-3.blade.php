@extends('home.master')
@section('title','step 1')
@section('body')
@php 
$url = request()->url();
$step1 = request()->get('id');
$home_type = request()->get('home_type');
$url = $url . "?id=" . $step1 . "&home_type=".$home_type."&property-id=".request()->get('property-id');

$param = "?id=" . $step1 . "&home_type=".$home_type."&property-id=".request()->get('property-id');
$back = "?id=" . $step1 . "&home_type=".$home_type;

if(request()->get('facade_id') !=NULL){
 $pr = get_homestyle(request()->get('facade_id'));
 $param .= "&facade_id=".request()->get('facade_id');
 $totalAmount += $pr->price;
}else{
  $totalAmount += 0;
}
@endphp
<div class="quote-section">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12">
        <ul id="progressbar">
          <li class="active" id="account"><strong><span>01</span> Home Type</strong></li>
          <li class="active" id="account"><strong>02 Floor Plan</strong></li>
          <li class="active" id="account"><strong>03 Facade</strong></li>
          <li id="account"><strong>04 Inclusions</strong></li>
          <li id="account"><strong>05 Upgrade</strong></li>
          <li id="account"><strong>06 Landscaping</strong></li>
          <li id="account"><strong>07 Special Offers</strong></li>
          <li id="account"><strong>08 New Home</strong></li>
        </ul>
      </div>
    </div>
    <div class="row type-row">
      <div class="col-12 col-sm-12">
        <h6>Step 3</h6>
        <h1>Select your facade</h1>
      </div>
      <div class="col-12 col-sm-12 beauty-item owl-carousel">
        @foreach($facades as $data)
        <div class="beauty-box">
          <a href="{{ $url }}&facade_id={{$data->id}}"><img src="{{ $data->image() }}" alt=""></a>
          <p>{{ $data->title }} . ${{ $data->price }}</p>
        </div>
        @endforeach
        
      </div>
    </div>
  </div>
</div>
  <div class="next-section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
          <a href="{{ route('home.build-quits.step_two') }}" class="btn btn-back">Back</a>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
          <h6>Sub-total <span>${{ $totalAmount }}</span></h6>
        </div>
        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
          <a href="{{ route('home.build-quits.step_four') }}{{ $param }}" class="btn btn-next">Next</a>
        </div>
      </div>
    </div>
  </div>
@endsection