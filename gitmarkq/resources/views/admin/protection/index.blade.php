@extends('admin.master')
@section('title','Display All Protected Page')
@section('page_title','Display All Protected Page')
@section('body')

<div class="row">
    <div class="col-md-12">
        <a href="{{ route('page_protection.create') }}" class="btn btn-info btn-sm my-2">Create +</a>
    </div>
    <div class="col-md-12">
        <div class="panel panel-inverse">

            <div class="panel-heading">
                <h4 class="panel-title">Protected Page List</h4>
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
                            <th class="text-nowrap">Page Title</th>
                            <th class="text-nowrap">Protected From</th>
                            <th class="text-nowrap">Status</th>
                            <th class="text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @include('message.message')
                        @foreach($protection as $data)
                        <tr class="odd gradeX">
                            <td width="1%" class="fw-bold">{{ $i++ }}</td>
                            <td>{{ $data->page->title ?? 'N/A' }} </td>
                            <td>{{ $data->created_at->format('Y-m-d') }}</td>
                            
                            <td>
                                <span class="badge bg-warning">Active</span>
                            </td>
                            
                            <td>
                                
    
                                <a href="{{ route('page_protection.delete',$data->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('are you sure ?')"><i class="fa fa-trash"></i></a>

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