<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FilesystemTrait;

class SkipAds extends Model
{
    use HasFactory,FilesystemTrait;

    protected $fillable = [
        'title',
        'image',
        'ads_link',
        'type',
        'status',
    ] ;
}
