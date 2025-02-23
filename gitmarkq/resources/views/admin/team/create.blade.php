@extends('admin.master')
@section('title','team-create')
@section('page_title','team create')
@section('body')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">team Create</h4>
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
            <form action="{{ route('team.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 m-auto">
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Team Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Image</label>
                            <input type="file" name="image" class="form-control" value="">
                            @error('image') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Team Category</label>
                            <select name="team_category_id" id="" class="form-control">
                                <option value="">Select one</option>
                                @foreach(team_category() as $team_cat)
                                <option value="{{ $team_cat->id }}">{{ $team_cat->name ?? 'N/A' }}</option>
                                @endforeach
                            </select>
                            @error('team_category_id') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Post</label>
                            <input type="text" name="post" class="form-control" value="{{ old('post') }}">
                            @error('post') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Short Description</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ old('description') }}</textarea>
                            @error('description') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                        
                        <div class="form-group mt-2">
                            <button class="btn btn-info btn-sm" type="submit" value="publish" name="status">publish</button>
                            <button class="btn btn-danger btn-sm" type="submit" value="draft" name="status">draft</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection