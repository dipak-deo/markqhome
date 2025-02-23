@livewire('brands')
<footer>
    <div class="top-footer">
      <div class="container">
        <div class="row">
          <div class="col-12 col-sm-12 col-md-6 col-lg-6 top-footer-left border-right">
            @if($settings->logo)
            <img src="{{ url($settings->logo)}}" alt="">
            @endif
            <ul>
              <li><a href="{{ $settings->facebook_link ?? '' }}"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="{{ $settings->twitter_link ?? '' }}"><i class="fa-brands fa-square-x-twitter"></i></a></li>
              <li><a href="{{ $settings->linkedi_in_link ?? '' }}"><i class="fab fa-linkedin-in"></i></a></li>
              <li><a href="{{ $settings->youtube_link ?? '' }}"><i class="fab fa-youtube"></i></a></li>
            </ul>
          </div>
          @foreach(menu('footer') as $footer)
          @foreach($footer->menublock as $fm)
          <div class="col-12 col-sm-12 col-md-2 col-lg-2 top-footer-right border-right">
            <h4>{{ $fm->block_title }}</h4>
            <ul>
              @if($fm->items !=NULL)
              @foreach(json_decode($fm->items) as $items)
              <li><a href="{{ permalink($items->type,$items->id,$items->slug) }}">{{ $items->title }}</a></li>
              @endforeach
              @endif
            </ul>
          </div>
          @endforeach
          @endforeach
          {{-- <div class="col-12 col-sm-12 col-md-2 col-lg-2 top-footer-right border-right">
            <h4>Resources</h4>
            <ul>
              <li><a href="#">Blog</a></li>
              <li><a href="#">FAQs</a></li>
              <li><a href="#">Contact Us</a></li>
            </ul>
          </div>
          <div class="col-12 col-sm-12 col-md-2 col-lg-2 top-footer-right">
            <h4>Legal</h4>
            <ul>
              <li><a href="#">Terms & Conditions</a></li>
              <li><a href="#">Sitemap</a></li>
              <li><a href="#">Privacy Policy</a></li>
            </ul>
          </div> --}}
        </div>
      </div>
    </div>
    <div class="mid-footer">
      <div class="container">
        <div class="row">
          <div class="col-12 col-sm-12 col-dm-6 col-lg-6 mid-footer-left">
            <h6>Contact us</h6>
            <p>{{ $settings->email }}</p>
            <h4>{{ $settings->phone }}</h4>
            <h6>Address</h6>
            <p>{{ $settings->address }}</p>
          </div>
          <div class="col-12 col-sm-12 col-dm-6 col-lg-6 mid-footer-right">
            <h4>Get early access to new designs and offers</h4>
            <p>Stay up-to-date with the latest trends in housing and receive exclusive tips and insights by subscribing to our newsletter.</p>
            <div class="content">
              <div class="input-group">
               <input type="email" class="form-control" placeholder="Enter your email">
               <span class="input-group-btn">
               <button class="btn" type="submit">Subscribe</button>
               </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bottom-footer">
      <div class="container">
        <div class="row">
          <div class="col-12 col-sm-12 col-md-6 col-lg-6 bottom-footer-left">
            <p>{{ $settings->site_title }} © Copyright {{ date('Y') }}. All rights reserved</p>
          </div>
          <div class="col-12 col-sm-12 col-md-6 col-lg-6 bottom-footer-right">
            <p><a href="#">Accessibility</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  
  
  <div class="scroll-top-wrapper show">
    <span class="scroll-top-inner">
      <i class="fa fa-angle-up"></i>
      <h5>TOP</h5>
    </span>
  </div>