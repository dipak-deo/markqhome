@extends('admin.master')
@section('title','post-create')
@section('page_title','post create')
@section('body')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">post Create</h4>
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
            @include('message.message')
            <form action="{{ route('post.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                       <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="col-form-label form-label">Post Title</label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                                    @error('title') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="col-form-label form-label">Content</label>
                                    <textarea name="description" id="" cols="30" rows="10" class="summernote form-control">{{ old('description') }}</textarea>
                                    @error('description') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                       </div>
                       
                    </div>
                    <div class="col-md-4">
                       <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="col-form-label form-label"> Feature Image</label>
                                    <input type="file" name="image" id="" class="form-control">
                                    @error('image') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="col-form-label form-label"> Select Category</label>
                                    <div class="category-items card p-2">
                                        @foreach(categoryAll() as $category)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="category[]" value="{{ $category->id }}" id="catItems_{{$category->id}}">
                                            <label class="form-check-label" for="catItems_{{$category->id}}">
                                             {{ $category->title }}
                                            </label>
                                          </div>
                                          @endforeach
                                       
                                    </div>
                                    @error('category_id') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="col-form-label form-label"> Fontawosome Icon</label>
                                    <input type="text" name="font_awosome_icon" id="" class="form-control">
                                    @error('font_awosome_icon') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="col-form-label form-label"> Custom Redirect Link</label>
                                    <input type="url" name="custom_redirect_url" id="" class="form-control">
                                    @error('custom_redirect_url') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                       </div>
                    </div>
                  
                  
                    <div class="col-md-12">
                        <div class="form-group my-2">
                            <button name="status" value="publish" class="btn btn-danger btn-sm" type="submit">Publish</button>
                            <button name="status" value="draft" class="btn btn-info btn-sm" type="submit">draft</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection