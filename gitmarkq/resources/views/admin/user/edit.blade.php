@extends('admin.master')
@section('title','Edit-create')
@section('page_title','Edit create')
@section('body')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">User Create</h4>
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
        <div class="panel-body">
            <div class="row">
                <div class="col-md-10 m-auto">
                    @if($data->image == NULL)
                    <img src="{{ url('no_image.png') }}" alt="" class="my-3" width="150px">
                    @else 
                    <img src="{{ url($data->image) }}" alt="" class="my-3" width="150px">
                    @endif
                    @include('message.message')
                    <form action="{{ route('user.update',$data->id) }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="col-form-label form-label">First Name <span class="text-danger">*</span></label>
                                    <input type="text" name="first_name" class="form-control" value="{{ $data->first_name }}">
                                    @error('first_name') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="col-form-label form-label">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" name="last_name" class="form-control" value="{{ $data->last_name }}">
                                    @error('last_name') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="col-form-label form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control" value="{{ $data->email }}">
                                    @error('email') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="col-form-label form-label">Phone <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" class="form-control" value="{{ $data->phone }}">
                                    @error('phone') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="col-form-label form-label">Address</label>
                                    <input type="text" name="address" class="form-control" value="{{ $data->address }}">
                                    @error('address') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="col-form-label form-label">Image <span class="text-danger">*</span></label>
                                    <input type="file" name="image" class="form-control">
                                    @error('image') <p class="text-danger">{{ $message }}</p> @enderror
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="col-form-label form-label">Is Block <span class="text-danger">*</span></label>
                                    <select name="is_blocked" id="" class="form-select">
                                        <option value="0" selected>No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                    @error('is_blocked') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="col-form-label form-label">User Role <span class="text-danger">*</span></label>
                                    <select name="user_type" id="" class="form-select">
                                        <option value="user" {{ ($data->user_type == 'user')? 'selected':'' }}>User</option>
                                        <option value="admin" {{ ($data->user_type == 'admin')? 'selected':'' }}>Admin</option>
                                        <option value="super_admin" {{ ($data->user_type == 'super_admin')? 'selected':'' }}>Super Admin</option>
                                    </select>
                                    @error('user_type') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mt-2">
                                    <button class="btn btn-danger btn-sm" type="submit">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection