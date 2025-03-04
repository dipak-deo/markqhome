<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildQuitsMeta extends Model
{
    use HasFactory;

    protected $fillable = ['build_quit_id','meta_key','meta_value'];
}
