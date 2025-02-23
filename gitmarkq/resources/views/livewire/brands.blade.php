<div>
    <div class="dream-section">
        <div class="container">
          <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
              <h3>Start building <span>Your Dream Home,</span> where your Family’s Happiness at it’s heart.</h3>
              <p>With years of experience, MARKQ Homes is Sydney's trusted builder of custom luxury homes designed for your lifestyle. Contact us today to schedule a consultation and discuss your luxury custom home.</p>
              <a href="{{ route('home.build-quits.start') }}" class="btn btn-get">Get Free Quote <i class="fa fa-arrow-right"></i></a>
              <a href="{{ url('?page=contact') }}" class="btn btn-inquires">Inquire Now <i class="fa fa-phone-volume"></i></a>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
              
            </div>
            <div class="col-12 col-sm-12">
              <ul>
                @foreach($brands as $data)
                <li><a href="#"><img src="{{ $data->image }}" alt=""></a></li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
      
</div>
