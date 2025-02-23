@extends('admin.master')
@section('title', 'Display Menu')
@section('page_title', 'All Menu')
@section('body')

    <div class="row">
        <div class="col-md-12">
            <a href="#createmodel" data-bs-toggle="modal" class="btn btn-danger btn-sm mb-2">create</a>
        </div>
        <div class="col-md-12">
            <div class="panel panel-inverse">

                <div class="panel-heading">
                    <h4 class="panel-title">Table - Menu</h4>
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
                                <th class="text-nowrap">Menu Name</th>
                                <th class="text-nowrap">Slug</th>
                                <th class="text-nowrap">Available Block</th>
                                <th class="text-nowrap">Location</th>
                                <th class="text-nowrap">Status</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @include('message.message')
                            @foreach ($menu as $data)
                                <tr class="odd gradeX">
                                    <td width="1%" class="fw-bold">{{ $i++ }}</td>
                                    <td>{{ $data->title ?? 'N/A' }} </td>
                                    <td>{{ $data->slug ?? 'N/A' }}</td>
                                    <td>{{ $data->block_number ?? 'N/A' }}</td>
                                    <td>
                                        {{ $data->location }}
                                    </td>
                                    <td>
                                        @if ($data->status == 'draft')
                                            <span class="badge bg-danger">Draft</span>
                                        @else
                                            <span class="badge bg-success">publish</span>
                                        @endif
                                    </td>
                                    <td>

                                        <a href="{{ route('menu.edit', $data->id) }}" class="btn btn-success btn-sm"><i
                                                class="fa fa-edit"></i></a>
                                        <a href="{{ route('menu.megha_menu_block', $data->id) }} " class="btn btn-warning btn-sm" title="Create or Edit Megha Menu Title"><i class="fas fa-bars"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-sm"
                                            onclick="return confirmDelete('{{ route('menu.delete', $data->id) }}','Category')"><i
                                                class="fa fa-trash"></i></a>
                                        <a href="{{ route('menu.index','type=manage-menu-block&menu_id='.$data->id) }}" title="Create & Update Megha Menu" class="btn btn-primary btn-sm"><i class="fas fa-tools"></i></a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


                <div class="hljs-wrapper">
                    <pre><code class="html" data-url="{{ url('admin/data/table-manage/default.json') }}"></code></pre>
                </div>

            </div>
        </div>
    </div>
    <!-- #modal-dialog -->
    <div class="modal fade" id="createmodel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create Menu</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <form action="{{ route('menu.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="type" value="new">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Menu Name</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Redirect Url</label>
                            <input type="text" class="form-control" name="redirect_url"
                                value="{{ old('redirect_url') }}">
                            @error('redirect_url')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Block Number</label>
                            <select name="block_number" id="" class="form-select">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4" selected>4</option>
                            </select>
                            @error('block_number')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <h6 class="mt-4">Menu Location</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="location" value="header" checked>
                            <label class="form-check-label" for="mainNav">
                                Header Menu
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="location" value="footer">
                            <label class="form-check-label" for="mainNav">
                                Footer
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="location" value="quick-link">
                            <label class="form-check-label" for="mainNav">
                                Quick Link
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Close</a>
                        <button class="btn btn-success" name="status" value="publish" type="submit">create</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    {{-- create menu model end --}}

    {{-- update model start --}}
    @if(session()->has('menu_data'))
    @php
        $menu = session()->get('menu_data');
    @endphp
      <!-- #modal-dialog -->
      <div class="modal fade" id="updatemodel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">update Menu</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <form action="{{ route('menu.update',$data->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="type" value="new">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Menu Name</label>
                            <input type="text" class="form-control" name="title" value="{{ $menu->title }}">
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Redirect Url</label>
                            <input type="text" class="form-control" name="redirect_url"
                                value="{{ $menu->redirect_url}}">
                            @error('redirect_url')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label form-label">Block Number</label>
                            <select name="block_number" id="" class="form-select">
                                <option value="2" {{ ($menu->block_number ==1)? 'selected':'' }}>1</option>
                                <option value="2" {{ ($menu->block_number ==2)? 'selected':'' }}>2</option>
                                <option value="3" {{ ($menu->block_number ==3)? 'selected':'' }}>3</option>
                                <option value="4" {{ ($menu->block_number ==4)? 'selected':'' }}>4</option>
                            </select>
                            @error('block_number')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <h6 class="mt-4">Menu Location</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="location" value="header" {{ ($menu->location == 'header')? 'checked':'' }}>
                            <label class="form-check-label" for="mainNav">
                                Header Menu
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="location" value="footer" {{ ($menu->location == 'footer')? 'checked':'' }}>
                            <label class="form-check-label" for="mainNav">
                                Footer
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="location" value="quick-link" {{ ($menu->location == 'quick-link')? 'checked':'' }}>
                            <label class="form-check-label" for="mainNav">
                                Quick Link
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Close</a>
                        <button class="btn btn-success" name="status" value="publish" type="submit">update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    {{-- create menu model end --}}
    @endif







      {{-- update block content start --}}
      @if(session()->has('megha_menu_header'))
      @php
          $mheader = session()->get('megha_menu_header');
        //   dd($mheader);
      @endphp
        <!-- #modal-dialog -->
        <div class="modal fade" id="megha_menu_header">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">create / update Megha Menu Header</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                  </div>
                  <form action="{{ route('menu.megha_menu_block.update',$mheader->id) }}" method="POST">
                      @csrf
                      <input type="hidden" name="type" value="new">
                      <div class="modal-body">
                        @for($i = 1; $i <= $mheader->block_number; $i++)
                          <div class="form-group">
                              <label for="" class="col-form-label form-label">Megha Menu Name for {{ $i }}</label>
                              <input type="text" class="form-control" name="mega_menu_header[]" value="{{ (megha_menu_header($mheader->id, $i) != 0)? megha_menu_header($mheader->id, $i): 'Default Header'  }}">
                              @error('mega_menu_header')
                                  <p class="text-danger">{{ $message }}</p>
                              @enderror
                          </div>
                        @endfor
                       
                         
                      </div>
                      <div class="modal-footer">
                          <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Close</a>
                          <button class="btn btn-success" name="status" value="publish" type="submit">create/update</button>
                      </div>
                  </form>
  
              </div>
          </div>
      </div>
      {{-- create menu model end --}}
      @endif
@endsection
@push('scripts')
@if(session()->has('menu_data'))
<script>
    $(document).ready(function(){
        $('#updatemodel').modal('show');
    });
</script>
@endif
@if(session()->has('megha_menu_header'))
<script>
    $(document).ready(function(){
        $('#megha_menu_header').modal('show');
    });
</script>
@endif
@endpush