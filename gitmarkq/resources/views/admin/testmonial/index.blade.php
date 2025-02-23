@extends('admin.master')
@section('title','Display Testmonial')
@section('page_title','All Testmonial')
@section('body')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-inverse">

            <div class="panel-heading">
                <h4 class="panel-title">Table - Testmonial</h4>
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
                            <th class="text-nowrap">Name</th>
                            <th class="text-nowrap">Email</th>
                            <th class="text-nowrap">Rating</th>
                            <th class="text-nowrap">Status</th>
                            <th class="text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @include('message.message')
                        @foreach($testmonials as $data)
                        <tr class="odd gradeX">
                            <td width="1%" class="fw-bold">{{ $i++ }}</td>
                            <td>{{ $data->name ?? 'N/A' }} </td>
                            <td>{{ $data->email ?? 'N/A' }}</td>
                            <td>
                              {{ $data->rating }}
                            </td>
                            <td> 
                                @if($data->status == 'draft')
                                <span class="badge bg-danger">Draft</span>
                                @else
                                <span class="badge bg-success">publish</span>
                                @endif    
                            </td>
                            <td>
                                
                                {{-- <a href="{{ route('category.edit',$data->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> --}}
                                <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="return confirmDelete('{{ route('admin.testmonial.delete',$data->id) }}','Testmonial')"><i class="fa fa-trash"></i></a>

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