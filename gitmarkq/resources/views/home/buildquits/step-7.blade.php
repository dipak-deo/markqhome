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
//  $pr = get_upgrateType_meta(request()->get('upgrate_type'),request()->get('upgrate_type_item'));
 $param .= "&upgrate_type=".request()->get('upgrate_type');
 $back .= "&upgrate_type=".request()->get('upgrate_type');
 $url .= "&upgrate_type=".request()->get('upgrate_type');
 $param .= "&upgrate_type_item=".request()->get('upgrate_type_item');
 $back .= "&upgrate_type_item=".request()->get('upgrate_type_item');
 $url .= "&upgrate_type_item=".request()->get('upgrate_type_item');
//  $totalAmount += $pr['price'];
}

if(request()->get('landscaping_id') !=NULL){

 $param .= "&landscaping_id=".request()->get('landscaping_id');
 $url .= "&landscaping_id=".request()->get('landscaping_id');
 $back .= "&landscaping_id=".request()->get('landscaping_id');
}

if(request()->get('special_offer')){
   $pr = get_special_offer(request()->get('special_offer'));
 $totalAmount += $pr->price;
 $param .= "&special_offer=".request()->get('special_offer');
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
          <li class="active" id="account"><strong>06 Landscaping</strong></li>
          <li class="active" id="account"><strong>07 Special Offers</strong></li>
          <li id="account"><strong>08 New Home</strong></li>
        </ul>
      </div>
    </div>
    <div class="row type-row">
      <div class="col-12 col-sm-12">
        <h6>Step 07</h6>
        <h1>Special offers</h1>
      </div>
      <div class="col-12 col-sm-12">
        <div class="row offer-list-row">
          @foreach($special_offer as $data)
          <div class="col-12 col-sm-12 col-md-6 col-lg-4">
            <a href="{{ $url }}&special_offer={{ $data->id }}">
              <div class="offer-box">
                <h4>{{ $data->title }} {!! (request()->get('special_offer') == $data->id)? '<i class="fa fa-check"></i>':'' !!} 
                  <span>${{ $data->price }}</span>
                 </h4>
                <img src="{{ $data->image() }}" alt="">
              </div>
            </a>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
  <div class="next-section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
          <a href="{{ route('home.build-quits.step_six') }}{{ $back }}" class="btn btn-back">Back</a>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
          <h6>Sub-total <span>${{ $totalAmount }}</span></h6>
        </div>
        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
          <a href="{{ route('home.build-quits.step_eight') }}{{ $param }}" class="btn btn-next">Next</a>
        </div>
      </div>
    </div>
  </div>
  
@endsection