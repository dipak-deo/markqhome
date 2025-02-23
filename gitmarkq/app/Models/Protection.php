<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Protection extends Model
{
    use HasFactory;

    protected $fillable = [
        'protected_id',
        'model_name',
    ];

    public function page(){
        return $this->belongsTo(Page::class,'protected_id');
	
    }
}
