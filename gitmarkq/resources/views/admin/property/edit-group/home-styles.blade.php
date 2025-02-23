@extends('admin.master')
@section('title','Display Property Home Style')
@section('page_title','Display Property Home Style')
@section('body')

<div class="row">
    <div class="col-md-4">
        <a href="javascript:;" class="btn btn-info btn-sm my-2" id="custom_url_create">Create +</a>
    </div>
    <div class="col-md-12">
        <div class="panel panel-inverse">

            <div class="panel-heading">
                <h4 class="panel-title">Home Style of {{ $property->title }}</h4>
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
                <table id="data-table-default"
                    class="table table-striped table-bordered align-middle w-100 text-nowrap">
                    <thead>
                        <tr>
                            <th width="1%"></th>
                            <th width="1%" data-orderable="false"></th>
                            <th class="text-nowrap">Name</th>
                            <th class="text-nowrap">Slug</th>
                            <th class="text-nowrap">Upgrade Charge</th>
                            <th class="text-nowrap">Created At</th>
                            <th class="text-nowrap">Status</th>
                            <th class="text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @include('message.message')
                        @foreach($datas as $data)
                        <tr class="odd gradeX">
                            <td width="1%" class="fw-bold">{{ $i++ }}</td>
                            <td width="1%" class="with-img">
                              <img src="{{ ($data->image)? url($data->image):url('no_image.jpeg') }}" class="rounded h-30px my-n1 mx-n1">
                            </td>
                            <td>{{ $data->title ?? 'N/A' }} </td>
                            <td>{{ $data->slug ?? 'N/A' }}</td>
                            <td>{{ $data->price ?? 'N/A' }}</td>
                            <td>{{ $data->created_at->format('Y-m-d') ?? 'N/A' }}</td>
                            <td> 
                                @if($data->status == 'draft')
                                <span class="badge bg-danger">Draft</span>
                                @else
                                <span class="badge bg-success">publish</span>
                                @endif    
                            </td>
                            <td>
                                
                                <a href="?edit={{$data->id}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('admin.property.delete.group',['edit_type'=>$edit_type,'id'=>$data->id]) }}" class="btn btn-danger btn-sm" onclick="return confirm('are you sure ?')"><i class="fa fa-trash"></i></a>

                            </td>
                        </tr>
                       @endforeach
                      



                    </tbody>
                </table>
            </div>


            <div class="hljs-wrapper">
                <pre><code class="html" data-url="{{url('admin/data/table-manage/default.json')}}"></code></pre>
            </div>

        </div>
    </div>
</div>


{{-- ----------------------------CREATE MODEL START------------------------- --}}
<div class="modal fade" id="custom_url_create_model" tabindex="-1" role="dialog" aria-labelledby="custom_url_create_modelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="custom_url_create_modelLabel">Create Floor Plan</h5>
         
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
        </div>
        <form action="{{ route('admin.property.update.group',['edit_type'=>$edit_type,'id'=>$property->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="property_id" value="{{ $property->id }}">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Name</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                        </div>
                        @error('title') <p class="text-danger"> {{ $message }}</p> @enderror
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Image</label>
                            <input type="file" class="form-control" name="image" accept="image/*">
                        </div>
                        @error('image') <p class="text-danger"> {{ $message }}</p> @enderror
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Price</label>
                            <input type="text" class="form-control" name="price" value="{{ old('price') }}" required>
                        </div>
                        @error('price') <p class="text-danger"> {{ $message }}</p> @enderror
                    </div>
                  
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger" name="status" value="publish">Save changes</button>
            </div>
        </form>
       
      </div>
    </div>
  </div>
{{-- ----------------------------CREATE MODEL END------------------------- --}}


{{-- ----------------EDIT MODEL START --------------------------------- --}}
@if($edit_data !=NULL)
<div class="modal fade" id="custom_url_edit_model" tabindex="-1" role="dialog" aria-labelledby="custom_url_edit_modelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="custom_url_edit_modelLabel">Edit Property Category</h5>
         
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
        </div>
       <form action="{{ route('admin.property.update.group.items',['edit_type'=>$edit_type,'id'=>$edit_data->id]) }}" method="post">
            @csrf
            <input type="hidden" name="property_id" value="{{ $edit_data->property_id }}">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Name</label>
                            <input type="text" class="form-control" name="title" value="{{ $edit_data->title }}" required>
                        </div>
                        @error('title') <p class="text-danger"> {{ $message }}</p> @enderror
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <img src="{{ ($data->image)? url($data->image):url('no_image.jpeg') }}" class="image-fluid p-4" width="100%">
                            <label for="" class="col-form-label form-label">image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        @error('upgrate_type') <p class="text-danger"> {{ $message }}</p> @enderror
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Price</label>
                            <input type="text" class="form-control" name="price" value="{{ $edit_data->price }}" required>
                        </div>
                        @error('price') <p class="text-danger"> {{ $message }}</p> @enderror
                    </div>
                  
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger" name="status" value="publish">Save changes</button>
            </div>
        </form>
       
      </div>
    </div>
  </div>

@endif
  {{-- ----------------EDIT MODEL END --------------------------------- --}}

@endsection

@if($edit_data !=NULL)
@push('scripts')
<script>
    $(document).ready(function(){
        $('#custom_url_edit_model').modal('show');
    });
</script>
    
@endpush


@endif

@push('scripts')

<script>

$(document).ready(function(){
    $('#custom_url_create').on('click',function(){
        $('#custom_url_create_model').modal('toggle');
    });
});

</script>

@if(Session()->has('errors'))
<script>
   $(document).ready(function(){
    $('#custom_url_create_model').modal('toggle');
   });
</script>
@endif
    
    
@endpush