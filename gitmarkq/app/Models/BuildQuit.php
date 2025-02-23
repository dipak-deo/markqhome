<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildQuit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','email','phone','home_type','home_design_id','home_plan_id','home_style_id','upgrate_type_id','inclusion_id','landscaping_package_id','special_offer_id','first_name','last_name','build_address','location','property_types_id','remarks','status'
        
    ];
}
