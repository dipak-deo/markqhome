@extends('home.master')
@section('title',$page_detail->title)
@section('body')

<div class="blog-detail-section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12">
          @if($page_detail->image !=NULL)
          <img class="blog-details-img" src="{{ url($page_detail->image) }}">
          @endif
          <h2>{{ $page_detail->title }}</h2>
          {{-- <ul>
            <li><a href="#"><img src="./images/admin.jpeg" alt=""> John Doe</a></li>
            <li><a href="#"><i class="fa fa-clock"></i> Nov 24, 2024</a></li>
            <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
          </ul> --}}
          {!! $page_detail->content !!}
        </div>
      </div>
    </div>
  </div>
@endsection