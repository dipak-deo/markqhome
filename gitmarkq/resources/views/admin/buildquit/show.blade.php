@extends('admin.master')
@section('title','Show Build Quit Details')
@section('page_title','Show Build Quit Details')
@section('body')

<div class="row">
    <div class="col-md-12">
        <ul>
            <li>Name: <span>{{ $data->first_name }} {{ $data->last_name }}</span></li>
            <li>email: <span>{{ $data->email }}</span></li>
            <li>phone: <span>{{ $data->phone }}</span></li>
            <li>Data: <span>{{ $data->created_at->format('d M, Y') }}</span></li>
            <li>Total Amount: <span>$ {{ (get_buildquit_meta($data->id,'total_amount'))? get_buildquit_meta($data->id,'total_amount')->meta_value :'-' }}</span> </li>
            <li>Home Type: <span> {{ get_home_types($data->home_type) }}</span> </li>
            <li>Floor Plan: 
                <ul>
                    @php
                    $floor_plan = get_buildquit_meta($data->id,'floor_plan','get');
                    // print($floor_plan);
                    @endphp
                    @foreach ($floor_plan as $fl)
                        @if(get_floorplan($fl->meta_value))
                        <li>{{ get_floorplan($fl->meta_value)->title }} - $ {{ get_floorplan($fl->meta_value)->price }}</li>
                        @endif
                    @endforeach

                </ul>
            </li>
            {{-- home design also called property name --}}
            <li>Home Design Name: <span>{{ get_property_details($data->home_design_id)->title }} - $ {{ get_property_details($data->home_design_id)->price }}</span></li>
            <li>Home Style (Facades): <span>{{ get_homestyle($data->home_style_id)->title }} - $ {{ get_homestyle($data->home_style_id)->price }}</span></li>
    
            <li>Upgrate Type: <span>{{ get_upgrateType($data->upgrate_type_id)->title }}</span></li>
            <li>Upgrate Type (Inclusive): <span>{{ get_upgrateType_meta($data->upgrate_type_id,$data->inclusion_id)['title'] }} - $ {{ get_upgrateType_meta($data->upgrate_type_id,$data->inclusion_id)['price'] }}</span></li>
            <li>Landscaping : {{ get_landscaping($data->landscaping_package_id)->title }} - $ {{ get_landscaping($data->landscaping_package_id)->price }}</li>
            <li>Special Offer : {{ get_special_offer($data->special_offer_id)->title }} - $ {{ get_special_offer($data->special_offer_id)->price }}</li>

        </ul>
    </div>
</div>
@endsection