@extends('home.master')
@section('title','step 1')
@section('body')
@php 
$url = request()->url();
$step1 = request()->get('id');
$home_type = request()->get('home_type');
$url = $url . "?id=" . $step1 . "&home_type=".$home_type."&property-id=".request()->get('property-id')
."&facade_id=".request()->get('facade_id');

$param = "?id=" . $step1 . "&home_type=".$home_type."&property-id=".request()->get('property-id')
."&facade_id=".request()->get('facade_id');
$back = "?id=" . $step1 . "&home_type=".$home_type."&property-id=".request()->get('property-id')
."&facade_id=".request()->get('facade_id');


// if(request()->get('facade_id') !=NULL){
//  $pr = get_homestyle(request()->get('facade_id'));
//  $param .= "&facade_id=".request()->get('facade_id');
//  $totalAmount += $pr->price;
// }else{
//   $totalAmount += 0;
// }
@endphp
<div class="quote-section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12">
          <ul id="progressbar">
            <li class="active" id="account"><strong><span>01</span> Home Type</strong></li>
            <li class="active" id="account"><strong>02 Floor Plan</strong></li>
            <li class="active" id="account"><strong>03 Facade</strong></li>
            <li class="active" id="account"><strong>04 Inclusions</strong></li>
            <li id="account"><strong>05 Upgrade</strong></li>
            <li id="account"><strong>06 Landscaping</strong></li>
            <li id="account"><strong>07 Special Offers</strong></li>
            <li id="account"><strong>08 New Home</strong></li>
          </ul>
        </div>
      </div>
      <div class="row type-row">
        <div class="col-12 col-sm-12">
          <h6>Step 04</h6>
          <h1>Select inclusions</h1>
        </div>
        <div class="col-12 col-sm-12">
          @foreach($ins as $data)
          <details>
            <summary>{{ $data->title }}</summary>
            <div class="content">
              <ul>
                @if($data->description !=NULL)
                @foreach($data->description as $desc)
                <li><span>{{ $desc['title'] }}</span> {{ $desc['description'] }}</li>
                @endforeach
                @endif
              </ul>
            </div>
          </details>
          @endforeach
  
        </div>
      </div>
    </div>
  </div>
  <div class="next-section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
          <a href="{{ route('home.build-quits.step_three') }}{{$back}}" class="btn btn-back">Back</a>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
          {{-- <h6>Sub-total <span>$44,14,240</span></h6> --}}
        </div>
        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
          <a href="{{ route('home.build-quits.step_five') }}{{ $param }}" class="btn btn-next">Next</a>
        </div>
      </div>
    </div>
  </div>
  
@endsection