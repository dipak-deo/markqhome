@extends('home.master')
@section('title',$page_detail->title)
@section('body')

<div class="page-banner">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 page-column">
          <h1>Category <span>{{ $page_detail->title }}</span></h1>
          {{-- <p>Your dream home starts with a feeling. Experience that feeling first-hand – step inside our MarkQ Homes display homes today. Find a MARKQ Homes Display Home near you.</p> --}}
        </div>
      </div>
    </div>
  </div>
  
  <div class="blog-section">
    <div class="container">
      <div class="row">
        @foreach($data as $items)
        <div class="col-12 col-sm-12 col-md-6 col-lg-4">
          <div class="blog">
            <div class="blog-image">
              <img src="{{ $items->image() }}" alt="">
              <div class="date">{{ $items->created_at->format('M d, Y') }}</div>
            </div>
            <div class="blog-content">
              <h2><a href="{{ route('home.detail',['id'=>$items->id,'slug'=>$items->slug,'type=post']) }}">{{ $items->title }}</a></h2>
              <p>{!! Str::limit($items->description, 150, '...') !!}</p>
              <a href="{{ route('home.detail',['id'=>$items->id,'slug'=>$items->slug,'type=post']) }}" class="read-more">Read More</a>
            </div>
          </div>
        </div>
        @endforeach
       
      </div>
    </div>
  </div>
  
  

@endsection