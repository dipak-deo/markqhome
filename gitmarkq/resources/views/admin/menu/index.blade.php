@extends('admin.master')
@section('title', 'menu managemeny')
@section('page_title', 'menu management')
@section('body')
<style>
    .ib_menu-structure {
        border: 1px solid #ddd;
        padding: 15px;
        min-height: 400px;
        border-radius: 5px;
    }
    .ib_menu-item {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 10px;
        background-color: #f8f9fa;
        border-radius: 5px;
        cursor: grab;
    }
    .ib_sub-menu {
        padding-left: 30px;
    }

    .ib_menu-item {
    margin: 10px;
    padding: 10px;
    border: 1px solid #ddd;
    cursor: pointer;
}

.ib_sub-menu {
    display: none;
    margin-left: 20px;
}
    .card-title{
        background: rgb(191, 191, 191);
        padding: 5px 10px;
        margin-bottom: 10px;
        /* margin: 10px auto; */
        /* border-radius: 6px; */
    }
    .card-title h6{
        font-size: 14px;
    }
    .card-title i{
        font-size: 15px;
    }
    #menuitems {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        #menuitems > li {
            margin: 5px;
            padding: 10px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            cursor: move;
        }

        .ibsub-menu {
            list-style-type: none;
            padding: 0;
            margin: 0;
            padding-left: 20px; /* Indent the sub-menu */
        }
        .ibsub-menu li {
            margin: 5px;
            padding: 8px;
            background-color: #e0e0e0;
            border: 1px solid #bbb;
        }
</style>

    <div class="row">
        <div class="col-md-12">
            @include('message.message')
        </div>
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">Main Menu</h4>
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-dark">
                                       <div class="row">
                                      
                                        @if($menuItems->isEmpty())
                                        <div class="col-md-12 mt-2">
                                            <a href="#createmodel"  data-bs-toggle="modal">Create New Menu</a>
                                        </div>
                                        @else
                                        <div class="col-md-6">
                                            {{-- {{ action('ControllerName', ['id'=>1]) }} --}}
                                            <form action="{{ route('edit.menu.block') }}" method="get">
                                                @csrf 
                                                <input type="hidden" name="type" value="{{ request()->get('type') }}">
                                                <input type="hidden" name="menu_id" value="{{ request()->get('menu_id') }}">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-2 col-form-label">Select Menu</label>
                                                <div class="col-md-8">
                                                   
                                                        <select name="menu_block_id" id="selected_menu"  class="form-select">
                                                            @foreach($menuItems as $item)
                                                            @if($loop->first)
                                                            <option value="{{ $item->id }}" @if(isset($_GET['block_id'])) {{ (request()->get('block_id') == $item->id)? 'selected':'' }} @else selected @endif
                                                                >{{ $item->block_title }}</option>
                                                            @else
                                                            <option value="{{ $item->id }}" @if(isset($_GET['block_id'])) {{ (request()->get('block_id') == $item->id)? 'selected':'' }} @else selected @endif>{{ $item->block_title }} </option>
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                        
                                                    
                                                   
                                                </div>
                                                <div class="col-md-2"> <button class="btn btn-success" type="submit">Select</button></div>
                                            </div>
                                            </form>
                                            
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <strong>Or</strong>
                                            <a href="#createmodel"  data-bs-toggle="modal">Create New Menu</a>
                                        </div>
                                        @endif
                                       </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <!-- Add Menu Items Section -->
                                <div class="col-md-4">
                                    <h5>Add Menu Items</h5>
                                    @if($menuList !=NULL)
                                    @foreach($menuList as $key=>$menubox)
                                    <form action="{{ route('menu.items.store') }}" method="POST">
                                        @csrf 
                                        <input type="hidden" name="type" value="{{$key}}">
                                        <input type="hidden" name="menu_block_id" value="{{ request()->get('menu_id') }}" class="menu_id">
                                        <div class="border border-sm  mb-3">
                                            <div class="card-title d-flex justify-content-between">
                                             <h6>{{ $key }}</h6>
                                             {{-- <i class="fas fa-sort-down"></i> --}}
                                             <i class="fas fa-caret-up"></i>
                                            </div>
                                            <div class="form-items p-2">
                                             @if($menubox !=NULL)
                                             @foreach($menubox as $mItems)
                                             <div class="form-check">
                                                 <input class="form-check-input" type="checkbox" name="items[]" value="{{ $mItems['id'] }}" id="items_{{$mItems['id']}}">
                                                 <label class="form-check-label" for="items_{{$mItems['id']}}">
                                                     {{ $mItems['title'] ?? 'N/A' }}
                                                 </label>
                                             </div>
                                             @endforeach
                                             @endif
                                            
                                             <button class="btn btn-danger my-2" type="button">select all menu</button>
                                             <button class="btn btn-primary my-2" type="submit">Add to Menu</button>
                                            </div>
                                           
                                         </div>
                                    </form>
                                    @endforeach 
                                    @endif
                                    <div class="border border-sm  mb-3">
                                        <div class="card-title d-flex justify-content-between">
                                         <h6>Custom Link</h6>
                                         {{-- <i class="fas fa-sort-down"></i> --}}
                                         <i class="fas fa-caret-up"></i>
                                        </div>
                                        <div class="form-items p-2">
                                         <form action="{{ route('menu.items.store') }}" method="POST">
                                            @csrf 
                                            <input type="hidden" name="type" value="custom_link">
                                            <input type="hidden" name="menu_block_id" value="{{ request()->get('menu_id') }}" class="menu_id">
                                            <div class="form-group">
                                                <label for="" class="col-form-label form-label">Link</label>
                                                <input type="text" class="form-control" name="target" placeholder="https://">
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="col-form-label form-label">Display Text</label>
                                                <input type="text" name="title" class="form-control" name="title">
                                            </div>
                                            <button class="btn btn-danger my-2" type="button">select all menu</button>
                                         <button class="btn btn-primary my-2" type="submit">Add to Menu</button>
                                         </form>
                                         
                                         
                                        </div>
                                       
                                     </div>
                                </div>
                    
                                <!-- Menu Structure Section -->
                                @if(isset($_GET['menu_id']))
                                @php
                                // dd($menuItems);
                                $m_id = $_GET['menu_id'];
                                $menu = get_menu($m_id);
                                // $all_menu_items = get_by_menu_id($m_id);
                                // dd($all_menu_items);
                                // dd($menuItems);
                                @endphp
                                @if(isset($_GET['block_id']) && get_items_by_mebu_block($_GET['block_id'])!=NULL && get_items_by_mebu_block($_GET['block_id'])->items !=NULL )
                                @php 
                                // dd(get_items_by_mebu_block($_GET['block_id']));
                                // dd(json_decode(get_items_by_mebu_block($_GET['block_id'])->items))
                                @endphp
                                <div class="col-md-8">
                                        <h5> Megha Menu Structure ({{ $menu->title ?? '' }})</h5>
                                      
                                            
                                                <form action="{{ route('menu.block.update',get_menu_items($_GET['block_id'])->id) }}" class="my-2" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" name="block_title" value="{{ get_menu_items($_GET['block_id'])->block_title }}">
                                                            </div>
                                                              
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <button class="btn btn-success" type="submit" onclick="return confirm('please confirm')">Update</button>
                                                               <a href="{{ route('menu.block.delete',get_menu_items($_GET['block_id'])->id) }}" class="btn btn-danger" onclick="return confirm('are you want delete this menu')">delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            
                                       
                                    <div class="ib_menu-structure" id="menuitems_old">
                                     

                                        <ul  id="menuitems">
                                            @foreach(json_decode(get_items_by_mebu_block($_GET['block_id'])->items) as $mkey=>$mb_items)
                                            <li data-id="{{ $mb_items->uuid }}" > {{ $mb_items->title }} &nbsp; &nbsp;
                                                <a href="javascript:;" class="item_description" data-id="{{ $mb_items->uuid }}">Items Description</a> &nbsp; &nbsp;

                                                <form action="" class="items_description_field" data-id="{{ $mb_items->uuid }}" style="display: none">
                                                    <input type="text" class="form-control" name="description" value="{{ $mb_items->description ?? '' }}">
                                                    <button type="submit" class="save_description" data-menu_items="{{ $_GET['block_id'] }}" data-id="{{ $mb_items->uuid }}">save</button>
                                                </form>

                                                 <a href="{{ route('delete.menu.block.items',['id'=>$mb_items->id,'?menu_id='.$_GET['menu_id'].'&block_id='.$_GET['block_id'].'&uuid='.$mb_items->uuid]) }}">delete</a>
                                                </li>
                                            @endforeach
                                          
                                        </ul>

                                    </div>
                               
                    
                                    <!-- Menu Location -->
                                    <h6 class="mt-4">Menu Buttons</h6>
                                    <form action="{{ route('menu.buttons.update','menu_id='.request()->get('menu_id').'&block_id='.request()->get('block_id')) }}" method="POST">
                                        @csrf
                                        @for($i =1; $i<=2; $i++)
                                        <div class="form-group">
                                            <label class="form-check-label" for="mainNav">Buttons {{$i}} Title</label>
                                            <input type="text" class="form-control" name="buttons_title[]" value="{{ (megha_menu_buttons(request()->get('menu_id'),request()->get('block_id'),$i) !=0)? megha_menu_buttons(request()->get('menu_id'),request()->get('block_id'),$i)['title']: '#'  }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-check-label" for="mainNav">Buttons {{$i}} Link</label>
                                            <input type="text" class="form-control" name="buttons_link[]" value="{{ (megha_menu_buttons(request()->get('menu_id'),request()->get('block_id'),$i) !=0)? megha_menu_buttons(request()->get('menu_id'),request()->get('block_id'),$i)['link']: '#'  }}">
                                        </div>
                                        <hr>
                                        @endfor
                                        <div class="d-flex justify-content-between mt-4">
                                            <a href="#" class="text-danger">Delete Menu</a>
                                            <button class="btn btn-primary" id="saveMenu">Save Menu</button>
                                        </div>
                                    </form>
                     
                    
                                    <!-- Delete and Save Buttons -->
                                   
                                    <div id="serialize_output"></div>
                                   
                                    
                                </div>
                                @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- create menu model start --}}

    <!-- #modal-dialog -->
<div class="modal fade" id="createmodel">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Create Menu</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
        </div>
        <form action="{{ route('menu.block.store',request()->get('menu_id')) }}" method="POST">
            @csrf
            <input type="hidden" name="type" value="new">
            <div class="modal-body">
                <div class="form-group">
                    <label for="" class="col-form-label form-label">Menu Block Name</label>
                    <input type="text" class="form-control" name="block_title">
                    @error('block_title') <p class="text-danger">{{ $message }}</p> @enderror
                </div>
                
            </div>
            <div class="modal-footer">
              <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Close</a>
              <button class="btn btn-success" type="submit">create</button>
            </div>
        </form>
        
      </div>
    </div>
  </div>
    {{-- create menu model end --}}
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        var selecteMenu =  $('#selected_menu').val()
        $('#selected_menu').on('change',function(){
            var selecteMenu = $(this).val();
            // alert(selecteMenu);
            $('.menu_id').val(selecteMenu);
        });
        $('.menu_id').val(selecteMenu);
        // alert(selecteMenu);
    });


</script>

{{-- menu drag drop start --}}
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
    $(document).ready(function(){
        var group = $("#menuitems").sortable({
  group: 'serialization',
  onDrop: function ($item, container, _super) {
    var data = group.sortable("serialize").get();	    
    var jsonString = JSON.stringify(data, null, ' ');
    $('#serialize_output').text(jsonString);
  	  _super($item, container);
  }
});
    });
</script>



<script>
    $(document).ready(function(){
        $(".item_description").on('click',function(){
            var id = $(this).data('id');
        $(".items_description_field[data-id='" + id + "']").toggle();
        });
    });


    $(document).ready(function(){
         // Save the specific form field data
        $(".save_description").on('click', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var MenuItems_id = $(this).data('menu_items');
            var description = $(".items_description_field[data-id='" + id + "'] input[name='description']").val();

            $.ajax({
                url: "{{ route('menu.items.description') }}", 
                method: "POST",
                data: {
                    id: id,
                    description: description,
                    menu_items: MenuItems_id,
                    _token: "{{ csrf_token() }}" 
                },
                success: function (response) {
                    alert("Description saved successfully!");
                    $(".items_description_field[data-id='" + id + "']").hide();
                },
                error: function () {
                    alert("An error occurred while saving the description.");
                }
            });
        });
    });
</script>
@endpush