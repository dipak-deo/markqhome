@extends('admin.master')
@section('title','Display Property')
@section('page_title','All Property')
@section('body')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-inverse">

            <div class="panel-heading">
                <h4 class="panel-title">Data Table - Property</h4>
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
                            <th class="text-nowrap">Property Type</th>
                            <th class="text-nowrap">Is Available</th>
                            <th class="text-nowrap">Property For</th>
                            <th class="text-nowrap">Price</th>
                            <th class="text-nowrap">Created At</th>
                            <th class="text-nowrap">Status</th>
                            <th class="text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @include('message.message')
                        @foreach($properties as $data)
                        <tr class="odd gradeX">
                            <td width="1%" class="fw-bold">{{ $i++ }}</td>
                            <td width="1%" class="with-img">
                                @if($data->image == NULL)
                                <img src="{{ url('no_image.png') }}" class="rounded h-30px my-n1 mx-n1" />
                                @else 
                                <img src="{{ url($data->image) }}" class="rounded h-30px my-n1 mx-n1" />
                                @endif
                            </td>
                            <td>{{ $data->title ?? 'N/A' }} </td>
                            <td>{{ $data->property_type->title ?? 'N/A' }}</td>
                            <td>{{ $data->available_status ?? 'N/A' }}</td>
                            <td>{{ $data->property_for ?? 'N/A' }}</td>
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
                                
                                <a href="{{ route('admin.property.edit',$data->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('admin.property.delete',$data->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('are you sure ?')"><i class="fa fa-trash"></i></a>
                                <a href="#" class="btn btn-warning btn-sm" data-id="{{ $data->id }}" id="edit-group"><i class="fas fa-ellipsis-v"></i></a>
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



{{-- edit model start --}}

<div class="modal fade" id="edit_model_dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Modal Dialog</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
        </div>
        <div class="modal-body">
          <a href="" class="btn btn-danger btn-sm" id="floor_plan">Floor Plan</a>
          <a href="" class="btn btn-success btn-sm" id="home_styles">Home Style</a>
          <a href="" class="btn btn-warning btn-sm" id="upgrade_types">Upgrade Types</a>
          <a href="" class="btn btn-secondary btn-sm" id="inclusion">Inclusive</a>
          <a href="" class="btn btn-primary btn-sm" id="landscaping">LandScaping</a>
          <a href="" class="btn btn-secondary btn-sm mt-2" id="special_offers">Special Offers</a>
        </div>
        <div class="modal-footer">
          <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Close</a>
          {{-- <a href="javascript:;" class="btn btn-success">Action</a> --}}
        </div>
      </div>
    </div>
  </div>
{{-- edit model end --}}

@endsection
@push('scripts')
<script>
    $(document).ready(function(){
       $('#edit-group').on('click',function(e){
        e.preventDefault();
        // alert(true);
       var editModel =  $('#edit_model_dialog').modal('show');
       if(editModel){
        var editId = $(this).data('id');
        var floorplan = "{{ route('admin.property.edit.group', ['edit_type' => 'floor-plan', 'id' => ':id']) }}".replace(':id', editId);
        $('#floor_plan').attr('href', floorplan);
        var homeStyles = "{{ route('admin.property.edit.group', ['edit_type' => 'home-styles', 'id' => ':id']) }}".replace(':id', editId);
        $('#home_styles').attr('href',homeStyles);
        var upgrateTypes = "{{ route('admin.property.edit.group', ['edit_type' => 'upgrate-type', 'id' => ':id']) }}".replace(':id', editId);
        $('#upgrade_types').attr('href',upgrateTypes);
        var inclusion = "{{ route('admin.property.edit.group', ['edit_type' => 'inclusion', 'id' => ':id']) }}".replace(':id', editId);
        $('#inclusion').attr('href',inclusion);
       
        var landscaping = "{{ route('admin.property.edit.group', ['edit_type' => 'landscaping', 'id' => ':id']) }}".replace(':id', editId);
        $('#landscaping').attr('href',landscaping);
        var special_offers = "{{ route('admin.property.edit.group', ['edit_type' => 'special_offers', 'id' => ':id']) }}".replace(':id', editId);
        $('#special_offers').attr('href',special_offers);
       }else{
        alert("error");
       }
       });
        
    });
 
</script>
@endpush