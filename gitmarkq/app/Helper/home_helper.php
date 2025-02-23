<?php

use App\Models\Menu;
use App\Models\MenuItems;
use App\Models\Faq;
use App\Models\HomeSection;
use App\Models\HomeStyle;
use App\Models\UpgrateType;
use App\Models\FloorPlan;

if(!function_exists('menu')){
    function menu($location,$id=NULL){
        $menu = Menu::where('location', $location)->get();
        if($id !=NULL){
            $menu = Menu::where('location', $location)->where('id', $id)->first();
        }

        return $menu;
    }
}

if(!function_exists('permalink')){
    function permaLink($type,$id,$slug){
        return route('home.permalink', [$type,$id,'&slug='.$slug]);
    }
}

if(!function_exists('get_permalink')){
    function get_permalink($type, $slug,$target){
        return route('home', ['type='.$type.'&slug='.$slug.'&target='.$target]);
    }

}

if(!function_exists('get_item_category')){
    function get_item_category($id,$model,$foreign_key){
       return model_path($model)::where($foreign_key,$id)->get();
    }
}

if(!function_exists('get_data_by_id')){
    function get_data_by_id($id, $model){
        return model_path($model)::where('id', $id)->first();
    }
}

if(!function_exists('faq')){
    function  faq(){
        return Faq::all();
    }
}

if(!function_exists('home_section')){
    function home_section($section){
        $section = HomeSection::where('section_type', $section)->get();
        $data = [];
        foreach($section as $item){
            $data[$item->meta_key] = $item->meta_value;
        }
        return $data;
    }
}

if(!function_exists('home_menu_buttons')){
    function home_menu_buttons($menu_id,$id=NULL){
        $menuItems = MenuItems::where('menu_id', $menu_id)->first();
        if($id != NULL){
            return megha_menu_buttons($menu_id, $menuItems->id,$id);
        }
        return megha_menu_buttons($menu_id, $menuItems->id);
    }
}

