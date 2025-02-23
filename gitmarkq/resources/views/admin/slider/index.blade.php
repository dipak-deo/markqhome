@extends('admin.master')
@section('title','Display Slider')
@section('page_title','All Slider')
@section('body')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-inverse">

            <div class="panel-heading">
                <h4 class="panel-title">Data Table - Slider</h4>
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
                            <th class="text-nowrap">Slider Name</th>
                            <th class="text-nowrap">Slug</th>
                            <th class="text-nowrap">Image</th>
                            <th class="text-nowrap">Created at</th>
                            <th class="text-nowrap">Status</th>
                            <th class="text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @include('message.message')
                        @foreach($slider as $data)
                        <tr class="odd gradeX">
                            <td width="1%" class="fw-bold">{{ $i++ }}</td>
                            <td>{{ $data->title ?? 'N/A' }} </td>
                            <td>{{ $data->slug ?? 'N/A' }}</td>
                            <td>
                               @if($data->image)
                               <img src="{{ url($data->image) }}" alt="" width="150px">
                               @else 
                               <img src="{{ url('no_image.jpg') }}" alt="" width="150px">
                               @endif
                            </td>
                            <td>{{ $data->created_at->format('Y-m-d') }}</td>
                            <td> 
                                @if($data->status == 'draft')
                                <span class="badge bg-danger">Draft</span>
                                @else
                                <span class="badge bg-success">publish</span>
                                @endif    
                            </td>
                            <td>
                                
                                <a href="{{ route('slider.edit',$data->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('slider.delete',$data->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('are you sure ?')"><i class="fa fa-trash"></i></a>

                            </td>
                        </tr>
                       @endforeach
                        {{-- <tr class="even gradeC">
                            <td class="fw-bold">2</td>
                            <td class="with-img"><img src="../assets/img/user/user-2.jpg"
                                    class="rounded h-30px my-n1 mx-n1" /></td>
                            <td>Trident</td>
                            <td>Internet Explorer 5.0</td>
                            <td>Win 95+</td>
                            <td>5</td>
                            <td>C</td>
                        </tr> --}}



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