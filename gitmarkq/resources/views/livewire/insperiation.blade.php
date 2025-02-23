<div>
    <div class="explore-section">
        <div class="container">
          <div class="row">
            <div class="col-12 col-sm-12">
              <h5>Inspirations</h5>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
              <h2>Design <span>Inspirations</span> for every part of your home</h2>
              <p class="explore-content">Explore curated design ideas to transform any space in your home with style and functionality.</p>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
              <a href="{{ get_permalink('category','inspirations','multiple') }}" class="btn btn-view">Explore <i class="fa fa-arrow-right"></i></a>
            </div>
            @foreach($blogs as $data)
            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
              <a href="{{ route('home.detail',['id'=>$data->id,'slug'=>$data->slug,'type=post']) }}"><img src="{{ $data->image() }}" alt=""></a>
              <h3><a href="{{ route('home.detail',['id'=>$data->id,'slug'=>$data->slug,'type=post']) }}">{{ $data->title }}</a></h3>
              <p>{!! Str::limit($data->description,100,'..') !!}</p>
              <ul>
                {{-- <li><a href="#">Collection</a></li>
                <li><a href="#">Luxury</a></li>
                <li><a href="#">Comfort</a></li> --}}
                @foreach(get_item_category($data->id,'PostMeta','post_id') as $cat)
                @if($cat->meta_key == 'category_id')
                <li><a href="{{ route('home.detail',['id'=>$data->id,'slug'=>$data->slug,'type=post']) }}">{{ get_data_by_id($cat->meta_value,'Category')->title }}</a></li>
                @endif
                @endforeach
              </ul>
              <a href="{{ route('home.detail',['id'=>$data->id,'slug'=>$data->slug,'type=post']) }}" class="project">View project <i class="fa fa-angle-right"></i></a>
            </div>
            @endforeach
          
          </div>
        </div>
      </div>
</div>
