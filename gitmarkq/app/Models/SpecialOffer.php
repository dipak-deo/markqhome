<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FilesystemTrait;

class SpecialOffer extends Model
{
    use HasFactory,FilesystemTrait;

    protected $fillable = ['property_id','title','image','price'];

    public function image(){
        return ($this->image) ? url($this->image) : url('no_image.jpg');
    }
}
