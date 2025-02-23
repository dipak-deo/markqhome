@extends('home.master')
@section('title','contact us')
@section('body') 
<div class="page-banner">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 page-column">
          <h1>Get In Touch</h1>
          <p>Contact MARKQ Homes for any inquiries or to schedule a consultation.</p>
        </div>
      </div>
    </div>
  </div>
  
  <div class="address-section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 address-box">
          <img src="{{ url('home/images/call-icon.png')}}" alt="">
          <h3>Call us</h3>
          <p>{{ $settings->phone }}</p>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 address-box">
          <img src="{{ url('home/images/email-icon.png')}}" alt="">
          <h3>Email us at</h3>
          <p>{{ $settings->email }}</p>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 address-box1">
          <img src="{{ url('home/images/map-icon.png')}}" alt="">
          <h3>Visti our Office</h3>
          <p>{{ $settings->address }}</p>
        </div>
      </div>
    </div>
  </div>
  
  <div class="touch-section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 touch-left">
          <h6>Contact Us</h6>
          <h2>Get in Touch</h2>
          <p>If you have any inquiries, need general information, or want to schedule a consultation, please complete the form. We're here to assist you and look forward to helping you with whatever you need.</p>
          <ul>
            <li><img src="{{ url('home/images/touch-icon.png')}}" alt=""><h5>Call us now <span>1300 0 MARKQ (62757)</span></h5></li>
            <li><img src="{{ url('home/images/touch-icon1.png')}}" alt=""><h5>Chat with us <span>info@markq.com.au</span></h5></li>
          </ul>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 touch-right">
          @include('message.message')
          <form method="POST" action="{{ route('contact.submit') }}">
            @csrf
            <div class="row">
              <div class="col-md-12 col-lg-6">
                <label class="label">First Name</label>
                <div class="md-form">
                  <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control" placeholder="First Name">
                </div>
                @error('first_name')<p class="text-danger">{{ $message }}</p>@enderror
              </div>
              <div class="col-md-12 col-lg-6">
                <label class="label">Last Name</label>
                <div class="md-form">
                  <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control" placeholder="Last Name">
                </div>
                @error('last_name')<p class="text-danger">{{ $message }}</p>@enderror
              </div>
              <div class="col-md-12 col-lg-6">
                <label class="label">Email</label>
                <div class="md-form">
                  <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="email">
                </div>
                @error('email')<p class="text-danger">{{ $message }}</p>@enderror
              </div>
              <div class="col-md-12 col-lg-6">
                <label class="label">Phone Number</label>
                <div class="md-form">
                  <input type="number" name="phone" class="form-control" placeholder="Phone">
                </div>
                @error('phone')<p class="text-danger">{{ $message }}</p>@enderror
              </div>
              {{-- <div class="col-md-12 col-lg-12">
                <label class="label">What property type are you after?*</label>
                <div class="md-form">
                  <select>
                    <option>Select One</option>
                    <option>Select One</option>
                    <option>Select One</option>
                    <option>Select One</option>
                    <option>Select One</option>
                  </select>
                </div>
              </div> --}}
              <div class="col-12 col-sm-12">
                <label class="label">Which best describe you?</label>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="who_are_you" id="Radios1" value="First home buyer">
                  <label class="form-check-label" for="Radios1">
                    First home buyer
                  </label>
                </div>
              </div>
              <div class="col-md-6 col-lg-6">              
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="who_are_you" id="Radios2" value="Invester">
                  <label class="form-check-label" for="Radios2">
                    Invester
                  </label>
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="who_are_you" id="Radios3" value="Knockdown & rebuilt">
                  <label class="form-check-label" for="Radios3">
                    Knockdown & rebuilt
                  </label>
                </div>
              </div>
              <div class="col-md-6 col-lg-6">              
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="who_are_you" id="Radios4" value="Other">
                  <label class="form-check-label" for="Radios4">
                    Other
                  </label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label class="label">Message</label>
                <div class="md-form">
                  @error('message')<p class="text-danger">{{ $message }}</p>@enderror
                  <textarea type="text" name="message" placeholder="Your message">{{ old('message') }}</textarea>
                </div>
              </div>
              <div class="col-md-12 col-lg-12">              
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="Radios" id="accept" value="accept">
                  <label class="form-check-label" for="accept">
                    I accept all the <strong><a href="#">Terms and Conditions</a></strong>
                  </label>
                </div>
              </div>
              <div class="col-12 col-sm-12">
                <button type="submit">Submit Message <i class="fa fa-arrow-right"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <div class="maps">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d805202.1174245778!2d144.39369296677754!3d-37.969642773560494!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad646b5d2ba4df7%3A0x4045675218ccd90!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2snp!4v1726931842300!5m2!1sen!2snp" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
  

@endsection