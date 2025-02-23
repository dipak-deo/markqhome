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

 $param .= "&special_offer=".request()->get('special_offer');
 $url .= "&special_offer=".request()->get('special_offer');
 $back .= "&special_offer=".request()->get('special_offer');
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
            <li class="active" id="account"><strong>08 New Home</strong></li>
          </ul>
        </div>
      </div>
      <div class="row type-row">
        <div class="col-12 col-sm-12">
          <h6>Step 08</h6>
          <h1>Request your estimate</h1>
          <p>Complete your details below to request an estimate.</p>
        </div>
        <div class="col-12 col-sm-12">
          <form action="{{ route('home.build-quits.step_eight.sumbit') }}{{ $param }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-12 col-lg-6">
                <div class="md-form">
                  <label>First Name</label>
                  <input type="text" name="first_name" class="form-control" placeholder="First Name *" value="{{ old('first_name') }}" required>
                 @error('first_name') <p class="text-danger">{{ $message }}</p> @enderror
                </div>
              </div>
              <div class="col-md-12 col-lg-6">
                <div class="md-form">
                  <label>Last Name</label>
                  <input type="text" name="last_name" class="form-control" placeholder="Last Name *" value="{{ old('last_name') }}" required>
                  @error('last_name') <p class="text-danger">{{ $message }}</p> @enderror
                </div>
              </div>
              <div class="col-md-12 col-lg-6">
                <div class="md-form">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" placeholder="Email *" value="{{ $buildquit->email ?? old('email') }}" required>
                  @error('email') <p class="text-danger">{{ $message }}</p> @enderror
                </div>
              </div>
              <div class="col-md-12 col-lg-6">
                <div class="md-form">
                  <label>Phone Number</label>
                  <input type="text" name="phone" class="form-control" placeholder="Phone Number *" value="{{ $buildquit->phone ?? old('phone') }}" required>
                  @error('phone') <p class="text-danger">{{ $message }}</p> @enderror
                </div>
              </div>
              <div class="col-md-12 col-lg-6">
                <div class="md-form">
                  <label>Build Address</label>
                  <input type="text" name="build_address" class="form-control" placeholder="Address *" value="{{ old('build_address') }}" required>
                  @error('build_address') <p class="text-danger">{{ $message }}</p> @enderror
                </div>
              </div>
              <div class="col-md-12 col-lg-6">
                <div class="md-form">
                  <label>Location</label>
                  <input type="text" name="location" class="form-control" placeholder="Location *" value="{{ old('location') }}" required>
                  @error('location') <p class="text-danger">{{ $message }}</p> @enderror
                </div>
              </div>
              {{-- <div class="col-md-12 col-lg-12">
                <div class="md-form">
                  <label>Location</label>
                  <select>
                    <option>Please select your location</option>
                    <option>Please select your location</option>
                    <option>Please select your location</option>
                    <option>Please select your location</option>
                    <option>Please select your location</option>
                    <option>Please select your location</option>
                  </select>
                </div>
              </div> --}}
              {{-- <div class="col-md-12 col-lg-6">
                <div class="md-form">
                  <label>Product Type</label>
                  <select>
                    <option>Product Type</option>
                    <option>Product Type</option>
                    <option>Product Type</option>
                    <option>Product Type</option>
                    <option>Product Type</option>
                    <option>Product Type</option>
                  </select>
                </div>
              </div> --}}
              <div class="col-12 col-sm-12">
                <label>
                  <input type="checkbox">
                  <span>I accept all the <strong>Terms and Conditions</strong></span>
                </label>
              </div>
              <div class="col-12 col-sm-12">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
@endsection