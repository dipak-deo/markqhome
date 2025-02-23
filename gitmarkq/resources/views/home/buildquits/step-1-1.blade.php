@extends('home.master')
@section('title', 'step 1 -1')
@section('body')
@php 
$url = request()->url();
$step1 = request()->get('id');
$home_type = request()->get('home_type');
$url = $url . "?id=" . $step1 . "&home_type=".$home_type;

$param = "?id=" . $step1 . "&home_type=".$home_type;

if(request()->get('property-id') !=NULL){
 $pr = get_property_details(request()->get('property-id'));
 $param .= "&property-id=".request()->get('property-id');
 $totalAmount = $pr->price;
}else{
  $totalAmount = 0;
}
@endphp
<div class="quote-section">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12">
        <ul id="progressbar">
          <li class="{{ request()->get('id')? 'active':'' }}" id="account"><strong><span>01</span> Home Type</strong></li>
          <li class="{{ request()->get('id')? 'active':'' }}" id="account"><strong>02 Floor Plan</strong></li>
          <li class="{{ request()->get('step_3')? 'active':'' }}" id="account"><strong>03 Facade</strong></li>
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
        <h1>Select a home design</h1>
        <p>{{ $desire_data->count() }} Homes match your criteria</p>
      </div>
      <div class="col-12 col-sm-12 home-select-column">
        <form class="boxed">
          <div class="row">
            <div class="col-12 col-sm-12 col-md-3 log-lg-3">
              <div class="row home-select-row">
                <div class="col-12 col-sm-12">
                  <h5>Beds</h5>
                </div>
                <div class="col-4 col-sm-4">
                  <input type="radio" id="number1" name="skills" value="2">
                  <label for="number1">2</label>
                </div>
                <div class="col-4 col-sm-4">
                  <input type="radio" id="number2" name="skills" value="2">
                  <label for="number2">2</label>
                </div>
                <div class="col-4 col-sm-4">
                  <input type="radio" id="all" name="skills" value="All">
                  <label for="all">All</label>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-md-3 log-lg-3">
              <div class="row home-select-row">
                <div class="col-12 col-sm-12">
                  <h5>Baths</h5>
                </div>
                <div class="col-4 col-sm-4">
                  <input type="radio" id="number11" name="skills" value="2">
                  <label for="number11">2</label>
                </div>
                <div class="col-4 col-sm-4">
                  <input type="radio" id="number12" name="skills" value="2">
                  <label for="number12">2</label>
                </div>
                <div class="col-4 col-sm-4">
                  <input type="radio" id="all1" name="skills" value="All">
                  <label for="all1">All</label>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-md-3 log-lg-3">
              <div class="row home-select-row">
                <div class="col-12 col-sm-12">
                  <h5>Garage</h5>
                </div>
                <div class="col-4 col-sm-4">
                  <input type="radio" id="number13" name="skills" value="2">
                  <label for="number13">2</label>
                </div>
                <div class="col-4 col-sm-4">
                  <input type="radio" id="number22" name="skills" value="2">
                  <label for="number22">2</label>
                </div>
                <div class="col-4 col-sm-4">
                  <input type="radio" id="all2" name="skills" value="All">
                  <label for="all2">All</label>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-md-3 log-lg-3">
              <div class="row">
                <div class="col-12 col-sm-12">
                  <h5>Low Width</h5>
                </div>
                <div class="col-12 col-sm-12">
                  <select>
                    <option>Select One</option>
                    <option>Select One</option>
                    <option>Select One</option>
                  </select>
                </div>
              </div>
            </div>
        </form>
      </div>

      <div class="col-12 col-sm-12 beauty-item owl-carousel">

        @foreach($desire_data as $key=>$data)
        <div class="beauty-box">
          <div class="housing-boxes">
            <h5>Project Details</h5>
            <h2>{{ $data->title }}</h2>
            <ul class="house-lists">
              @if($data->property_meta !=NULL)
              @foreach($data->property_meta as $p=>$pm)
              <li>{!! $p !!} -  {!! $pm !!}</li>
              @endforeach
              @endif
            </ul>
            <h3>Key details</h3>
            <ul class="floor-lists">

              @if($data->additional_data !=NULL)
              @foreach($data->additional_data as $a=>$ad)
              <li>{!! $a !!} -  {!! $ad !!}</li>
              @endforeach
              @endif
             
            </ul>
          </div>
          <a href="{{ $url }}&property-id={{ $data->id }}"><img class="apollo-img" src="{{ $data->image() }}" alt=""></a>
        </div>
        @endforeach

  

      </div>
    </div>
  </div>
</div>
<div class="next-section">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-4 col-md-3 col-lg-3">
        <a href="#" class="btn btn-back">Back</a>
      </div>
      <div class="col-12 col-sm-4 col-md-6 col-lg-6">
        <h6>Sub-total <span id="sub_total">{{ ($totalAmount > 0 )? '$'.$totalAmount:'' }}</span></h6>
      </div>
      <div class="col-12 col-sm-4 col-md-3 col-lg-3">
        <a href="{{ route('home.build-quits.step_two') }}{{ $param }}" class="btn btn-next">Next</a>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  $(document).ready(function(){

  });
</script>
@endpush
