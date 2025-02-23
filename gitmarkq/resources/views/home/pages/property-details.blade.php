@extends('home.master')
@section('titile','property detail')
@section('body')
<div class="breadcrumb-section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12">
          <ul class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#"> Search</a></li>
            <li><a href="#"> Display Homes</a></li>
            <li>{{ $data->title }}</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  @php 
  // dd($data->get_gellery())
  @endphp
  <div class="home-detail-section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12">
          <h5 class="detail-title">Project Details</h5>
          <h1>{{ $data->title }}</h1>
        </div>
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 home-detail-left">
          <ul class="detail-menus-lists">
            <li class="active"><a href="#">Overview</a></li>
            <li><a href="#">Gallery</a></li>
            <li><a href="#">Floorplan</a></li>
            <li><a href="#">Location</a></li>
            <li><a href="#">Similar</a></li>
          </ul>
  
          <div class="thumbnail_slider">
            <div id="primary_slider">
                <div class="splide__track">
                    <ul class="splide__list">
                      @foreach($data->gallery as $g)
                        <li class="splide__slide">
                            <img src="{{ url($g) }}">
                        </li>
                        @endforeach
                        
                    </ul>
                </div>
            </div>
            <!-- Primary Slider End-->
            <!-- Thumbnal Slider Start-->
            <div id="thumbnail_slider">
                <div class="splide__track">
                    <ul class="splide__list">
                      @foreach($data->gallery as $g)
                        <li class="splide__slide">
                            <img src="{{ url($g) }}">
                        </li>
                        @endforeach
                        
                       
                    </ul>
                </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 home-detail-right">
          <h3>$ {{ $data->price }}</h3>
          <ul>
            @foreach($data->property_meta as $pmk=>$pm)
            <li> {!! $pmk !!} {{ $pm }}</li>
            @endforeach
            {{-- <li><img src="./images/bathtub01.png" alt=""> 2.5</li>
            <li><img src="./images/sofa-02.png" alt=""> 2</li>
            <li><img src="./images/artboard.png" alt=""> 12.26 sq</li>
          </ul> --}}
          <h4>Overview</h4>
          <h5>{{ $data->title }}</h5>
          {!! $data->description !!}
          {{-- <a href="#" class="readmores">Read More <i class="fa fa-angle-right"></i></a> --}}
          <a href="{{ $data->get_meta('download_voucher') }}" class="btn btn-brochure">Download Brochure</a>
          <hr>
          <p><strong>For more information contact Wisdom Homes Enquiries</strong></p>
          <a href="#" class="btn btn-inquiresus" data-toggle="modal" data-target="#exampleModal">Inquire us <i class="fa fa-phone-volume"></i></a>
        </div>
      </div>
    </div>
  </div>
  
  
  <div class="modal fade inquiry-popup" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title" id="exampleModalLabel">Send <span>Inquiry</span></h5>
          <p>Simply fill out the form below to get started. Let us help turn your dream home into a reality with our expertise. We will be in touch with you soon.</p>
          <hr>
        </div>
        @include('message.message')
        <div class="modal-body">
          <form action="{{ route('home.property-inquery.submit') }}" method="POST">
            @csrf 
            <input type="hidden" name="property_id" value="{{ $data->id }}">
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
                  <input type="number" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="Phone">
                </div>
                @error('phone')<p class="text-danger">{{ $message }}</p>@enderror
              </div>
              <div class="col-md-12 col-lg-12">
                <label class="label">Where did you hear about us?</label>
                <div class="md-form">
                  <select name="how_to_reach_us">
                    <option value="Facebook">Facebook</option>
                    <option value="Instagram">Instagram</option>
                    <option value="Linked In">Linked In</option>
                    <option value="google">Google</option>
                    <option value="Person">Person</option>
                  </select>
                </div>
                @error('how_to_reach_us')<p class="text-danger">{{ $message }}</p>@enderror
              </div>
              <div class="col-md-12 col-lg-6">
                <label class="label">Build Location</label>
                <div class="md-form">
                  <input type="text" name="location" value="{{ old('location') }}" class="form-control" placeholder="Build Location">
                </div>
                @error('location')<p class="text-danger">{{ $message }}</p>@enderror
              </div>
              <div class="col-md-12 col-lg-6">
                <label class="label">Property Type</label>
                <div class="md-form">
                  <select name="property_type">
                    <option value="">Select One</option>
                   @foreach(property_type() as $ptype)
                   <option value="{{ $ptype->id }}">{{ $ptype->title }}</option>
                   @endforeach
                  </select>
                </div>
                @error('property_type')<p class="text-danger">{{ $message }}</p>@enderror
              </div>
              <div class="col-md-12 col-lg-12">
                <label class="label">Time Frame</label>
                <div class="md-form">
                  <input type="text" name="time_duretion" value="{{ old('time_duretion') }}" class="form-control">
                </div>
                @error('time_duretion')<p class="text-danger">{{ $message }}</p>@enderror
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label class="label">Message</label>
                <div class="md-form">
                  <textarea type="text" placeholder="Your message" name="message">{{ old('message') }}</textarea>
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
  
  
  
  <div class="floor-plan-section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12">
          <h3>Floor Plan</h3>
        </div>
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 floor-plan-left">
          @foreach($data->additional_image as $adm)
          <img src="{{ url($adm) }}" alt="">
          @endforeach
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 floor-plan-right">
          <h4>Floor Plan</h4>
          <ul>
            {{-- <li><img src="./images/bed-double.png" alt=""> 3</li> --}}
            @foreach($data->additional_data as $adk=>$ad)
            <li> {!! $adk !!} {{ $ad }}</li>
            @endforeach
          </ul>
          <h5>Area Calculations</h5>
          {{-- <h6><img src="./images/artboard.png" alt=""> Opt 1: 19.26 sq</h6>
          <h6><img src="./images/artboard.png" alt=""> Opt 2: 19.26 sq</h6> --}}
          <a href="{{ $data->get_meta('download_floorplan') }}" class="btn btn-floorplan">Download Floorplan <i class="fa fa-arrow-right"></i> </a>
        </div>
      </div>
    </div>
  </div>
  
  <div class="maps">
    {!! $data->map_ifreme !!}
    {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d805202.1174245778!2d144.39369296677754!3d-37.969642773560494!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad646b5d2ba4df7%3A0x4045675218ccd90!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2snp!4v1726931842300!5m2!1sen!2snp" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
  </div>
  
  <div class="explore-section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12">
          <h2>Similar Homes & land</h2>
          <p class="explore-content">Discover stunning facades to match your style.</p>
        </div>
        @foreach($data->get_similar_product() as $similar)
        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
          <a href="{{ route('home.detail',['id'=>$similar->id,'slug'=>$similar->slug,'&type=property-details']) }}"><img src="{{ $similar->image() }}" alt=""></a>
          <h3><a href="{{ route('home.detail',['id'=>$similar->id,'slug'=>$similar->slug,'&type=property-details']) }}">{{ $similar->title }}</a></h3>
          <p>{!! Str::limit($similar->description,150,'...') !!}</p>
          <ul>
            @foreach(get_item_category($similar->id,'PropertyMeta','property_id') as $cat)
                @if($cat->meta_key == 'category_id')
                <li><a href="#">{{ get_data_by_id($cat->meta_value,'PropertyCategory')->title }}</a></li>
                @endif
                @endforeach
          </ul>
          <a href="{{ route('home.detail',['id'=>$similar->id,'slug'=>$similar->slug,'&type=property-details']) }}" class="project">View project <i class="fa fa-angle-right"></i></a>
        </div>
        @endforeach
      
      </div>
    </div>
  </div>
  

@endsection

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@1.2.0/dist/css/splide.min.css">
@endpush

@push('scripts')


<script>
    function vertical_tabs()
    {
    if ($('.ux-vertical-tabs').length > 0)
      {
      $('.ux-vertical-tabs .tabs button').on("click", function()
        {
        var temp_tab = $(this).data('tab');
        var temp_tab_js = this.getAttribute('data-tab');
        var temp_content = $('.ux-vertical-tabs .maincontent .tabcontent[data-tab="' + temp_tab + '"]');
        var temp_content_js = document.querySelector('.ux-vertical-tabs .maincontent .tabcontent[data-tab="' + temp_tab_js + '"]');
        var temp_content_active_js = document.querySelector('.ux-vertical-tabs .maincontent .tabcontent.active');
  
        $('.ux-vertical-tabs .tabs button').removeClass('active');
        $('.ux-vertical-tabs .tabs button[data-tab="' + temp_tab + '"]').addClass('active');
  
        var animation_start = anime({ duration: 400, targets: temp_content_active_js, opacity:[1,0], translateX: [0,'100%'], easing: 'easeInOutCubic',
        complete: function()
          {
            $('.ux-vertical-tabs .maincontent .tabcontent').removeClass('active');
          temp_content.addClass('active');
          var animation_end = anime({ duration: 400, targets: temp_content_js, opacity:[0,1], translateX: ['100%','0'], easing: 'easeInOutCubic' });
            }
        });
        });
      }
    }
  
  $(function() 
    {
    vertical_tabs();
    });
  </script>
  
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script>
    let slideIndex = 1;
  const slides = document.getElementsByClassName("slide");
  const dots = document.getElementsByClassName("dot");
  
  // Function to show a specific slide
  function showSlides(n) {
    if (n > slides.length) {
      slideIndex = 1;
    }
    if (n < 1) {
      slideIndex = slides.length;
    }
  
    // Hide all slides
    for (let i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
  
    // Remove the "active" class from all dots
    for (let i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
  
    // Display the current slide and mark its corresponding dot as active
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
  }
  
  // Function to advance to the next slide
  function plusSlides(n) {
    showSlides((slideIndex += n));
  }
  
  // Function to navigate to a specific slide
  function currentSlide(n) {
    showSlides((slideIndex = n));
  }
  
  // Automatically advance to the next slide every 3 seconds (3000 milliseconds)
  setInterval(function () {
    plusSlides(1);
  }, 3000);
  
  // Initialize the slider
  showSlides(slideIndex);
  </script>
  
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    //FAQS
  $(document).ready(function(){
    $('.accordion-list > li > .answer').hide();
      
    $('.accordion-list > li').click(function() {
      if ($(this).hasClass("active")) {
        $(this).removeClass("active").find(".answer").slideUp();
      } else {
        $(".accordion-list > li.active .answer").slideUp();
        $(".accordion-list > li.active").removeClass("active");
        $(this).addClass("active").find(".answer").slideDown();
      }
      return false;
    });
    
  });
  </script>
  
  <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@1.2.0/dist/js/splide.min.js"></script>
  <script>
    // Primary slider.
  var primarySlider = new Splide('#primary_slider', {
      type: 'fade',
      heightRatio: 0.5,
      pagination: false,
      arrows: false,
      cover: true,
  });
  
  // Thumbnails slider.
  var thumbnailSlider = new Splide('#thumbnail_slider', {
      rewind: true,
      fixedWidth: 100,
      fixedHeight: 64,
      isNavigation: true,
      gap: 10,
      focus: 'center',
      pagination: false,
      cover: true,
      breakpoints: {
          '600': {
              fixedWidth: 66,
              fixedHeight: 40,
          }
      }
  }).mount();
  
  // sync the thumbnails slider as a target of primary slider.
  primarySlider.sync(thumbnailSlider).mount();
  </script>
@endpush