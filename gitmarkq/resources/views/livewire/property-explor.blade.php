<div>
    <div class="luxury-section">
        <div class="container">
          <div class="row">
            <div class="col-12 col-sm-12">
              <h5>Explore</h5>
            </div>
            <div class="col-12 col-sm-12 col-md-8 col-lg-8">
              <h2><span>Experience</span> our luxury homes in person.</h2>
              <p class="explore-content">We’re excited to welcome you and help you begin your journey to your dream home. </p>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
              <a href="#" class="btn btn-view">See all <i class="fa fa-arrow-right"></i></a>
            </div>
            @foreach($design as $data)
            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
              <div class="luxury-box">
                <img src="{{ url('home/images/align-selection.png')}}" alt="">
                <h6>{{ $data->title }}</h6>
                <p>Sat-Sun . Category</p>
                <ul>
                  <li><i class="fa fa-map-marker-alt"></i> {{ $data->location }}</li>
                  <li><i class="fa fa-phone-volume"></i> {{ $settings->phone }} </li>
                  <li><i class="fa fa-envelope"></i> {{ $settings->email }}</li>
                </ul>
                <a href="{{ route('home.detail',['id'=>$data->id,'slug'=>$data->slug,'&type=property-details']) }}" class="btn btn-appointment">Book an Appointment</a>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
</div>
