@extends('admin.master')
@section('title','Edit Home Section')
@section('page_title','Edit Home Section')
@section('body')

<div class="row">
    <div class="col-md-12">
        @include('message.message')
    </div>
    <div class="col-md-12">
        <div class="panel panel-inverse">

            <div class="panel-heading">
                <h4 class="panel-title">Table - Home Section</h4>
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


            <div class="panel-body">
              <form action="{{ route('admin.home.section.update',$slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    @foreach($fields as $field)
                    {{-- @php(dd($field)) --}}
                    @if($field['type'] != 'textaria')
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">{{ $field['label'] }}</label>
                            <input type="{{ $field['type'] }}" class="form-control" name="{{ $field['name'] }}" value="{{ $data[$field['name']] ?? $field['value'] }}" {{ ($field['required'] == true)? 'required':'' }}>
                        </div>
                    </div>
                    @else 
                    <div class="col-md-6">
                        <label for="" class="col-form-label form-label">{{ $field['label'] }}</label>
                        <textarea name="{{ $field['name'] }}" id="" cols="30" rows="10" class="form-control">{{ $data[$field['name']] ?? $field['value'] }}</textarea>
                    </div>
                    @endif
                    @endforeach

                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger btn-sm mt-2">Submit</button>
                        </div>
                    </div>
                </div>
              </form>
            </div>


            <div class="hljs-wrapper">
                <pre><code class="html" data-url="{{url('admin/data/table-manage/default.json')}}"></code></pre>
            </div>

        </div>
    </div>
</div>

@endsection