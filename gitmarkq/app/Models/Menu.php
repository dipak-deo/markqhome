<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MenuItems;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'redirect_url',
        'order',
        'block_number',
        'location',
        'status',
        'mega_menu_header'
    ] ;

    public function submenuName()
    {
        return $this->belongsTo(Menu::class, 'id');
    }

    public function menublock()
    {
        return $this->hasMany(MenuItems::class, 'menu_id');
    }
}
