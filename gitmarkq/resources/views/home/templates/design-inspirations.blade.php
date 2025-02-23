<?php
/*
*Template Name: Design & Inspirations
*/

?>

@extends('home.master')
@section('title',$page_detail->title)
@section('body')

<div class="page-banner">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 page-column">
          <h1>{{ $page_detail->title }}</h1>
          <p>Discover the unique and inspiring design concepts that shape MARKQ Homes' creations.</p>
        </div>
      </div>
    </div>
  </div>
  
  <div class="explore-section">
    <div class="container">
      <div class="row">

        @foreach($data as $items)
        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
          <a href="{{ route('home.detail',['id'=>$items->id,'slug'=>$items->slug,'&type=property-details']) }}"><img src="{{ $items->image() }}" alt=""></a>
          <h3><a href="{{ route('home.detail',['id'=>$items->id,'slug'=>$items->slug,'&type=property-details']) }}">{{ $items->title }}</a></h3>
          <p>{!! Str::limit($items->description,150,'..') !!}</p>
          <div class="tabs">
            <div class="tab-button-outer">
              <ul id="tab-button1">
                @foreach($items->get_floorplan as $k=>$fl)
                <li class="{{ ($k==0)? 'is-active':'' }}"><a href="#tab{{$k}}">{{ $fl->area }}</a></li>
                @endforeach
                {{-- <li><a href="#tab02">17</a></li> --}}
              </ul>
            </div>
            <div class="tab-select-outer">
              <select id="tab-select1">
               
                {{-- <option value="#tab01">15</option> --}}
               
                {{-- <option value="#tab02">17</option> --}}
              </select>
            </div>
            
            @foreach($items->get_floorplan as $k=>$fl)
            <div id="tab{{ $k }}" class="tab-contents1" style="{{ ($k==0)? 'display: none;':'display: block;' }}">
              <div class="row">
                <div class="col-12 col-sm-12">
                  <ul>
                    <li><i class="fas fa-bed"></i> {{ $fl->beds }}</li>
                    <li><i class="fas fa-bath"></i> {{ $fl->bath }}</li>
                    <li><i class="fas fa-parking"></i> {{ $fl->garage }}</li>
                    <li>Lot width: {{ $fl->lot_width }}</li>
                  </ul>
                </div>  
              </div>
            </div>
            @endforeach
            {{-- <div id="tab02" class="tab-contents1" style="display: none;">
              <div class="row">
                <div class="col-12 col-sm-12">
                  <ul>
                    <li><i class="fas fa-bed"></i> 2</li>
                    <li><i class="fas fa-bath"></i> 1</li>
                    <li><i class="fas fa-parking"></i> 2</li>
                    <li>Lot width: 7.54m</li>
                  </ul>
                </div>  
              </div>
            </div> --}}
          </div>
          <a href="{{ route('home.detail',['id'=>$items->id,'slug'=>$items->slug,'&type=property-details']) }}" class="project">View project <i class="fa fa-angle-right"></i></a>
        </div>
        @endforeach
        {{-- <div class="col-12 col-sm-12">
          <a href="#" class="btn btn-load">Load More <i class="fa fa-arrow-right"></i></a>
        </div> --}}
      </div>
    </div>
  </div>

@endsection