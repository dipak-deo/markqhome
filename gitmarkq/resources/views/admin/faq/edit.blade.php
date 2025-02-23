@extends('admin.master')
@section('title','faq-create')
@section('page_title','faq create')
@section('body')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">faq Update</h4>
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
            <form action="{{ route('faq.update',$data->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-9 m-auto">
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Question</label>
                            <input type="text" name="question" class="form-control" value="{{$data->question }}">
                            @error('question') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                       
                    </div>
                    {{-- <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="col-form-label form-label"> Feature Image</label>
                            <input type="file" name="image" id="" class="form-control">
                            @error('image') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                    </div> --}}
                    <div class="col-md-9 m-auto">
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Answer</label>
                            <textarea name="answer" id="" cols="30" rows="10" class="summernote form-control">{{ $data->answer}}</textarea>
                            @error('answer') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="col-md-9 m-auto">
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