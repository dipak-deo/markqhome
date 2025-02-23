@extends('admin.master')
@section('title','support - view')
@section('page_title','support viewed')
@section('body')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Request From : {{ $data->user->first_name }}  {{ $data->user->last_name }}</h4>
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
            <form action="{{ route('support.update',$data->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="col-form-label form-label">Title</label>
                                    <input type="text" name="title" class="form-control" value="{{ $data->title}}" disabled>
                                    @error('title') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                               
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="col-form-label form-label"> Description</label>
                                    <textarea name="" id="" cols="30" rows="10" class="form-control" disabled>{{ $data->description }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="col-form-label form-label">Reply</label>
                                    <textarea name="content" id="" cols="30" rows="10" class="summernote form-control">{{ old('content') }}</textarea>
                                    @error('content') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="col-form-label form-label"> File</label>
                                    <br>
                                    <a href="" class="btn btn-success">click for view file</a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="col-form-label form-label"> status</label>
                                    <select name="status" id="" class="form-select">
                                        <option value="closed">closed</option>
                                        <option value="active">active</option>
                                    </select>
                                    @error('image') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="col-form-label form-label">Prority</label>
                                    <input type="text" name="title" class="form-control" value="{{ $data->priority}}" disabled>
                                    @error('title') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="col-form-label form-label"> Remarks</label>
                                    <textarea name="remarks" id="" cols="30" rows="10" class="form-control">{{ $data->remarks }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group my-2">
                                    <button name="is_viewed" value="1" class="btn btn-danger btn-sm" type="submit">Mark as Viewed</button>
                                    {{-- <button name="status" value="draft" class="btn btn-info btn-sm" type="submit">draft</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                  
                  
                  
                   
                   
                    
                    
                   
                </div>
            </form>
        </div>
    </div>
</div>

@endsection