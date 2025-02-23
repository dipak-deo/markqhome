<div>
    <div class="explore-section">
        <div class="container">
          <div class="row">
            <div class="col-12 col-sm-12">
              <h5 class="pack-box1">Blogs & Stories</h5>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
              <h2>Ideas, tips, and industry <span>Updates</span></h2>
              <p class="explore-content">Discover expert advice, innovative ideas, and the latest industry trends to inspire your home journey.</p>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
              <a href="{{ get_permalink('category','blog','multiple') }}" class="btn btn-view">Read all <i class="fa fa-arrow-right"></i></a>
            </div>
            @foreach($blogs as $data)
            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
              <a href="{{ route('home.detail',['id'=>$data->id,'slug'=>$data->slug,'type=post']) }}"><img src="{{ $data->image() }}" alt=""></a>
              <p><a href="#">Category</a> - {{ $data->created_at->format('M d, Y') }}</p>
              <h3><a href="{{ route('home.detail',['id'=>$data->id,'slug'=>$data->slug,'type=post']) }}">{{ $data->title }}</a></h3>
              <p>We offer a comprehensive range of home designs and a dedicated in-house design service to ensure that every aspect of your dream home.</p>
              <a href="{{ route('home.detail',['id'=>$data->id,'slug'=>$data->slug,'type=post']) }}" class="project">View <i class="fa fa-angle-right"></i></a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
</div>
