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


if(request()->get('upgrate_type') !=NULL && request()->get('upgrate_type_item') !=NULL){
 $pr = get_upgrateType_meta(request()->get('upgrate_type'),request()->get('upgrate_type_item'));
 $param .= "&upgrate_type=".request()->get('upgrate_type');
 $param .= "&upgrate_type_item=".request()->get('upgrate_type_item');
 $totalAmount += $pr['price'];
//  echo $pr['price'];
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
            <li class="active" id="account"><strong>04 Inclusions</strong></li>
            <li class="active" id="account"><strong>05 Upgrade</strong></li>
            <li id="account"><strong>06 Landscaping</strong></li>
            <li id="account"><strong>07 Special Offers</strong></li>
            <li id="account"><strong>08 New Home</strong></li>
          </ul>
        </div>
      </div>
      <div class="row type-row">
        <div class="col-12 col-sm-12">
          <h6>Step 05</h6>
          <h1>Choose your upgrades</h1>
        </div>
        <div class="col-12 col-sm-12">

          @foreach($upgrate_type as $data)
          <details>
            <summary>{{ $data->title }}</summary>
            <div class="content">
              <ul>
                @if($data->description !=NULL)
                @foreach($data->description as $dis)
                <li><a href="{{ $url }}&upgrate_type={{ $data->id }}&upgrate_type_item={{ $dis['uuid'] }}"><i class="fas fa-circle"></i> {{ $dis['title'] }} - {{ $dis['description'] }}  <span class="price">$ {{ $dis['price'] }} <i class="fa fa-check" style="border: 2px solid #E66410; padding: 4px 4px; border-radius: 50%; font-size: 10px; background-color: #E66410; color: #fff;"></i></span></a></li>
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
          <a href="{{ route('home.build-quits.step_four') }}{{ $back }}" class="btn btn-back">Back</a>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
          <h6>Sub-total <span>$ {{ $totalAmount }}</span></h6>
        </div>
        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
          <a href="{{ route('home.build-quits.step_six') }}{{ $param }}" class="btn btn-next">Next</a>
        </div>
      </div>
    </div>
  </div>
  
@endsection