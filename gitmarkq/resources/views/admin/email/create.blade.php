@extends('admin.master')
@section('title','email-template')
@section('page_title','Email Template create')
@section('body')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Email Template create</h4>
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
            <form action="{{ route('email_template.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-9 m-auto">
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Email Type</label>
                           <select name="type" id="" class="form-select">
                            <option value="">Select One</option>
                            <option value="default">Default</option>
                            <option value="registration">Registration</option>
                            <option value="award-registration">Award Registration</option>
                            <option value="nomination">Award Nomination</option>
                           </select>
                            @error('type') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                       
                    </div>
                    <div class="col-md-9 m-auto">
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Template Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                       
                    </div>
                    <div class="col-md-9 m-auto">
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Subject</label>
                            <input type="text" name="subject" class="form-control" value="{{ old('subject') }}">
                            @error('subject') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                       
                    </div>
                    <div class="col-md-9 m-auto">
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Message</label>
                            {{-- summernote --}}
                            <textarea name="message" id="" cols="30" rows="40" class=" form-control">{{ old('message') }}</textarea>
                            @error('message') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="col-md-9 m-auto">
                        <div class="form-group my-2">
                            <button name="status" value="draft" class="btn btn-danger btn-sm" type="save">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection