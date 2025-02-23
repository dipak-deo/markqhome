@extends('home.master')
@section('title','step 1')
@section('body')
<div class="quote-section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
          <img src="{{ url('home/images/quote-img.png')}}" alt="">
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
          <div class="quote-box">
            <h1>Build a Quote</h1>
            <p>Get started by entering your details below to begin your quote with MarkQ Homes design range! Take the first step towards building your dream home. Fill out the form below to receive your personalized quote today!</p>
            <form method="POST" action="{{ route('home.build-quits.start.post') }}" id="step_1_form">
              @csrf
              <div class="row">
                <div class="col-md-12 col-lg-12">
                  <div class="md-form">
                    <label>Full Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Full Name *">
                  </div>
                </div>
                <div class="col-md-12 col-lg-6">
                  <div class="md-form">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email *">
                  </div>
                </div>
                <div class="col-md-12 col-lg-6">
                  <div class="md-form">
                    <label>Phone Number</label>
                    <input type="text" name="phone" class="form-control" placeholder="Phone Number *">
                  </div>
                </div>
              </div>
            </form>
          </div>
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
          <a href="/" class="btn btn-next" id="step_1">Next</a>
        </div>
      </div>
    </div>
  </div>
  
@endsection
@push('scripts')
<script>
  $(document).ready(function(){
    $('#step_1').click(function(e){
      e.preventDefault();
      var name = $('input[name="name"]').val();
      var email = $('input[name="email"]').val();
      var phone = $('input[name="phone"]').val();
      if(name == '' || email == '' || phone == ''){
        alert('Please fill all fields');
        return false;
      }else{
        // submit form
        // {{ route('home.build-quits.step_one') }}
        $('#step_1_form').submit();
      }
    });
  });
</script>
@endpush