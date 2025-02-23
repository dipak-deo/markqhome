@extends('admin.master')
@section('title','Update Profile')
@section('page_title','Update Profile')
@section('body')
@php 
$data = Auth::user();
@endphp
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Update Profile</h4>
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
    </div>
    <div class="col-md-8 m-auto">
        <div class="panel-body text-dark">
            <div class="container">
                @include('message.message')
             <form action="{{ route('admin.profile.submit') }}" method="POST"  class="form-horizontal" enctype="multipart/form-data">
                 @csrf
                 <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">First Name</label>
                            <input type="text" class="form-control" name="first_name" value="{{ $data->first_name }}">
                            @error('first_name')<p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Last Name</label>
                            <input type="text" class="form-control" name="last_name" value="{{ $data->last_name }}">
                            @error('last_name')<p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{ $data->phone }}">
                            @error('phone')<p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Address</label>
                            <input type="text" class="form-control" name="address" value="{{ $data->address }}">
                            @error('address')<p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Date of Birth</label>
                            <input type="date" class="form-control" name="date_of_birth" value="{{ $data->date_of_birth }}">
                            @error('date_of_birth')<p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                       
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Image</label>
                            <input type="file" class="form-control" name="image">
                            @error('site_title')<p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                        @if($data->image)
                        <img src="{{ url($data->image) }}" alt="" width="120px">
                        @else 
                        <img src="{{ url('no_image.jpg') }}" alt="" width="120px">
                        @endif
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-danger btn-sm my-2" type="submit">Update</button>
                        </div>
                    </div>
                 </div>
             </form>
             </div>
         </div>
    </div>
</div>
@endsection