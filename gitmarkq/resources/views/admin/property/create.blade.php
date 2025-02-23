@extends('admin.master')
@section('title', 'property-create')
@section('page_title', 'Property create')
@section('body')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">Property Create</h4>
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
            </div>
            <div class="panel-body">
                @include('message.message')
                @if(session()->has('errors'))
                @php print_r(session()->get('errors')) @endphp
                @endif
                <form action="{{ route('admin.property.store') }}" method="POST" class="form-horizontal"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label form-label">Property Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="title" class="form-control"
                                            value="{{ old('title') }}">
                                        @error('title')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label form-label">Description</label>
                                        <textarea name="description" id="" cols="30" rows="10" class="summernote form-control">{{ old('description') }}</textarea>
                                        @error('description')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                @php
                                $propertyMeta = [
                                    'label' => 'Property Meta',
                                    'div_class' => 'property_meta_section',
                                    'table_class' => 'property_meta',
                                    'meta_key' => 'property_meta_key',
                                    'meta_value' => 'property_meta_value'
                                ];

                                $additionalMeta = [
                                    'label' => 'Meta Data',
                                    'div_class' => 'property_meta_data_section',
                                    'table_class' => 'property_meta_data',
                                    'meta_key' => 'meta_data_key',
                                    'meta_value' => 'meta_data_value'
                                ];
                            @endphp
                            
                           <div class="col-md-12">
                            <x-table-data-component :metadata="$propertyMeta" />
                            
                            <x-table-data-component :metadata="$additionalMeta" />
                           </div>

                          
                            {{-- <x-table-data-component :metadata="$additionalMeta">
                            </x-table-data-component> --}}
                                
                                {{-- <div class="col-md-12 property_meta_data_section">
                                    <div class="form-group">
                                        <label for="" class="col-form-label form-label">Meta Data</label>
                                    </div>
                                    <table class="table table-bordered property_meta_data">
                                        <thead>
                                            <th>SN</th>
                                            <th>Meta Key</th>
                                            <th>Meta Value</th>
                                            <th><button type="button" class="btn btn-warning btn-add">+</button></th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="sn">1</td>
                                                <td>
                                                    <div class="form-group">
                                                    <input type="text" class="form-control" name="meta_data_key[]" placeholder="eg: water">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                    <input type="text" class="form-control" name="meta_data_value[]" placeholder="eg: available">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <button type="button" class="btn btn-danger btn-remove">-</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> --}}
                           <div class="col-md-12">
                           
                           </div>
                                <div class="col-md-12">
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                
                                                <label for="" class="col-form-label form-label"> Download Voucher</label>
                                                <input type="file" name="download_voucher" class="form-control" accept="application/pdf">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="col-form-label form-label"> Download Floor Plan</label>
                                                <input type="file" name="download_floorplan" class="form-control" accept="application/pdf">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="" class="col-form-label form-label"> Beds</label>
                                                <input type="text" name="beds" id="" class="form-control">
                                                @error('beds')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="" class="col-form-label form-label"> Bath</label>
                                                <input type="text" name="bath" id="" class="form-control">
                                                @error('bath')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="" class="col-form-label form-label"> Garage
                                                </label>
                                                <input type="text" name="garage" id="" class="form-control">
                                                @error('garage')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="" class="col-form-label form-label">Lot Width</label>
                                                <input type="text" name="lot_width" id="" class="form-control">
                                                @error('lot_width')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label form-label"> Feature Image</label>
                                        <input type="file" name="image" id="" class="form-control" accept="image/*">
                                        @error('image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label form-label"> Additional Image</label>
                                        <input type="file" name="additional_image[]" id="" class="form-control" accept="image/*" multiple>
                                        @error('additional_image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label form-label"> Gallery Image</label>
                                        <input type="file" name="gallery_image[]" id="" class="form-control" accept="image/*" multiple>
                                        @error('additional_image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label form-label"> Price</label>
                                        <input type="text" name="price" id="" class="form-control" value="{{ old('price') }}">
                                        @error('price')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                   <div class="card p-2 my-2">
                                        <div class="form-group">
                                            <label for="" class="col-form-label form-label">Select Category</label>
                                            @error('image')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        @foreach(property_category() as $pcat)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="property_category[]" value="{{$pcat->id}}" id="checkbox_{{$pcat->slug ?? $pcat->id}}">
                                            <label class="form-check-label" for="checkbox_{{$pcat->slug ?? $pcat->id}}">
                                               {{ $pcat->title }}
                                            </label>
                                        </div>
                                        @endforeach
                                       
                                   </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label form-label">Location Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="location" class="form-control"
                                            value="{{ old('location') }}">
                                        @error('location')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label form-label">Map Ifreme Url <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="map_ifreme" class="form-control"
                                            value="{{ old('map_ifreme') }}">
                                        @error('map_ifreme')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label form-label">Video Url <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="video_url" class="form-control"
                                            value="{{ old('video_url') }}">
                                        @error('video_url')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label form-label">Available Status <span
                                                class="text-danger">*</span></label>
                                       <select name="available_status" id="" class="form-select">
                                        <option value="available" selected>Available</option>
                                        <option value="sold">Sold</option>
                                        <option value="not_available">Not Available</option>
                                       </select>
                                        @error('title')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label form-label">Property Type <span
                                                class="text-danger">*</span></label>
                                       <select name="property_type_id" id="" class="form-select">
                                       @foreach(property_type() as $ptype)
                                       <option value="{{ $ptype->id }}">{{ $ptype->title }}</option>
                                       @endforeach
                                       </select>
                                        @error('property_type')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label form-label">Home Types <span
                                                class="text-danger">*</span></label>
                                       <select name="home_types" id="" class="form-select">
                                        <option value="">Select One</option>
                                       @foreach(get_home_types() as $key=>$htypes)
                                       <option value="{{ $key }}">{{ $htypes }}</option>
                                       @endforeach
                                       </select>
                                        @error('property_type')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                            
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label form-label">Country <span
                                                class="text-danger">*</span></label>
                                       <select name="country_id" id="country" class="form-select">
                                        <option value="">Select One</option>
                                        @foreach(country() as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                       </select>
                                        @error('provience_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label form-label">State <span
                                                class="text-danger">*</span></label>
                                       <select name="state_id" id="state_id" class="form-select">
                                        <option value="">Select One</option>
                                       </select>
                                        @error('district_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label form-label">Cities <span
                                                class="text-danger">*</span></label>
                                       <select name="city_id" id="cities" class="form-select">
                                        <option value="">Select One</option>
                                       </select>
                                        @error('local_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label form-label">Zip Code <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="zip_code" class="form-control"
                                            value="{{ old('zip_code') }}">
                                        @error('zip_code')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label form-label">Address Line One <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="address_line_one" class="form-control"
                                            value="{{ old('address_line_one') }}">
                                        @error('address_line_one')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label form-label">Address Line Two <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="address_line_two" class="form-control"
                                            value="{{ old('address_line_two') }}">
                                        @error('address_line_two')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group my-2">
                                <button name="status" value="publish" class="btn btn-danger btn-sm"
                                    type="submit">Publish</button>
                                <button name="status" value="draft" class="btn btn-info btn-sm"
                                    type="submit">draft</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
<script>
    js_colum_colne('property_meta','btn-add','btn-remove','sn');
    js_colum_colne('property_meta_data','btn-add','btn-remove','sn');

    $(document).ready(function(){
        $('#country').on('change',function(){
            var pid = $(this).val();
            $.ajax({
                type: "GET",
                url : "?cid="+pid,
                success:function(res){
                    // console.log(res);
                    
                    $('#state_id').empty().append("<option>Select One</option>");
                    if(res){
                        $.each(res, function(value,items){
                            // console.log(items);
                            
                            var item = "<option value='"+items.id+"'>" +items.name+ "</option>"
                            $('#state_id').append(item);
                        });
                    }
                },
                error: function(error){
                    $('#state_id').empty();
                    console.error(error);
                },
            });
        });    

        // district base get local lavel

        $('#state_id').on('change',function(){
            var did = $(this).val();
            $.ajax({
                type: "GET",
                url : "?sid="+did,
                success:function(res){
                    $('#cities').empty().append("<option>Select One</option>");;
                    if(res){
                        $.each(res, function(value,items){
                            // console.log(items);
                            
                            var item = "<option value='"+items.id+"'>" +items.name+ "</option>"
                            $('#cities').append(item);
                        });
                    }
                },
                error: function(error){
                    $('#cities').empty();
                    console.error(error);
                },
            });
        });
    });
</script>
@endpush