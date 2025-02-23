<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BuildQuit;
use App\Models\Property;
use App\Models\PropertyMeta;
use App\Models\FloorPlan;
use App\Models\BuildQuitsMeta;
use App\Models\HomeStyle;
use App\Models\Inclusion;
use App\Models\UpgrateType;
use App\Models\LandScaping;
use App\Models\SpecialOffer;

class BuildQuitsController extends Controller
{
    public function start()
    {
  
        return view('home.buildquits.start');
    }

    public function start_post(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);
        $data = $request->all();
        $lastInsert = BuildQuit::create($data);
        return redirect()->route('home.build-quits.step_one', ['id' => $lastInsert->id]);

    }

    public function step_one(){
        return view('home.buildquits.step-1');
    }

    public function step_one_sub( Request $request)
    {
        // dd($request->all());
        if(!$request->has('home_type')){
            return redirect()->back()->with('error_message','Please select home type');
        }
        $desire_data = Property::join('property_metas', 'properties.id', '=', 'property_metas.property_id')
            ->where('property_metas.meta_key', 'home_types')
            ->where('property_metas.meta_value', $request->home_type)
            ->select('properties.*')
            ->where('status','publish')
            ->get();
            // dd($desire_data);
        return view('home.buildquits.step-1-1',compact('desire_data'));
    }

    public function step_two(Request $request){
        if(!$request->has('property-id')){
            return redirect()->back()->with('error_message', 'Please select property');
        }
        $floorplan =  FloorPlan::where('property_id', request()->get('property-id'))->get();
        $property = Property::find(request()->get('property-id'));
        return view('home.buildquits.step-2',compact('floorplan','property'));
    }

    public function update_floor_plan(Request $request)
    {
        $data =  $request->all();
        // dd($data);
        if($data['checked'] ==  'true'){
            $df = [
                'build_quit_id' => $data['build_quits_id'],
                'meta_key' => 'floor_plan',
                'meta_value' => $data['floor_plan']
            ];
            BuildQuitsMeta::updateorCreate($df);
            return response()->json(['success' => 'Floor plan updated successfully.']);

            // $key = ['floor_plan']
        }else{
            BuildQuitsMeta::where('build_quit_id', $data['build_quits_id'])->where('meta_key', 'floor_plan')->where('meta_value', $data['floor_plan'])->delete();
            return response()->json(['success' => 'Floor plan updated successfully.']);
        }
    }

    public function step_three(Request $request){

        if(!$request->has('property-id')){
            return redirect()->back()->with('error_message', 'Please select property');
        }
       $facades = HomeStyle::where('property_id', request()->get('property-id'))->get();
       $property = Property::find(request()->get('property-id'));
       $totalAmount = $property->price;
       $floorplan =  FloorPlan::where('property_id', request()->get('property-id'))->get();
       $bf = get_buildquit_meta(request()->get('id'),'floor_plan');
       foreach($floorplan as $floor){
        if($bf !=NULL && $floor->id == $bf->meta_value){
            $totalAmount += $floor->price;
        }
        // $totalAmount += $floor->price;
       }
        return view('home.buildquits.step-3',compact('facades','totalAmount'));
    }
    public function step_four(Request $request){
        if(!$request->has('property-id')){
            return redirect()->back()->with('error_message', 'Please select property');
        }
        $ins = Inclusion::where('property_id', request()->get('property-id'))->get();
        return view('home.buildquits.step-4',compact('ins'));
    }
    public function step_five(Request $request){
        if(!$request->has('property-id')){
            return redirect()->back()->with('error_message', 'Please select property');
        }

        $upgrate_type = UpgrateType::where('property_id', request()->get('property-id'))->get();

        $facades = HomeStyle::find(request()->get('property-id'));
        $property = Property::find(request()->get('property-id'));
        $totalAmount = $property->price;
        $floorplan =  FloorPlan::where('property_id', request()->get('property-id'))->get();
        $bf = get_buildquit_meta(request()->get('id'),'floor_plan');
        foreach($floorplan as $floor){
         if($bf !=NULL && $floor->id == $bf->meta_value){
             $totalAmount += $floor->price;
         }
         // $totalAmount += $floor->price;
        }
        $totalAmount += $facades->price;
        return view('home.buildquits.step-5',compact('upgrate_type','totalAmount'));
    }
    public function step_six(Request $request){
        if(!$request->has('property-id')){
            return redirect()->back()->with('error_message', 'Please select property');
        }

        

        $facades = HomeStyle::find(request()->get('property-id'));
        $property = Property::find(request()->get('property-id'));
        $totalAmount = $property->price;
        $floorplan =  FloorPlan::where('property_id', request()->get('property-id'))->get();
        $bf = get_buildquit_meta(request()->get('id'),'floor_plan');
        foreach($floorplan as $floor){
         if($bf !=NULL && $floor->id == $bf->meta_value){
             $totalAmount += $floor->price;
         }
         // $totalAmount += $floor->price;
        }
       
        $totalAmount += $facades->price;
        // $upgrate_type = UpgrateType::find(request()->get('upgrate_type'));
        if(request()->get('upgrate_type') !=NULL && request()->get('upgrate_type_item') !=NULL){
            $upgrate_type = get_upgrateType_meta(request()->get('upgrate_type'),request()->get('upgrate_type_item'));
            $totalAmount += $upgrate_type['price'];
        }
        $landscaping = LandScaping::where('property_id', request()->get('property-id'))->get();
        return view('home.buildquits.step-6',compact('totalAmount','landscaping'));
    }
    public function step_seven( Request $request){

        if(!$request->has('property-id')){
            return redirect()->back()->with('error_message', 'Please select property');
        }

        

        $facades = HomeStyle::find(request()->get('property-id'));
        $property = Property::find(request()->get('property-id'));
        $totalAmount = $property->price;
        $floorplan =  FloorPlan::where('property_id', request()->get('property-id'))->get();
        $bf = get_buildquit_meta(request()->get('id'),'floor_plan');
        foreach($floorplan as $floor){
         if($bf !=NULL && $floor->id == $bf->meta_value){
             $totalAmount += $floor->price;
         }
         // $totalAmount += $floor->price;
        }
       
        $totalAmount += $facades->price;
        // $upgrate_type = UpgrateType::find(request()->get('upgrate_type'));
        if(request()->get('upgrate_type') !=NULL && request()->get('upgrate_type_item') !=NULL){
            $upgrate_type = get_upgrateType_meta(request()->get('upgrate_type'),request()->get('upgrate_type_item'));
            $totalAmount += $upgrate_type['price'];
        }
        $landscaping = LandScaping::find(request()->get('landscaping_id'));
        $totalAmount += $landscaping->price;
        $special_offer = SpecialOffer::where('property_id', request()->get('property-id'))->get();
        return view('home.buildquits.step-7',compact('totalAmount','special_offer'));
    }
    public function step_eight(Request $request){

        if(!$request->has('property-id')){
            return redirect()->back()->with('error_message', 'Please select property');
        }

        

        $facades = HomeStyle::find(request()->get('property-id'));
        $property = Property::find(request()->get('property-id'));
        $totalAmount = $property->price;
        $floorplan =  FloorPlan::where('property_id', request()->get('property-id'))->get();
        $bf = get_buildquit_meta(request()->get('id'),'floor_plan');
        foreach($floorplan as $floor){
         if($bf !=NULL && $floor->id == $bf->meta_value){
             $totalAmount += $floor->price;
         }
         // $totalAmount += $floor->price;
        }
       
        $totalAmount += $facades->price;
        // $upgrate_type = UpgrateType::find(request()->get('upgrate_type'));
        if(request()->get('upgrate_type') !=NULL && request()->get('upgrate_type_item') !=NULL){
            $upgrate_type = get_upgrateType_meta(request()->get('upgrate_type'),request()->get('upgrate_type_item'));
            $totalAmount += $upgrate_type['price'];
        }
        $landscaping = LandScaping::find(request()->get('landscaping_id'));
        $totalAmount += $landscaping->price;
        $special_offer = SpecialOffer::find(request()->get('special_offer'));
        $totalAmount += $special_offer->price;
        $buildquit = BuildQuit::find(request()->get('id'));
        return view('home.buildquits.step-8',compact('totalAmount','buildquit'));
    }

    public function step_eight_post(Request $request)
    {
        if(!$request->has('property-id')){
            return redirect()->back()->with('error_message', 'Please select property');
        }

        

        $facades = HomeStyle::find(request()->get('property-id'));
        $property = Property::find(request()->get('property-id'));
        $totalAmount = $property->price;
        $floorplan =  FloorPlan::where('property_id', request()->get('property-id'))->get();
        $bf = get_buildquit_meta(request()->get('id'),'floor_plan');
        foreach($floorplan as $floor){
         if($bf !=NULL && $floor->id == $bf->meta_value){
             $totalAmount += $floor->price;
         }
         // $totalAmount += $floor->price;
        }
       
        $totalAmount += $facades->price;
        // $upgrate_type = UpgrateType::find(request()->get('upgrate_type'));
        if(request()->get('upgrate_type') !=NULL && request()->get('upgrate_type_item') !=NULL){
            $upgrate_type = get_upgrateType_meta(request()->get('upgrate_type'),request()->get('upgrate_type_item'));
            $totalAmount += $upgrate_type['price'];
        }
        $landscaping = LandScaping::find(request()->get('landscaping_id'));
        $totalAmount += $landscaping->price;
        $special_offer = SpecialOffer::find(request()->get('special_offer'));
        $totalAmount += $special_offer->price;


        $buildquit = BuildQuit::find(request()->get('id'));

        $data = $request->all();
        $data['home_type'] = request()->get('home_type');
        $data['home_design_id'] = request()->get('property-id');
        // $data['home_plan_id']
        $data['home_style_id'] = request()->get('facade_id');
        $data['upgrate_type_id'] = request()->get('upgrate_type');
        $data['inclusion_id'] = request()->get('upgrate_type_item');
        $data['landscaping_package_id'] = request()->get('landscaping_id');
        $data['special_offer_id'] = request()->get('special_offer');
        $buildquit->update($data);

        // $meta['total_amount'] = $totalAmount;
        BuildQuitsMeta::updateorCreate(['build_quit_id' => $buildquit->id, 'meta_key' => 'total_amount', 'meta_value' => $totalAmount]);

        return redirect()->route('home')->with('success_message', 'Build quit updated successfully.');

    }
}
