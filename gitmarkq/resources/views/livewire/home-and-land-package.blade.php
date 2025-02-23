<div>
    <div class="explore-section">
        <div class="container">
          <div class="row">
            <div class="col-12 col-sm-12">
              <h5 class="pack-box">House & Land Packages</h5>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
              <h2>Display <span>homes</span>, Ready-built homes</h2>
              <p class="explore-content">Discover our range of home solutions. Choose from beautifully designed display homes, ready-built homes for immediate purchase, or perfect house and land packages. Experience exceptional quality and personalized service that sets us apart.</p>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
              <a href="{{ get_permalink('property_types','home-land','multiple') }}" class="btn btn-view">View all <i class="fa fa-arrow-right"></i></a>
            </div>
            @foreach($peroperty as $data)
            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
              <a href="{{ route('home.detail',['id'=>$data->id,'slug'=>$data->slug,'&type=property-details']) }}"><img src="{{ $data->image() }}" alt=""></a>
              <h3><a href="{{ route('home.detail',['id'=>$data->id,'slug'=>$data->slug,'&type=property-details']) }}">{{ $data->title }}</a></h3>
              <h6>$920,000</h6>
              <p>Designed to fit effortlessly on a blocks without compromising on your wish list.</p>
              <ul>
                @foreach(get_item_category($data->id,'PropertyMeta','property_id') as $cat)
                @if($cat->meta_key == 'category_id')
                <li><a href="#">{{ get_data_by_id($cat->meta_value,'PropertyCategory')->title }}</a></li>
                @endif
                @endforeach
                {{-- <li><a href="#">Collection</a></li> --}}
               
              </ul>
              <a href="{{ route('home.detail',['id'=>$data->id,'slug'=>$data->slug,'&type=property-details']) }}" class="project">View <i class="fa fa-angle-right"></i></a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
</div>
