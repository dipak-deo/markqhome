@extends('admin.master')
@section('title','page-create')
@section('page_title','page create')
@section('body')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">page Create</h4>
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
            <form action="{{ route('page.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="col-form-label form-label">Page Name <span class="text-danger">*</span></label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                                    @error('title') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="col-form-label form-label">Content</label>
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
                                    <label for="" class="col-form-label form-label"> Feature Image</label>
                                    <input type="file" name="image" id="" class="form-control">
                                    @error('image') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="col-form-label form-label">Page Template</label>
                                    <select name="page_template" id="page_template" class="form-select">
                                        @foreach(config('register')['page-template'] as $template)
                                        <option value="{{ $template['slug'] }}" {{ ($template['slug'] == 'default')? 'selected':'' }}>{{ $template['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12" id="data_type"></div>
                            <div class="col-md-12" id="data_cat"></div>
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
@push('scripts')
<script>
    $(document).ready(function(){
        $("#page_template").on('change',function(){
            var selectedtemplate = $(this).val();
            if(selectedtemplate != "default" && selectedtemplate != "template-faqs"){
                var detatype = '<div class="col-md-12">'+
                                '<div class="form-group">'+
                                    '<label for="" class="col-form-label form-label">Date Type</label>'+
                                    '<select name="data_types" id="get_datatype_cat" class="form-select" required>'+
                                        '<option value="">Select One</option>'+
                                        '<option value="category">Category</option>'+
                                        '<option value="property_category">Property Category</option>'+
                                    '</select>'+
                                '</div>'+
                            '</div>';
                $('#data_type').empty();  
                $('#data_cat').empty();                     
                $('#data_type').append(detatype);
            }else{
                $('#data_cat').empty();
                $('#data_type').empty();
            }
        });

        $(document).on('change','#get_datatype_cat',function(){
            var selectValue = $(this).val();
            // alert(true);
            $.ajax({
                url: "{{ route('page.get.template.cat') }}",
                type: "GET",
                data: { data_type:selectValue },
                success: function(result){
                    if(result){
                        var category_Items = '<div class="col-md-12">'+
                                '<div class="form-group">'+
                                    '<label for="" class="col-form-label form-label">Date Category</label>'+
                                    '<select name="category_slug" id="category_slug" class="form-select" required>';
                                        
                                   
                        $.each(result,function(index,value){
                            category_Items +='<option value="'+value.slug+'">'+value.title+'</option>';
                        });

                        category_Items += ' </select>'+
                                '</div>'+
                            '</div>';
                        $('#data_cat').empty();
                        $('#data_cat').append(category_Items);
                    }else{
                        $('#data_cat').empty();
                    }
                },
                error:function(error){
                    $('#data_cat').empty();
                    console.error(error);
                    
                }
            });
        });
    });
</script>
@endpush