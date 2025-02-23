@extends('admin.master')
@section('title','Change Password')
@section('page_title','Change Password')
@section('body')
@php 
$data = Auth::guard('admin')->user();
@endphp
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Change Password</h4>
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
    <div class="col-md-7 m-auto">
        <div class="panel-body text-dark">
            <div class="container">
                @include('message.message')
             <form action="{{ route('admin.change.password.submit') }}" method="POST"  class="form-horizontal" enctype="multipart/form-data">
                 @csrf
                 <div class="row">
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Old Password</label>
                          <input type="password" class="form-control" name="old_password">
                            @error('old_password')<p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">New Password</label>
                            <input type="text" class="form-control" name="password">
                            @error('password')<p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Confirm New Password</label>
                            <input type="text" class="form-control" name="confirm_password">
                            @error('confirm_password')<p class="text-danger">{{ $message }}</p> @enderror
                        </div>
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