<div>
    <div class="ready-section">
        <div class="container">
          <div class="row">
            <div class="col-12 col-sm-12 colmd-6 col-lg-6">
              <h5 class="pack-box1">Home Package</h5>
              <h3>Ready-built <span>homes</span></h3>
              <p>Discover our range of home solutions. Choose from beautifully designed display homes, ready-built homes for immediate purchase, or perfect house and land packages. Experience exceptional quality and personalized service that sets us apart.</p>
            </div>
            <div class="col-12 col-sm-12 colmd-6 col-lg-6">
              <a href="#" class="btn btn-view">Read all <i class="fa fa-arrow-right"></i></a>
            </div>
            <div class="col-12 col-sm-12 ready-item owl-carousel">
              @foreach($peroperty as $data)
              <div class="ready-box">
                <a href="{{ route('home.detail',['id'=>$data->id,'slug'=>$data->slug,'&type=property-details']) }}"><img src="{{ $data->image() }}" alt=""></a>
                <h4><a href="{{ route('home.detail',['id'=>$data->id,'slug'=>$data->slug,'&type=property-details']) }}">{{ $data->title }}</a></h4>
                <h6>{{ $data->price }}</h6>
                <p>Designed to fit effortlessly on a blocks without compromising on your wish list.</p>
                <ul>
                  @foreach(get_item_category($data->id,'PropertyMeta','property_id') as $cat)
                @if($cat->meta_key == 'category_id')
                <li><a href="#">{{ get_data_by_id($cat->meta_value,'PropertyCategory')->title }}</a></li>
                @endif
                @endforeach
                </ul>
                <a href="{{ route('home.detail',['id'=>$data->id,'slug'=>$data->slug,'&type=property-details']) }}" class="project">View <i class="fa fa-angle-right"></i></a>
              </div>
             @endforeach

            </div>
          </div>
        </div>
      </div>
</div>
