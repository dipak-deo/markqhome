@extends('admin.master')
@section('title','site-settings')
@section('page_title','Site settings')
@section('body')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Site Settings</h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i
                            class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i
                            class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i
                            class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i
                            class="fa fa-times"></i></a>
                </div>
            </div>
        </div>
        <div class="panel-body text-dark">
           <div class="container">
            @include('message.message')
                <form action="{{ route('site.setting') }}" method="POST"  class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="col-form-label form-label">Site Name</label>
                                <input type="text" class="form-control" name="site_title" value="{{ $result['site_title'] ?? old('site_title') }}">
                                @error('site_title')<p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="col-form-label form-label">Site Tagline</label>
                                <input type="text" class="form-control" name="tagline" value="{{ $result['tagline'] ?? old('tagline') }}">
                                @error('tagline')<p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                           
                            <div class="form-group">
                                <label for="" class="col-form-label form-label">Logo</label>       
                                <input type="file" class="form-control" name="logo" >
                                @error('logo')<p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            @if(isset($result['logo']))
                            <img src="{{ url($result['logo'])}}" width="200px" class="mt-2">
                            @else 
                            <img src="{{ url('no_image.jpg') }}" alt="" width="200px" class="mt-2">
                            @endif
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="col-form-label form-label">Fabicon</label>
                                <input type="file" class="form-control" name="fabicon">
                                @error('fabicon')<p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            @if(isset($result['fabicon']))
                            <img src="{{ url($result['fabicon'])}}" width="200px" class="mt-2">
                            @else 
                            <img src="{{ url('no_image.jpg') }}" alt="" width="200px" class="mt-2">
                            @endif
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="col-form-label form-label">Administrative Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $result['email'] ?? old('email') }}">
                                @error('email')<p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="col-form-label form-label">Administrative Phone</label>
                                <input type="text" class="form-control" name="phone" value="{{ $result['phone'] ?? old('phone') }}">
                                @error('phone')<p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="col-form-label form-label">Administrative Address</label>
                                <input type="text" class="form-control" name="address" value="{{ $result['address'] ?? old('address') }}">
                                @error('address')<p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="col-form-label form-label">Registration Number</label>
                                <input type="text" class="form-control" name="registration_number" value="{{ $result['registration_number'] ?? old('registration_number') }}">
                                @error('registration_number')<p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="col-form-label form-label">Maintenence Mode</label>
                                <select name="maintenence_mode" id="" class="form-select"> 
                                    @if($result['maintenence_mode'] == 0)
                                    <option value="0" selected>No</option>
                                    <option value="1">Yes</option>
                                    @else 
                                    <option value="0">No</option>
                                    <option value="1" selected>Yes</option>
                                    @endif
                                    
                                </select>
                                @error('maintenence_mode')<p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>

                   
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="col-form-label form-label">Facebook Link</label>
                                <input type="text" class="form-control" name="facebook_link" value="{{ $result['facebook_link'] ?? old('facebook_link') }}">
                                @error('facebook_link')<p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="col-form-label form-label">Youtube Link</label>
                                <input type="text" class="form-control" name="youtube_link" value="{{ $result['youtube_link'] ?? old('youtube_link') }}">
                                @error('youtube_link')<p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="col-form-label form-label">Instagram Link</label>
                                <input type="text" class="form-control" name="instagram_link" value="{{ $result['instagram_link'] ?? old('instagram_link') }}">
                                @error('instagram_link')<p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="col-form-label form-label">Twitter Link</label>
                                <input type="text" class="form-control" name="twitter_link" value="{{ $result['twitter_link'] ?? old('twitter_link') }}">
                                @error('twitter_link')<p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="col-form-label form-label">Whats App</label>
                                <input type="text" class="form-control" name="whats_app_link" value="{{ $result['whats_app_link'] ?? old('whats_app_link') }}">
                                @error('whats_app_link')<p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                      
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="col-form-label form-label">About Us</label>
                                <select name="about_us" id="" class="form-select"> 
                                    @if(isset($result['about_us']))
                                    <option value="{{ $result['about_us'] }}" selected>{{ page_detail($result['about_us'])->title }}</option>
                                    @foreach(all_page() as $page)
                                    <option value="{{ $page->id }}">{{ $page->title }}</option>
                                    @endforeach
                                    @else 
                                    @foreach(all_page() as $page)
                                    <option value="{{ $page->id }}">{{ $page->title }}</option>
                                    @endforeach
                                    @endif
                                    
                                </select>
                                @error('about_us')<p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="col-form-label form-label">Terms Of Use</label>
                                <select name="terms_of_use" id="" class="form-select"> 
                                    @if(isset($result['terms_of_use']))
                                    <option value="{{ $result['terms_of_use'] }}" selected>{{ page_detail($result['terms_of_use'])->title }}</option>
                                    @foreach(all_page() as $page)
                                    <option value="{{ $page->id }}">{{ $page->title }}</option>
                                    @endforeach
                                    @else 
                                    @foreach(all_page() as $page)
                                    <option value="{{ $page->id }}">{{ $page->title }}</option>
                                    @endforeach
                                    @endif
                                    
                                </select>
                                @error('terms_of_use')<p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="col-form-label form-label">Pravicy Polecy</label>
                                <select name="pravicy_polecy" id="" class="form-select"> 
                                    @if(isset($result['pravicy_polecy']))
                                    <option value="{{ $result['pravicy_polecy'] }}" selected>{{ page_detail($result['pravicy_polecy'])->title }}</option>
                                    @foreach(all_page() as $page)
                                    <option value="{{ $page->id }}">{{ $page->title }}</option>
                                    @endforeach
                                    @else 
                                    @foreach(all_page() as $page)
                                    <option value="{{ $page->id }}">{{ $page->title }}</option>
                                    @endforeach
                                    @endif
                                    
                                </select>
                                @error('pravicy_polecy')<p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group my-2">
                                <button type="submit" class="btn btn-danger btn-sm">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
           </div>
        </div>
    </div>
</div>

@endsection