@extends('home.master')
@section('title',$page_detail->title)
@section('body')
<div class="page-banner">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 page-column">
          <h1>{{  $page_detail->title }}</h1>
          {!! $page_detail->content !!}
        </div>
      </div>
    </div>
  </div>
  
  <div class="initial-section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12">
          <div class="uk-container uk-padding">
            <div class="uk-timeline">
                @foreach($data as $key=>$item)
              <div class="uk-timeline-item">
                <div class="uk-timeline-icon">
                  <span class="uk-badge">0{{ $key }}</span>
                </div>
                <div class="uk-timeline-content">
                  <div class="uk-card uk-card-default uk-margin-medium-bottom uk-overflow-auto">
                    <div class="row">
                      <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <h2>{{ $item->title }}</h2>
                        <p>{!! Str::limit($item->description,150,'..') !!}</p>
                      </div>
                      <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <img src="{{ url('home/images/process2.png')}}" alt="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
             @endforeach


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  

  
@endsection
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/uikit@3.4.2/dist/css/uikit.min.css">
@endpush
@push('scripts')

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
@endpush