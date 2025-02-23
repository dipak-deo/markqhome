@extends('admin.master')
@section('title','category-update')
@section('page_title','category update')
@section('body')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Category Create</h4>
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
            <form action="{{ route('category.update',$data->id) }}" method="POST" class="form-horizontal">
                @csrf
                <div class="row">
                    <div class="col-md-6 m-auto">
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Category Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $data->name }}">
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Slug</label>
                            <input type="text" name="" class="form-control" value="{{ $data->slug }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Category Label</label>
                            <select name="category_level" id="" class="form-select">
                                @if($data->category_level == 0)
                                <option value="0" selected>first</option>
                                <option value="1">Second</option>
                                <option value="2">Third</option>
                                @elseif($data->category_level == 1)
                                <option value="0" >first</option>
                                <option value="1"selected>Second</option>
                                <option value="2">Third</option>
                                @elseif($data->category_level == 2)
                                <option value="0" >first</option>
                                <option value="1">Second</option>
                                <option value="2" selected>Third</option>
                                @else
                                <option value="0" selected>first</option>
                                <option value="1">Second</option>
                                <option value="2">Third</option>
                                @endif
                               
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Parent Category</label>
                            <select name="parent_id" id="" class="form-select">
                                @foreach(categoryAll() as $cat_items)
                                @if($cat_items->id !== $data->id)
                                @if($cat_items->id == $data->parent_id)
                                <option value="{{ $cat_items->id }}" selected>{{ $cat_items->name }}</option>
                                @else 
                                <option value="{{ $cat_items->id }}">{{ $cat_items->name }}</option>
                                @endif
                                @else
                                <option value="0">Main Category</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <button class="btn btn-danger btn-sm" type="submit" name="status" value="publish">publish</button>
                            <button class="btn btn-success btn-sm" type="submit" name="status" value="draft">draft</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection