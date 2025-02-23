<?php
use App\Models\PropertyType;
use App\Models\PropertyCategory;

if(!function_exists('property_category')){
    function property_category(){
       return PropertyCategory::where('status', 'publish')->get();
    }
}

if(!function_exists('property_type')){
    function property_type(){
        return PropertyType::where('status', 'publish')->get();
    }
}