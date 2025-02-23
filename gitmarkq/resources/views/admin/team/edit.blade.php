@extends('admin.master')
@section('title','team-edit')
@section('page_title','team edit')
@section('body')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">team edit</h4>
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
            <form action="{{ route('team.update',$data->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 m-auto">
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Team Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $data->name }}">
                            @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                        @if($data->image)
                        <img src="{{ url($data->image) }}" alt="" width="120px">
                        @else 
                        <img src="{{ url('no_image.jpg') }}" alt="" width="120px">
                        @endif
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Image</label>
                            <input type="file" name="image" class="form-control" value="">
                            @error('image') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Team Category</label>
                            <select name="team_category_id" id="" class="form-control">
                                @foreach(team_category() as $team_cat)
                                @if($team_cat->id == $data->team_category_id)
                                <option value="{{ $team_cat->id }}" selected>{{ $team_cat->name ?? 'N/A' }}</option>
                                @else
                                <option value="{{ $team_cat->id }}">{{ $team_cat->name ?? 'N/A' }}</option>
                                @endif
                                @endforeach
                                
                               
                            </select>
                            @error('team_category_id') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Post</label>
                            <input type="text" name="post" class="form-control" value="{{ $data->post }}">
                            @error('post') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Category Label</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $data->description }}</textarea>
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