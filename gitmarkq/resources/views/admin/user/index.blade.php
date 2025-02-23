@extends('admin.master')
@section('title','Display User')
@section('page_title','All User')
@section('body')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-inverse">

            <div class="panel-heading">
                <h4 class="panel-title">User Management</h4>
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
                            <th class="text-nowrap">phone</th>
                            <th class="text-nowrap">Role</th>
                            <th class="text-nowrap">Email</th>
                            <th class="text-nowrap">Registred at</th>
                            <th class="text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @include('message.message')
                        @foreach($user as $data)
                        <tr class="odd gradeX">
                            <td width="1%" class="fw-bold">{{ $i++ }}</td>
                            <td width="1%" class="with-img">
                                @if($data->image == NULL)
                                <img src="{{ url('no_image.png') }}" class="rounded h-30px my-n1 mx-n1" />
                                @else 
                                <img src="{{ url($data->image) }}" class="rounded h-30px my-n1 mx-n1" />
                                @endif
                            </td>
                            <td>{{ $data->first_name ?? 'N/A' }} &nbsp; {{ $data->last_name ?? 'N/A' }}</td>
                            <td>{{ $data->phone ?? 'N/A' }}</td>
                            <td>
                                <td>
                                    @if($data->user_type == 'admin')
                                    <span class="badge bg-primary">Admin</span>
                                    @elseif($data->user_type == 'super_admin')
                                    <span class="badge bg-danger">Super Amin</span>
                                   
                                    @else
                                    <span class="badge bg-success">User</span>
                                    @endif
                                </td>
                            </td>
                            <td>{{ $data->email ?? 'N/A' }}</td>
                            <td>{{ $data->created_at->format('Y-m-d') }}</td>
                            <td>
                                @if($data->user_type == 2)
                                <span class="badge bg-danger">cannot be change</span>
                                @else
                                <a href="{{ route('user.edit',$data->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('user.delete',$data->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('are you sure ?')"><i class="fa fa-trash"></i></a>
                                @endif
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