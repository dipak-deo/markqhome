<?php
use App\Models\SiteVisitor;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Page;
use App\Models\Post;
use App\Models\PostMeta;
use App\Models\Country;
use App\Models\Province;
use App\Models\District;
use App\Models\State;
use App\Models\City;
use App\Models\Menu;
use App\Models\MenuItems;


use App\Models\Property;
use App\Models\PropertyMeta;
use App\Models\BuildQuitsMeta;
use App\Models\HomeStyle;
use App\Models\UpgrateType;
use App\Models\LandScaping;
use App\Models\SpecialOffer;
use App\Models\FloorPlan;

if(!function_exists('sidebar_active')){
    function sidebar_active($route = []){
        return request()->routeIs($route) ? 'active' : '';
    }
}

if(!function_exists('site_visitor')){
    function site_visitor(){
        $visitor = SiteVisitor::all();
        return $visitor->count();
    }
}

if(!function_exists('site_visitor_today')){
    function site_visitor_today(){
        $visitor = SiteVisitor::whereDate('created_at', Carbon::today())->get();
        return $visitor->count();
    }
}

if(!function_exists('site_visitor_yesterday')){
    function site_visitor_yesterday(){
        $visitor = SiteVisitor::whereDate('created_at', Carbon::yesterday())->get();
        return $visitor->count();
    }
}

if(!function_exists('total_user')){
    function total_user(){
        return User::all()->count();
    }
}

if(!function_exists('categoryAll')){
    function categoryAll(){
        return Category::all();
    }
}

if(!function_exists('all_page')){
    function all_page(){
        return Page::where('status','publish')->get();
    }
}

// if(!function_exists('get_category')){
//     function get_category($id){
//         return Category::find($id);
//     }

// }


if(!function_exists('post_count')){
    function post_count($id, $type){
      switch ($type) {
        case 'category':
           return PostMeta::where('meta_key', 'category_id')->where('meta_value', $id)->get()->count();
        
        default:
            return 0;
           
      }
    }
}

if(!function_exists('country')){
    function country(){
        return Country::all();
    }
}

if(!function_exists('get_state')){
    function get_state($country_id){
        return State::where('country_id',$country_id)->get();
    }
}

if(!function_exists('get_cities')){
    function get_cities($state_id){
        return City::where('state_id',$state_id)->get();
    }
}

if(!function_exists('model_path')){
    function model_path($model){
        return 'App\Models\\'.$model;
    }
}

if(!function_exists('get_menu')){
    function get_menu($menu_id){
        return Menu::find($menu_id);
    }
}

if(!function_exists('get_items_by_mebu_block')){
    function get_items_by_mebu_block($menuItems){
        // return MenuItems::where('menu_id', $menu_id)->where('type', 'block')->get();
        return MenuItems::find($menuItems);
    }
}

if(!function_exists('IBCODE')){
    function IBCODE($shortcode){
       return redirect()->route('home', ['?page='.$shortcode]);
    }
}

if(!function_exists('get_menu_items')){
    function get_menu_items($menu_id){
        return MenuItems::where('id', $menu_id)->first();
    }
}

if(!function_exists('page_detail')){
    function page_detail($page_id){
        return Page::find($page_id);
    }
}

if(!function_exists('section_field')){
    function section_field($slug){
        return config('register')['home-section'][$slug]['fields'];
    }
}

if(!function_exists('megha_menu_header')){
    function megha_menu_header($menu_id, $block_no = NULL){
        $menu = Menu::find($menu_id);
        // dd($menu);
        if($menu){
            if($menu->mega_menu_header == NULL){
                return 0;
            }
            $mega_menu_header = json_decode($menu->mega_menu_header, true);
            if($block_no !=NULL){
                foreach($mega_menu_header as $block){
                   if($block['block_id'] == $block_no){
                    return $block['title'];
                   }
                }
               return 0;
            }else{
                return $mega_menu_header;
            }
        }else{
            return 0;
        }
    }
}

if(!function_exists('megha_menu_buttons')){
    function megha_menu_buttons($menu_id,$menu_items_id, $block_no = NULL){
        $menu = MenuItems::where('id', $menu_items_id)->where('menu_id',$menu_id)->first();      
        if($menu){
            if($menu->buttons == NULL){
                return 0;
            }
            $mega_menu_buttons = json_decode($menu->buttons, true);
            if($block_no !=NULL){
                foreach($mega_menu_buttons as $block){
                   if($block['id'] == $block_no){
                    return $block;
                   }
                }
               return 0;
            }else{
                return $mega_menu_buttons;
            }
        }else{
            return 0;
        }
    }
}


if(!function_exists('get_edit_group_model')){
    function get_edit_group_model($edit_group){
        $data = [
            'floor-plan' => 'FloorPlan',
            'home-styles' => 'HomeStyle',
            'upgrate-type'=>'UpgrateType',
            'inclusion' => 'Inclusion',
            'landscaping'=>'LandScaping',
            'special_offers' => 'SpecialOffer',
        ];
        return in_array($edit_group, array_keys($data)) ? model_path($data[$edit_group]) : NULL;
        // return model_path($model)::where('id', $id)->first();
    }

}

if(!function_exists('get_home_types')){
    function get_home_types($key = NULL){
        $data = [
            'single_storey' => 'Single Storey',
            'double_storey' => 'Double Storey'
        ];
        return ($key == NULL)? $data:$data[$key];
    }
}

if(!function_exists('get_property_details')){
    function get_property_details($id){
        return Property::find($id);
    }
}

if(!function_exists('get_floorplan')){
    function get_floorplan($id){
        return FloorPlan::find($id);
    }

}

if(!function_exists('get_buildquit_meta')){
    function get_buildquit_meta($id, $key,$type="first"){
        $q =  BuildQuitsMeta::where('build_quit_id', $id)->where('meta_key', $key);
        if($type == "first"){
          $data =   $q->first();
        }else{
           $data = $q->get();
        }

        return $data;
    }
}

if(!function_exists('get_homestyle')){
    function get_homestyle($id){
        return HomeStyle::find($id);
    }

}

if(!function_exists('get_upgrateType')){
    function get_upgrateType($id){
        return UpgrateType::find($id);
    }
}

if(!function_exists('get_upgrateType_meta')){
    function get_upgrateType_meta($id, $uuid){
       $data = UpgrateType::find($id);
       foreach($data->description as $key => $value){
        if($value['uuid'] == $uuid){
            return $value;
        }
       }
       return NULL;
    }
}

if(!function_exists('get_landscaping')){
    function get_landscaping($id){
        return LandScaping::find($id);
    }
}


if(!function_exists('get_special_offer')){
    function get_special_offer($id){
        return SpecialOffer::find($id);
    }
}


if(!function_exists('get_templates')){
    function get_templates($type = 'list'){
        $templates = [];
        if($type == 'list'){
            $templatePath = resource_path('views/home/templates'); // Path to template directory
        }else{
            $templatePath = resource_path('views/home/templates/detail');
        }
        // Scan all Blade template files
        foreach (glob($templatePath . '/*.blade.php') as $file) {
            $content = file_get_contents($file);
            
            // Extract "Template Name" from the comment
            if (preg_match('/\*\s*Template Name:\s*(.+)/', $content, $matches)) {
                $filename = basename($file, '.blade.php');
                $templates[$filename] = trim($matches[1]); // Store filename as key and template name as value
            }
        }
        // if (View::exists('templates.' . $template)) {
        //     return view('templates.' . $template, compact('page'));
        // }
        return $templates;
    }
}