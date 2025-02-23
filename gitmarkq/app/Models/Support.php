<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'file',
        'description',
        'reply',
        'priority',
        'remarks',
        'status',
        'is_viewed',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    /**
     * priority = low,high
     */
}
