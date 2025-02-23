<div>
    <div class="testimonials">
        <div class="container">
          <div class="row">
            <div class="col-12 col-sm-12">
              <h5>Testimonials</h5>
              <h4>Hear from our <span>Amazing Clients</span></h4>
              <p class="testi-content">Discover what our clients have to say about their experience working with us</p>
            </div>
            <div class="col-12 col-sm-12 testi-item owl-carousel">
              @foreach($test as $data)
              <div class="testi-box">
                @for($i = 1; $i< $data->rating; $i++)
                <i class="fa fa-star"></i>
                @endfor
                {!! $data->description !!}
                <div class="testi-bottom-img">
                  <div class="testi-bottom-left">
                    <img src="{{ $data->image() }}" alt="">
                    <h6>{{ $data->name }} <span>{{ $data->post }}</span></h6>
                  </div>
                  <div class="testi-bottom-right">
                    <img src="{{ $data->company_logo() }}" alt="">
                  </div>
                </div>
              </div>
              @endforeach
             
            </div>
          </div>
        </div>
      </div>
</div>
