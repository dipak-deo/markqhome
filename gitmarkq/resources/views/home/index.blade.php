@extends('home.master')
@section('title','home')
@section('body')
@include('message.message')

@livewire('banner')
@livewire('home-design')



<div class="experience-section">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12">
        <h5>The Difference You Will Experience</h5>
      </div>
      <div class="col-12 col-sm-12 col-md-6 col-lg-6">
        <h2>Experience Your home <span>built with Excellence</span></h2>
      </div>
      <div class="col-12 col-sm-12 col-md-6 col-lg-6">
        <p>At MARKQ Homes, we take a unique approach to building custom-designed luxury homes. With a strong emphasis on quality construction, personalized service, and attention to detail, we create homes that reflect your vision and lifestyle.</p>
        <a href="#" class="learn">Learn more <i class="fa fa-arrow-right"></i></a>
      </div>
      <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="build-box">
          <img src="{{ url('home/images/icon1.png')}}" alt="">
          <h4>Proudly Australian</h4>
          <p>An Australian owned and operated company committed to supporting our local economy.</p>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="build-box">
          <img src="{{ url('home/images/icon2.png')}}" alt="">
          <h4>Focused on you</h4>
          <p>An Australian owned and operated company committed to supporting our local economy.</p>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="build-box">
          <img src="{{ url('home/images/icon3.png')}}" alt="">
          <h4>Experience you Can Trust</h4>
          <p>An Australian owned and operated company committed to supporting our local economy.</p>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="build-box">
          <img src="{{ url('home/images/icon4.png')}}" alt="">
          <h4>Built for the Future</h4>
          <p>An Australian owned and operated company committed to supporting our local economy.</p>
        </div>
      </div>
    </div>
  </div>
</div>



@livewire('insperiation')
@if(home_section('why-choose-us') !=NULL)
<div class="trust-section">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12">
        <h5>Why Choose Us</h5>
        <h3>Your <span>trusted partner</span> for building high-quality, custom luxury homes.</h3>
        {!! home_section('why-choose-us')['short_description'] !!}
      </div>
      <div class="col-12 col-sm-12">
        {!! home_section('why-choose-us')['youtube_ifreme'] !!} 
      </div>
      <div class="col-12 col-sm-12 col-md-5 col-lg-5">
        <h4>Unbeatable value of up to <span>$87K</span> with MARKQ Homes</h4>
        <p>MARKQ Homes is the leading luxury home builder in Sydney, offering custom-designed homes tailored to your unique needs and preferences.</p>
        <a href="{{ home_section('why-choose-us')['button_one_link'] }} " class="btn btn-visit">Visit Display Homes <i class="fa fa-arrow-right"></i></a>
        <a href="{{ home_section('why-choose-us')['button_two_link'] }} " class="btn btn-contact">Contact Us</a>
      </div>
      <div class="col-12 col-sm-12 col-md-2 col-lg-2">
        
      </div>
      <div class="col-12 col-sm-12 col-md-5 col-lg-5 client-lists">
        <ul>
          <li><img src="{{ url('home/images/box1.png')}}" alt=""> <p>Client Satisfaction</p></li>
          <li><img src="{{ url('home/images/box2.png')}}" alt=""> <p>Houses Built</p></li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endif

@livewire('home-and-land-package')

@livewire('testmonial')

@livewire('home-package')



@livewire('blogs')





@endsection