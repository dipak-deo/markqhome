<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FilesystemTrait;

class Testmonial extends Model
{
    use HasFactory,FilesystemTrait;

    protected $fillable = [
        'approved_by',
        'name',
        'email',
        'phone',
        'image',
        'company_logo',
        'post',
        'description',
        'status',
        'rating'
    ];

    public function image(){
        return ($this->image) ? url($this->image) : url('no_image.png');
    }

    public function company_logo(){
        return ($this->company_logo) ? url($this->company_logo) : url('no_image.png');
    }
}
