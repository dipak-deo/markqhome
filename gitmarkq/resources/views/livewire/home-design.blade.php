<div>
    <div class="explore-section">
        <div class="container">
          <div class="row">
            <div class="col-12 col-sm-12">
              <h5>Home Designs</h5>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
              <h2>Explore <span>Our Collections</span></h2>
              <p class="explore-content">Discover our diverse home design collections, each one tailored to suit your unique tastes and preferences. With a focus on quality and individuality, we offer the perfect home design for every homeowner.</p>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
              <a href="{{ get_permalink('property_types','design-collection','multiple') }}" class="btn btn-view">View all <i class="fa fa-arrow-right"></i></a>
            </div>
            @foreach($design as $data)
            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
              <a href="{{ route('home.detail',['id'=>$data->id,'slug'=>$data->slug,'&type=property-details']) }}"><img src="{{ $data->image() }}" alt=""></a>
              <h3><a href="{{ route('home.detail',['id'=>$data->id,'slug'=>$data->slug,'&type=property-details']) }}">{{ $data->title }}</a></h3>
              <p>{!! Str::limit($data->description,100,'...') !!}</p>
              <ul>
                @foreach(get_item_category($data->id,'PropertyMeta','property_id') as $cat)
                @if($cat->meta_key == 'category_id')
                <li><a href="#">{{ get_data_by_id($cat->meta_value,'PropertyCategory')->title }}</a></li>
                @endif
                @endforeach
              </ul>
              <a href="{{ route('home.detail',['id'=>$data->id,'slug'=>$data->slug,'&type=property-details']) }}" class="project">View project <i class="fa fa-angle-right"></i></a>
            </div>
            @endforeach
           
          </div>
        </div>
      </div>
</div>
