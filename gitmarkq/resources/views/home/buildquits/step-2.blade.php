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

if(request()->get('property-id') !=NULL){
 $pr = get_property_details(request()->get('property-id'));
//  $param .= "&property-id=".request()->get('property-id');
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
          <h6>Step 2</h6>
          <h1>Configure your floorplan</h1>
        </div>
        <div class="col-12 col-sm-12">
          <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
              <div class="col-12 col-sm-12">
                <div class="housing-boxes">
                  <h5>Project Details</h5>
                  <h2>Apollo Housing</h2>
                  <ul class="house-lists">
                    @if($property->property_meta !=NULL)
                    @foreach($property->property_meta as $p=>$pm)
                    <li>{!! $p !!} -  {!! $pm !!}</li>
                    @endforeach
                    @endif
                  </ul>
                  <h3>Floorplan details</h3>
                  <ul class="floor-lists">
                    @if($property->additional_data !=NULL)
                    @foreach($property->property_meta as $p=>$pm)
                    <li>{!! $p !!} -  {!! $pm !!}</li>
                    @endforeach
                    @endif
                  </ul>
                  <br>
                  <h3>Configure your floorplan</h3>
                  <div class="new">
                    @php  $bf = get_buildquit_meta(request()->get('id'),'floor_plan')  @endphp
                    <form>
                      @foreach($floorplan as $key=>$fdata)
                      <div class="form-group">
                        <input type="checkbox" id="additional_{{$key}}" value="{{ $fdata->price }}" data-id="{{ $fdata->id }}" class="floorPlans" @if($bf !=NULL) {{ ($bf->meta_value == $fdata->id)? 'checked':''  }}  @endif >
                        <label for="additional_{{$key}}">{{ $fdata->title }} <span>${{ $fdata->price }}</span></label>
                      </div>
                      @endforeach
                      
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 type-row-right">
              <img src="{{ $property->image() }}" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="next-section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
          <a href="{{ route('home.build-quits.step_one.sub') }}{{ $back }}" class="btn btn-back">Back</a>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
          <h6>Sub-total <span id="subTotal" data-amount="{{ $totalAmount }}">{{ ($totalAmount > 0 )? '$'.$totalAmount:'' }}</span></h6>
        </div>
        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
          <a href="{{ route('home.build-quits.step_three') }}{{ $param }}" class="btn btn-next">Next</a>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('scripts')
<script>
  $(document).ready(function () {
  var total = 0; // Initialize total

  $('.floorPlans').on('change', function () {
    var subtotal = parseFloat($('#subTotal').data('amount')); // Get the initial subtotal
    console.log('Initial subtotal:', subtotal);

    var floorPlans = parseFloat($(this).val()); // Parse the value of the changed checkbox
    var floor_plan_id = $(this).data('id');
    if ($(this).is(':checked')) {
      total += floorPlans; // Add value when checked
      console.log("Added:", floorPlans);
      $.ajax({
        url: "{{ route('update.floor_pan') }}",
        type: "POST",
        data:{
          '_token': "{{ csrf_token() }}",
          'floor_plan': floor_plan_id,
          'build_quits_id': {{ request()->get('id') }},
          'checked':true
        },
        success: function(res){
          console.log(res);
          
        },
        error: function(error){
          console.error(error);
        }
      });
    } else {
      total -= floorPlans; // Subtract value when unchecked
      console.log("Subtracted:", floorPlans);

      $.ajax({
        url: "{{ route('update.floor_pan') }}",
        type: "POST",
        data:{
          '_token': "{{ csrf_token() }}",
          'floor_plan': floor_plan_id,
          'build_quits_id': {{ request()->get('id') }},
          'checked':false
        },
        success: function(res){
          console.log(res);
          
        },
        error: function(error){
          console.error(error);
        }
      });
    }

    var grandTotal = subtotal + total; // Calculate the new grand total
    console.log("Grand total:", grandTotal);

    // Update the subtotal display
    $('#subTotal').text("$ " + grandTotal.toFixed(2)); // Display formatted grand total
  });



  // if already checked then directly updated
  $('.floorPlans:checked').each(function () {
    var floorPlans = parseFloat($(this).val()); // Parse the value of the checked checkbox
    total += floorPlans; // Add to the total
  });
  var subtotal = parseFloat($('#subTotal').data('amount'));
  var grandTotal = subtotal + total;
  $('#subTotal').text("$ " + grandTotal.toFixed(2)); 
});

</script>
@endpush