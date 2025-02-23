@extends('admin.master')
@section('title','create protected page')
@section('page_title','create protected page')
@section('body')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">create protected page</h4>
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

        <div class="panel-body text-dark">
            <div id="dropzone">
                <form action="{{ route('page_protection.store') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="col-form-label form-label">Select Page <span class="text-danger">*</span></label>
                               <select name="protected_id" id="" class="form-select">
                                <option value="">Select Page</option>
                                @foreach(all_page() as $page)
                                <option value="{{$page->id}}"> {{ $page->title }} </option>
                                @endforeach
                               </select>
                                @error('protected_id') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <button class="btn btn-danger btn-sm my-2" type="submit">create</button>
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

