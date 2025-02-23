<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PropertyCategory;

class PropertyMeta extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'meta_key',
        'meta_value',
    ];

    public function category()
    {
        return $this->belongsTo(PropertyCategory::class, 'property_id');
    }
}
