@extends('admin.master')
@section('title','Display Category')
@section('page_title','All Category')
@section('body')

<div class="row">
    <div class="col-md-12">
        <a href="#create_modal" class="btn btn-danger my-2 btn-sm" data-bs-toggle="modal">create +</a>
    </div>
    <div class="col-md-12">
        <div class="panel panel-inverse">

            <div class="panel-heading">
                <h4 class="panel-title">Table - Category</h4>
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
                            <th class="text-nowrap">Category Name</th>
                            <th class="text-nowrap">Slug</th>
                            <th class="text-nowrap">Is Home Page Available</th>
                            <th class="text-nowrap">Total Team</th>
                            <th class="text-nowrap">Status</th>
                            <th class="text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @include('message.message')
                        @foreach($team_categories as $data)
                        <tr class="odd gradeX">
                            <td width="1%" class="fw-bold">{{ $i++ }}</td>
                            <td>{{ $data->name ?? 'N/A' }} </td>
                            <td>{{ $data->slug ?? 'N/A' }}</td>
                            <td>
                                @if($data->is_display_home_page == 1)
                                <span class="badge bg-primary">Yes</span>
                                @else
                                <span class="badge bg-success">No</span>
                                @endif
                            </td>
                            <td>0</td>
                            <td> 
                                @if($data->status == 'draft')
                                <span class="badge bg-danger">Draft</span>
                                @else
                                <span class="badge bg-success">publish</span>
                                @endif    
                            </td>
                            <td>
                                <button type="button" id ="team_edit" value="{{ $data->id }}" class="team_edit btn btn-success btn-sm" data-bs-toggle="modal"><i class="fa fa-edit"></i></button>
                                {{-- <a href="#edit_modal" class="btn btn-success btn-sm" data-bs-toggle="modal"><i class="fa fa-edit"></i></a> --}}
                                <a href="{{ route('team.category.delete',$data->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('are you sure ?')"><i class="fa fa-trash"></i></a>

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

{{-- create model start --}}
<div class="modal fade" id="create_modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Create Team Category</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
        </div>
        <form action="{{ route('team.category.store') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group my-2">
                    <label for="">Category Name</label>
                    <input type="text" name="name" id="" class="form-control" value="{{ old('name') }}">
                    @error ('name')<p class="text-danger">{{ $message }}</p> @enderror
                </div>
                <div class="form-check my-2">
                    <input class="form-check-input" type="checkbox" id="checkbox1" name="is_display_home_page" value="1" checked />
                    <label class="form-check-label" for="checkbox1">Is Home Page Enabled</label>
                  </div>
              </div>
              <div class="modal-footer">
                <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">cancel</a>
                <button type="submit" name="status" value="publish" class="btn btn-info">save</button>
              </div>
        </form>
      
      </div>
    </div>
  </div>
{{-- create model end --}}
{{-- edit model start --}}
<div class="modal fade team_edit" id="edit_modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Team Category</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
        </div>
        <form action="{{ route('team.category.store') }}" method="POST" id="edit_form">
            @csrf
            <div class="modal-body">
                <div class="form-group my-2">
                    <label for="">Category Name</label>
                    <input type="text" name="name" id="cat_name" class="form-control" value="{{ old('name') }}">
                    @error ('name')<p class="text-danger">{{ $message }}</p> @enderror
                </div>
                <div class="form-check my-2">
                    <input class="form-check-input" type="checkbox" id="is_display_home_page" name="is_display_home_page" value="1" />
                    <label class="form-check-label" for="is_display_home_page">Is Home Page Enabled</label>
                  </div>
              </div>
              <div class="modal-footer">
                <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">cancel</a>
                <button type="submit" name="status" value="publish" class="btn btn-info">save</button>
              </div>
        </form>
      
      </div>
    </div>
  </div>
{{-- edit model end --}}

@endsection
@push('scripts')
@if(Session()->has('errors'))
<script>
    $(document).ready(function(){
        $('#create_modal').modal('show');
    });
</script>
@endif

<script>
    $(document).ready(function(){
        $('.team_edit').on('click',function(){
           let id = $(this).val();
        //    alert(id);
         $.ajax({
            url: "{{route('team.category.edit',['id'=>':id'])}}".replace(':id',id),
            type: "GET",
            success:function(res){
                $('#edit_modal').modal('show');
                $('#cat_name').val(res.name);
                if(res.is_display_home_page == 1){
                    $('#is_display_home_page').prop('checked',true);
                }else{
                    $('#is_display_home_page').prop('checked',false);
                } 
                $('#edit_form').attr('action',"{{ route('team.category.update',['id'=>':id']) }}".replace(':id',id));  

            },
            error: function(error){
                console.log(error);
            }
         });
        });
    })
</script>
    
@endpush