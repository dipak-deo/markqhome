<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Page;
use App\Models\PropertyCategory;
use App\Models\Post;
use App\Models\MenuItems;
use Str;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        if($request->type && $request->type=="manage-menu-block" && $request->menu_id){

           return $this->menu_block($request->menu_id);
        }
        $menu = Menu::all();
        return view('admin.menu.menu', compact('menu'));
    }
    public function menu_block($menu_id)
    {
        $menuItems = '';
        $desireMenu = '';
       $menu = Menu::all();
       $menuList = [];
       $category = Category::where('status','publish')->get()->toArray();
       $page = Page::where('status', 'publish')->get()->toArray();
       $property_category = PropertyCategory::where('status', 'publish')->get()->toArray();
       $menuList = [
        'category' => $category,
        'page' => $page,
        'property_category' => $property_category
       ];
       if(isset($_GET['menu_id'])){
        $desireMenu = MenuItems::find($_GET['menu_id']);
        $menuItems = MenuItems::where('menu_id', $_GET['menu_id'])->get();
       }
    //    dd($menuItems);
        return view('admin.menu.index',compact('menu','menuList','menuItems','desireMenu'));
    
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' =>'required',
            'location' =>'required',
            'type' =>'required',
            'block_number'=>'required'
        ]);
       
       try{
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['order'] = Menu::max('order') + 1;
        $menu = Menu::create($data);
        return redirect()->route('menu.index','type=new&menu_id='.$menu->id)->with('success_message', 'Menu created successfully');
       }catch(\Exception $e){
        return redirect()->back()->with('error_message', $e->getMessage());
       }
    }


    public function edit($id)
    {
        $menu = Menu::find($id);
       return redirect()->route('menu.index', 'type=edit&menu_id='.$menu->id)->with('menu_data',$menu);
    }

    public function menu_items(Request $request)
    {
        if($request->type == 'custom_link'){
            $request->validate([
                'title' => 'required',
                'target' => 'required',
                'menu_block_id' => 'required',
            ]);
        }else{
            $request->validate([
                // 'menu_id' => 'required',
                'menu_block_id' => 'required',
                'items' => 'required',
            ]);
        }
        

        $req =  $request->all();
        // dd($req);
        $data = [];
        $data_items = [];
        $menuItems = MenuItems::find($req['menu_block_id']);
        // dd($menuItems);

       if($req['type'] == 'custom_link'){
            $data_items['title'] = $req['title'];
            $data_items['slug'] = $req['target'];
            $data_items['type'] = $req['type'];
            $data_items['id'] = 1;
            $data_items['uuid'] = Str::uuid();
            $data[] = $data_items;
        }else{
            foreach($req['items'] as $items){
                if($req['type'] == 'page'){
                    $page = Page::where('id', $items)->first();
                    if($page !=NULL){
                        $data_items['title'] = $page->title;
                        $data_items['slug'] = $page->slug;
                        $data_items['type'] = $req['type'];
                        $data_items['id'] = $items;
                        $data_items['uuid'] = Str::uuid();
                    }
                    $data[] = $data_items;
                }elseif($req['type'] == 'category'){
                    $category = Category::where('id', $items)->first();
                    if($category !=NULL){
                        $data_items['title'] = $category->title;
                        $data_items['slug'] = $category->slug;
                        $data_items['type'] = $req['type'];
                        $data_items['id'] = $items;
                        $data_items['uuid'] = Str::uuid();
                    }
                    $data[] = $data_items;
                }elseif($req['type'] == 'property_category'){
                    $property_category = PropertyCategory::where('id', $items)->first();
                    if($property_category !=NULL){
                        $data_items['title'] = $property_category->title;
                        $data_items['slug'] = $property_category->slug;
                        $data_items['type'] = $req['type'];
                        $data_items['id'] = $items;
                        $data_items['uuid'] = Str::uuid();
                    }
                    $data[] = $data_items;
                }
            }
        }

        

            if($menuItems){
                if($menuItems->items != ''){
                    $decodeMenu = json_decode($menuItems->items, true);
                    $merge_data = array_merge($decodeMenu,$data);
                    // dd($merge_data);
                    // dd($data);
         
                    // dd(true);
                    $menuItems->update(['items'=>json_encode($merge_data)]);
                }else{
                    
                    $menuItems->update(['items'=>json_encode($data)]);
                }
            }else{
                return redirect()->back()->with('error_message', 'Menu not found');
            }
     
        
        return redirect()->route('menu.index','type=manage-menu-block&menu_id='.$menuItems->menu_id.'&block_create=success&block_id='.$menuItems->id)->with('success_message', 'Menu item created successfully');
    }

    public function update(Request $request,$id)
    {
       $request->validate([
        'title' =>'required',
        'location' =>'required',
        'type' =>'required',
        'block_number'=>'required'
       ]);
       
                try{
                    $data = $request->all();
                    Menu::find($id)->update($data);
                    return redirect()->route('menu.index', 'type=edit&menu_id='.$id)->with('success_message', 'Menu updated successfully');
                }catch(\Exception $e){
                    return redirect()->back()->with('error_message', $e->getMessage());
                }
       }

    public function store_main(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $newArray = [];
        foreach ($data['menuvalue'] as $string) {
            $string = str_replace("'", '"', $string); 

            $content = utf8_encode($string);
            $array = json_decode($content);
            // dd($array);
            $newArray[] = $array;
        }
        // dd($newArray);
        Menu::where('menu_position',$data['menu_position'])
                        // ->where('parent_id',$data['parent_id'])
                        ->delete();
        foreach($newArray as $key=>$value){
            $data['menu_id'] = $value->id;
            $data['menu_type'] = $value->type;
            // dd($data);
            $is_exixst = 
            Menu::create($data);
        }
        
       return redirect()->back()->with('success_message','Menu updated successfully');
    }

    public function store_sub(Request $request)
    {
        $request->validate([
            'parent_menu' =>'required',
        ]);
        $data = $request->all();
        // dd($data);
        // $data['menuvalue'] = json_encode($data['menuvalue']);
        $newArray = [];
        foreach ($data['menuvalue'] as $string) {
            $string = str_replace("'", '"', $string); 

            $content = utf8_encode($string);
            $array = json_decode($content);
            $array->parent_menu = $data['parent_menu'];
            // dd($array);
            $newArray[] = $array;
        }
        // dd($newArray);
        // Menu::where('menu_position',$data['menu_position'])
        //                 ->where('parent_id',$data['parent_id'])
        //                 ->delete();
        foreach($newArray as $key=>$value){
            $data['menu_id'] = $value->id;
            $data['menu_type'] = $value->type;
            // dd($data);
            // $is_exixst = 
            Menu::create($data);
        }
        
       return redirect()->back()->with('success_message','Menu updated successfully');
    
    }

    public function delete_sub($id)
    {
        Menu::where('id',$id)->delete();
        return redirect()->back()->with('success_message','Menu deleted successfully');
    
    }


    public function delete($id)
    {
       try{
            $mainmenu =  Menu::find($id);
            if($mainmenu){
                MenuItems::where('menu_id', $id)->delete();
            }
            $mainmenu->delete();
            return redirect()->back()->with('success_message', 'Menu deleted successfully');
        }catch(\Exception $e){
            return redirect()->back()->with('error_message', $e->getMessage());
        }

    }


    /**
     * **************************************
     * **************************************
     * **************************************
     * **************************************
     */

     public function store_menu_block(Request $request,$menu_id)
     {
       
        $request->validate([
            'block_title' =>'required',
        ]);
        $menuitems = MenuItems::where('menu_id', $menu_id)->get();
        // dd($menuitems);
        $menu = Menu::find($menu_id);
        if($menuitems->isEmpty()){
            $items = MenuItems::create([
                'menu_id'=>$menu_id,
                'block_number' => count($menuitems)+1,
                'block_title'=>$request->block_title,
                'slug' => Str::slug($request->block_title),
                'type'=>'custom',
            ]);
            return redirect()->route('menu.index','type=manage-menu-block&menu_id='.$menu_id.'&block_create=success&block_id='.$items->id)->with('success_message', 'Block created successfully');
        }else{
            if($menu->block_number > count($menuitems)){
                // $menu->update(['block_number'=>count($menuitems)]);
                $items = MenuItems::create([
                    'menu_id'=>$menu_id,
                    'block_number' => count($menuitems)+1,
                    'block_title'=>$request->block_title,
                    'slug' => Str::slug($request->block_title),
                    'type'=>'custom',
                ]);
                return redirect()->route('menu.index','type=manage-menu-block&menu_id='.$menu_id.'&block_create=success&block_id='.$items->id)->with('success_message', 'Block created successfully');
            }else{
                return redirect()->back()->with('error_message', 'Block number is less than menu items');
            }
            // if($menu->content == ''){
            //     $menu->update(['content'=>json_encode($menuitems)]);
            // }else{
            //     $menu->update(['content'=>json_encode($menuitems)]);
            // }
        }
        
     }

     public function edit_menu_block(Request $request)
     {
        $menu_id = $request->menu_id;
        $type = $request->type;
        $menuItems = MenuItems::find($request->menu_block_id);
        // dd($menuItems);
        return redirect()->route('menu.index', 'type=manage-menu-block&menu_id='.$menu_id.'&block_id='.$menuItems->id)->with('menu_data', $menuItems);
     }

     public function menu_block_items_delete(Request $request, $id){
        $data = $request->all();
        // dd($data);
        $is_exit = MenuItems::where('id',$request->block_id)
        ->where('menu_id', $request->menu_id)
        ->first();
        // dd($is_exit);
        if($is_exit !=NULL){
            $items = json_decode($is_exit->items,true);
            foreach($items as $key=>$value){
                if($value['uuid'] == $request->uuid){
                    unset($items[$key]);
                }      
            }
            $is_exit->update(['items'=>json_encode($items)]);
            return redirect()->back()->with('success_message', 'Menu item deleted successfully');
        }else{
            return redirect()->back()->with('error_message', 'Menu item not found');
        }
        
     }  


     public function update_menu_block(Request $request, $id){
        $request->validate([
            'block_title' =>'required',
        ]);
        $data = $request->all();
        // dd($data);
        $is_exit = MenuItems::where('id', $id)
        // ->where('menu_id', $request->menu_id)
        ->first();
        // dd($is_exit);
        if($is_exit !=NULL){
            $is_exit->update($data);
            return redirect()->back()->with('success_message', 'Menu block updated successfully');
        }else{
            return redirect()->back()->with('error_message', 'Menu block not found');
        }

     }

     public function delete_menu_block($id){
        $is_exit = MenuItems::where('id', $id)->first();
        // dd($is_exit);
        if($is_exit !=NULL){
            $is_exit->delete();
            return redirect()->route('menu.index')->with('success_message', 'Menu block deleted successfully');
        }else{
            return redirect()->back()->with('error_message', 'Menu block not found');
        }

     }


     public function megha_menu_header($id)
     {
        $menu = Menu::find($id);
        if($menu){
            $menu_block = $menu->block_number;
            return redirect()->back()->with('megha_menu_header', $menu);
        }
        return redirect()->back()->with('error_message','Menu Not Found');
     }

     public function megha_menu_header_update(Request $request, $menu_id)
     {
        $request->validate([
            'mega_menu_header' =>'required|array',
        ]);
        $mh = $request->all();
        $header = [];
        foreach($mh['mega_menu_header'] as $key=>$value){
            $format = [];
            if($value == NULL){
                
                $format =[
                    'block_id' => $key+1,
                    'title' => 'default header'
                ];
            }else{
                $format = [
                    'block_id' => $key+1,
                    'title' => $value,
                ];
            }
            $header[] = $format;
        }

        // dd($header);
        $menu = Menu::find($menu_id);
        if($menu){
            $menu->update(['mega_menu_header'=>json_encode($header)]);
            return redirect()->back()->with('success_message', 'Menu header updated successfully');
        }
        return redirect()->back()->with('error_message', 'Menu Not Found');
     }


     public function menu_buttons(Request $request)
     {
        $data = $request->all();
      
        try{
            $menuItems = MenuItems::where('menu_id', $data['menu_id'])
            ->where('id', $data['block_id'])
            ->first();
            if($menuItems !=NULL){
                $buttons = [];
                foreach($data['buttons_title'] as $key=>$value){
                    $items =[];
                    $items = [
                        'id' => $key + 1,
                        'title' => $value,
                        'link' => $data['buttons_link'][$key],
                    ];
                    $buttons[] = $items;
                }
                $btn = json_encode($buttons);
                $menuItems->update(['buttons'=>$btn]);
               return redirect()->back()->with('success_message', 'Menu buttons updated successfully');
            }else{
                return redirect()->back()->with('error_message', 'Menu item not found');
            }
        }catch(\Exception $e){
            // dd(true);
            dd($e);
            return redirect()->back()->with('error_message', $e->getMessage());
        }
     }


     public function items_description(Request $request)
     {
        // 
        $data = $request->all();
        // dd($data);
        $is_exit = MenuItems::where('id', $data['menu_items'])
        ->first();

        if($is_exit !=NULL){
            $items = json_decode($is_exit->items,true);
            foreach($items as $key=>$value){
                if($value['uuid'] == $request->id){
                    
                    $items[$key]['description'] = $request->description;
                }      
            }
            $is_exit->update(['items'=>json_encode($items)]);
            return response()->json(['message' => 'Description saved successfully']);
        }else{
            return response()->json(['message' => 'Menu item not found']);
        }

        
     }

}
