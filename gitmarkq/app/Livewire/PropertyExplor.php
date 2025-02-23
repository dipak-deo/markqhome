<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PropertyType;
use App\Models\Property;

class PropertyExplor extends Component
{
    public function render()
    {
        $type = PropertyType::where('slug','design-collection')->first();
      
        if($type !=NULL){
            $design = Property::where('property_type_id', $type->id)
            ->take(3)
            ->orderBy('id', 'DESC')
            ->get();
        }else{
            $design = [];
        }
        return view('livewire.property-explor',compact('design'));
    }
}
