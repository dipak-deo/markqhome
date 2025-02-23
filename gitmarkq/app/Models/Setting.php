<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FilesystemTrait;

class Setting extends Model
{
    use HasFactory, FilesystemTrait;

    protected $fillable = [
        'meta_key',
        'meta_value',
        'autoload',
    ];
}
