<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FilesystemTrait;
use App\Models\TeamCategory;

class Team extends Model
{
    use HasFactory,FilesystemTrait;

    protected $fillable = [
        'name',
        'slug',
        'post',
        'description',
        'image',
        'status',
        'order',
        'team_category_id',
    ];

    public function teamCategory(){
        return $this->belongsTo(TeamCategory::class,'team_category_id');
    }
}
