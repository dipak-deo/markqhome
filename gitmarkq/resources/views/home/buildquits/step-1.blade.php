@extends('home.master')
@section('title','step 1')
@section('body')
@php 
$url = request()->url();
$step1 = request()->get('id');
$url = $url . "?id=" . $step1;

@endphp
<div class="quote-section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12">
          <ul id="progressbar">
            <li class="{{ request()->get('id')? 'active':'' }}" id="account"><strong><span>01</span> Home Type</strong></li>
            <li class="{{ request()->get('home_type')? 'active':'' }}" id="account"><strong>02 Floor Plan</strong></li>
            <li id="account"><strong>03 Facade</strong></li>
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
          <h6>Step 1</h6>
          <h1>Select a home type</h1>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
          <a href="{{ $url }}&home_type=single_storey">
            <div class="type-box">
              <img src="{{url('home/images/store-04.png')}}" alt="">
              <h4>Single Storey</h4>
            </div>
          </a>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
          <a href="{{ $url }}&home_type=double_storey">
            <div class="type-box">
              <img src="{{url('home/images/building-03.png')}}" alt="">
              <h4>Double Storey</h4>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="next-section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
          
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
          
        </div>
        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
          <a href="{{ route('home.build-quits.step_one.sub') }}" class="btn btn-next" id="step_1_next">Next</a>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('scripts')
<script>
  $(document).ready(function(){
   $('#step_1_next').click(function(){
     var home_type = "{{ request()->get('home_type') }}";
     if(home_type == ''){
       alert('Please select a home type');
       return false;
     }else{
      // add paramater id and home_type to this id route
      var url = $(this).attr('href') + "?id={{ request()->get('id') }}&home_type=" + home_type;
      $(this).attr('href',url);
      
     }
   });
  });
</script>
@endpush