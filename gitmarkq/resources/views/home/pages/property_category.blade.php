@extends('home.master')
@section('title',$page_detail->title)
@section('body')

<div class="page-banner">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 page-column">
          <h1>Display <span>{{ $page_detail->title }}</span></h1>
          <p>Your dream home starts with a feeling. Experience that feeling first-hand – step inside our MarkQ Homes display homes today. Find a MARKQ Homes Display Home near you.</p>
        </div>
      </div>
    </div>
  </div>
  
  {{-- <div class="search-section">
    <div class="container">
      <form>
        <div class="row">
          <div class="col-6 col-sm-6 col-md-3 col-lg-3">
            <div class="f-group">
              <label>Price</label>
              <select class="f-control f-dropdown" placeholder="Please choose 2">
                <option value=""> </option>
                <option value="1" selected="selected" data-image="./images/price-icon.png')}}" alt="">$100k-$250k</option>
                <option value="2" data-image="./images/price-icon.png')}}" alt="">$100k-$250k</option>
                <option value="3" data-image="./images/price-icon.png')}}" alt="">$100k-$250k</option>
                <option value="4" data-image="./images/price-icon.png')}}" alt="">$100k-$250k</option>
                <option value="5" data-image="./images/price-icon.png')}}" alt="">$100k-$250k</option>
              </select>
            </div>
          </div>
          <div class="col-6 col-sm-6 col-md-3 col-lg-3">
            <div class="f-group">
              <label>Price</label>
              <select class="f-control f-dropdown" placeholder="Please choose 2">
                <option value=""> </option>
                <option value="1" selected="selected" data-image="./images/price-icon.png')}}" alt="">$100k-$250k</option>
                <option value="2" data-image="./images/price-icon.png')}}" alt="">$100k-$250k</option>
                <option value="3" data-image="./images/price-icon.png')}}" alt="">$100k-$250k</option>
                <option value="4" data-image="./images/price-icon.png')}}" alt="">$100k-$250k</option>
                <option value="5" data-image="./images/price-icon.png')}}" alt="">$100k-$250k</option>
              </select>
            </div>
          </div>
          <div class="col-6 col-sm-6 col-md-3 col-lg-3">
            <div class="f-group">
              <label>Price</label>
              <select class="f-control f-dropdown" placeholder="Please choose 2">
                <option value=""> </option>
                <option value="1" selected="selected" data-image="./images/price-icon.png')}}" alt="">$100k-$250k</option>
                <option value="2" data-image="./images/price-icon.png')}}" alt="">$100k-$250k</option>
                <option value="3" data-image="./images/price-icon.png')}}" alt="">$100k-$250k</option>
                <option value="4" data-image="./images/price-icon.png')}}" alt="">$100k-$250k</option>
                <option value="5" data-image="./images/price-icon.png')}}" alt="">$100k-$250k</option>
              </select>
            </div>
          </div>
          <div class="col-6 col-sm-6 col-md-3 col-lg-3">
            <div class="f-group">
              <label>Price</label>
              <select class="f-control f-dropdown" placeholder="Please choose 2">
                <option value=""> </option>
                <option value="1" selected="selected" data-image="./images/price-icon.png')}}" alt="">$100k-$250k</option>
                <option value="2" data-image="./images/price-icon.png')}}" alt="">$100k-$250k</option>
                <option value="3" data-image="./images/price-icon.png')}}" alt="">$100k-$250k</option>
                <option value="4" data-image="./images/price-icon.png')}}" alt="">$100k-$250k</option>
                <option value="5" data-image="./images/price-icon.png')}}" alt="">$100k-$250k</option>
              </select>
            </div>
          </div>
          <div class="col-12 col-sm-12">
            <hr>
          </div>
          <div class="col-12 col-sm-12 col-md-7 col-lg-7 short-left">

            <p><strong>{{ $data->count() }}</strong> Results found for <strong>‘Single Storyed’</strong></p>
          </div>
          <div class="col-12 col-sm-12 col-md-5 col-lg-5 short-right">
            <select>
              <option>Sort by: <strong>Price High to Low</strong></option> 
              <option>Sort by: <strong>Price High to Low</strong></option> 
              <option>Sort by: <strong>Price High to Low</strong></option> 
              <option>Sort by: <strong>Price High to Low</strong></option> 
              <option>Sort by: <strong>Price High to Low</strong></option> 
              <option>Sort by: <strong>Price High to Low</strong></option> 
            </select>
            <div class="listingHeader">
              <div class="dropdown">
                <div class="dd-a"><span>Advanced Filter <img src="{{ url('home/images/filter.png')}}" alt=""></span></div>
                <input type="checkbox">
                <div class="dd-c">
                  <div class="row">
                    <div class="col-12 col-sm-12">
                      <label>Status</label>
                      <select>
                        <option>All</option>
                        <option>All</option>
                        <option>All</option>
                        <option>All</option>
                        <option>All</option>
                      </select>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                      <div class="f-group">
                        <label>Storeys</label>
                        <select class="f-control f-dropdown" placeholder="Please choose 2">
                          <option value=""> </option>
                          <option value="1" selected="selected" data-image="./images/building-05.png')}}" alt="">Single</option>
                          <option value="2" data-image="./images/building-05.png')}}" alt="">Single</option>
                          <option value="3" data-image="./images/building-05.png')}}" alt="">Single</option>
                          <option value="4" data-image="./images/building-05.png')}}" alt="">Single</option>
                          <option value="5" data-image="./images/building-05.png')}}" alt="">Single</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                      <div class="f-group">
                        <label>Bedrooms</label>
                        <select class="f-control f-dropdown" placeholder="Please choose 2">
                          <option value=""> </option>
                          <option value="1" selected="selected" data-image="./images/bed-single-01.png')}}" alt="">All</option>
                          <option value="2" data-image="./images/bed-single-01.png')}}" alt="">All</option>
                          <option value="3" data-image="./images/bed-single-01.png')}}" alt="">All</option>
                          <option value="4" data-image="./images/bed-single-01.png')}}" alt="">All</option>
                          <option value="5" data-image="./images/bed-single-01.png')}}" alt="">All</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                      <div class="f-group">
                        <label>Bathrooms</label>
                        <select class="f-control f-dropdown" placeholder="Please choose 2">
                          <option value=""> </option>
                          <option value="1" selected="selected" data-image="./images/bathtub-01.png')}}" alt="">All</option>
                          <option value="2" data-image="./images/bathtub-01.png')}}" alt="">All</option>
                          <option value="3" data-image="./images/bathtub-01.png')}}" alt="">All</option>
                          <option value="4" data-image="./images/bathtub-01.png')}}" alt="">All</option>
                          <option value="5" data-image="./images/bathtub-01.png')}}" alt="">All</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                      <div class="f-group">
                        <label>Garages</label>
                        <select class="f-control f-dropdown" placeholder="Please choose 2">
                          <option value=""> </option>
                          <option value="1" selected="selected" data-image="./images/garage.png')}}" alt="">All</option>
                          <option value="2" data-image="./images/garage.png')}}" alt="">All</option>
                          <option value="3" data-image="./images/garage.png')}}" alt="">All</option>
                          <option value="4" data-image="./images/garage.png')}}" alt="">All</option>
                          <option value="5" data-image="./images/garage.png')}}" alt="">All</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                      <div class="f-group">
                        <label>Low-Width</label>
                        <select class="f-control f-dropdown" placeholder="Please choose 2">
                          <option value=""> </option>
                          <option value="1" selected="selected" data-image="./images/align-bottom.png')}}" alt="">All</option>
                          <option value="2" data-image="./images/align-bottom.png')}}" alt="">All</option>
                          <option value="3" data-image="./images/align-bottom.png')}}" alt="">All</option>
                          <option value="4" data-image="./images/align-bottom.png')}}" alt="">All</option>
                          <option value="5" data-image="./images/align-bottom.png')}}" alt="">All</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                      <div class="f-group">
                        <label>Home Size</label>
                        <select class="f-control f-dropdown" placeholder="Please choose 2">
                          <option value=""> </option>
                          <option value="1" selected="selected" data-image="./images/home-icon.png')}}" alt="">All</option>
                          <option value="2" data-image="./images/home-icon.png')}}" alt="">All</option>
                          <option value="3" data-image="./images/home-icon.png')}}" alt="">All</option>
                          <option value="4" data-image="./images/home-icon.png')}}" alt="">All</option>
                          <option value="5" data-image="./images/home-icon.png')}}" alt="">All</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-12 col-sm-12">
                      <hr>
                    </div>
                    <div class="col-12 col-sm-12">
                      <ul>
                        <li><a href="#">Housing <i class="fas fa-times-circle"></i></a></li>
                        <li><a href="#">$100,000 <i class="fas fa-times-circle"></i></a></li>
                        <li><a href="#">Single <i class="fas fa-times-circle"></i></a></li>
                        <li><a href="#">Apollo <i class="fas fa-times-circle"></i></a></li>
                        <li><a href="#">Bathrooms <i class="fas fa-times-circle"></i></a></li>
                        <li><a href="#">Apollo <i class="fas fa-times-circle"></i></a></li>
                        <li><a href="#">Single <i class="fas fa-times-circle"></i></a></li>
                      </ul>
                    </div>
                    <div class="col-12 col-sm-12">
                      <hr>
                    </div>                    
                    <div class="col-12 col-sm-12">
                      <p><strong>12</strong> Results found for <strong>‘Single Storyed’</strong> <a href="#">Clear all</a></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div> --}}
  
  <div class="explore-section">
    <div class="container">
      <div class="row">
        @foreach($data as $items)
        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
          <a href="{{ route('home.detail',['id'=>$items->id,'slug'=>$items->slug,'&type=property-details']) }}"><img src="{{ $items->image() }}" alt=""></a>
          <h3><a href="{{ route('home.detail',['id'=>$items->id,'slug'=>$items->slug,'&type=property-details']) }}">{{ $items->title }}</a></h3>
          <h6>$ {{ $items->price }}</h6>
          <p>{!! Str::limit($items->description,150,'..') !!}</p>
          <ul>
            @foreach(get_item_category($items->id,'PropertyMeta','property_id') as $cat)
            @if($cat->meta_key == 'category_id')
            <li><a href="#">{{ get_data_by_id($cat->meta_value,'PropertyCategory')->title }}</a></li>
            @endif
            @endforeach
            {{-- <li><a href="#">Luxury</a></li>
            <li><a href="#">Comfort</a></li> --}}
          </ul>
          <a href="{{ route('home.detail',['id'=>$items->id,'slug'=>$items->slug,'&type=property-details']) }}" class="project">View <i class="fa fa-angle-right"></i></a>
        </div>
        @endforeach
        <div class="col-12 col-sm-12">
          <a href="#" class="btn btn-load">Load More <i class="fa fa-arrow-right"></i></a>
        </div>
       
      </div>
    </div>
  </div>
  
  @livewire('property-explor')
  
  <div class="visit-section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
          
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
          <h5>Join Marqk Home</h5>
          <h3>Visit our <span>display homes</span></h3>
          <p>Our display homes are open, and we warmly invite you to explore them. Come see the craftsmanship and elegance that define our luxury homes. We look forward to welcoming you and helping you start your journey towards your dream home.</p>
          <h6>What to Expect at Our Display Homes</h6>
          <ul>
            <li><img src="{{ url('home/images/align-selection.png')}}" alt=""> Explore a variety of single-story and multi-level home designs.</li>
            <li><img src="{{ url('home/images/align-selection.png')}}" alt=""> Immerse yourself in luxurious finishes and premium fixtures.</li>
            <li><img src="{{ url('home/images/align-selection.png')}}" alt=""> Consult with our knowledgeable team to discuss customization options.</li>
          </ul>
          <a href="{{ get_permalink('property_types','design-collection','multiple') }}" class="btn btn-viewall">View all <i class="fa fa-arrow-right"></i></a>
        </div>
      </div>
    </div>
  </div>
  

@endsection