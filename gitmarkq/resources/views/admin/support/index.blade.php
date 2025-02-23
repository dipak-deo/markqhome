@extends('admin.master')
@section('title','Support Page')
@section('page_title','All Support')
@section('body')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-inverse">

            <div class="panel-heading">
                <h4 class="panel-title">Data Table - Page</h4>
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
                            <th class="text-nowrap">Title</th>
                            <th class="text-nowrap">Description</th>
                            <th class="text-nowrap">priority</th>
                            <th class="text-nowrap">Created At</th>
                            <th class="text-nowrap">Status</th>
                            <th class="text-nowrap">is Opend</th>
                            <th class="text-nowrap">Remarks</th>
                            <th class="text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @include('message.message')
                        @foreach($support as $data)
                        <tr class="odd gradeX">
                            <td width="1%" class="fw-bold">{{ $i++ }}</td>
                            <td width="1%" class="with-img">
                                @if($data->file == NULL)
                                <i class="fa fa-download"></i>
                                {{-- <img src="{{ url('no_image.png') }}" class="rounded h-30px my-n1 mx-n1" /> --}}
                                @else 
                                {{-- <img src="{{ url($data->image) }}" class="rounded h-30px my-n1 mx-n1" /> --}}
                                <i class="fa fa-download"></i>
                                @endif
                            </td>
                            <td>{{ $data->title ?? 'N/A' }} </td>
                            <td>{!! Str::limit($data->description,30) ?? 'N/A' !!}</td>
                            <td>
                                @if($data->priority == 'low')
                                <span class="badge bg-warning">{{ $data->priority ?? 'N/A' }}</span>
                                @else 
                                <span class="badge bg-danger">{{ $data->priority ?? 'N/A' }}</span>
                                @endif
                            </td>
                            <td>{{ $data->created_at->format('Y-m-d') ?? 'N/A' }}</td>
                           
                            <td> 
                                @if($data->status == 'closed')
                                <span class="badge bg-danger">closed</span>
                                @else
                                <span class="badge bg-success">active</span>
                                @endif    
                            </td>
                            <td>
                                @if($data->is_viewed == 1)
                                <span class="btn btn-success bt-sm"><i class="fa fa-eye"></i> viewed</span>
                                @else 
                                <span class="badge bg-danger"><i class="fa fa-eye"></i> not viewed</span>
                                @endif
                            </td>
                            <td><i>{!! Str::limit($data->remarks,30) ?? 'not opend yet' !!}</i></td>
                            <td>
                                @if($data->status !== 'closed')
                                <a href="{{ route('support.show',$data->id) }}" class="btn btn-success btn-sm" onclick="return confirm('please confirm for view');"><i class="fa fa-edit"></i></a>
                                @endif
                                {{-- <a href="{{ route('page.delete',$data->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('are you sure ?')"><i class="fa fa-trash"></i></a> --}}

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

@endsection