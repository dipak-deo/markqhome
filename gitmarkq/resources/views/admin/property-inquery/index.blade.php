@extends('admin.master')
@section('title','Display Property Inquery')
@section('page_title','All Property Inquery')
@section('body')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-inverse">

            <div class="panel-heading">
                <h4 class="panel-title">Table - Property Inquery</h4>
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
                            <th class="text-nowrap">Full Name</th>
                            <th class="text-nowrap">Email</th>
                            <th class="text-nowrap">Phone</th>
                            <th class="text-nowrap">Date</th>
                            <th class="text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @include('message.message')
                        @foreach($propertyInqueries as $data)
                        <tr class="odd gradeX">
                            <td width="1%" class="fw-bold">{{ $i++ }}</td>
                            <td>{{ $data->first_name ?? 'N/A' }} {{ $data->last_name ?? 'N/A' }} </td>
                            <td>{{ $data->email ?? 'N/A' }}</td>
                            <td>
                                {{ $data->phone ?? 'N/A' }}
                            </td>
                            <td> 
                                {{ $data->created_at->format('Y-m-d') }}
                            </td>
                            <td>
                                
                                <a href="{{ route('admin.property.inquery.show',$data->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                {{-- <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="return confirmDelete('{{ route('category.delete',$data->id) }}','Category')"><i class="fa fa-trash"></i></a> --}}

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