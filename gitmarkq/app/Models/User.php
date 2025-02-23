<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\FilesystemTrait;

class User extends Authenticatable
{
    use HasFactory, Notifiable, FilesystemTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'first_name',
        'last_name',
        'username',
        'email',
        'phone',
        'email_verified_at',
        'password',
        'image',
        'user_type',
        'is_active',
        'is_admin',
        'is_verified',
        'is_deleted',
        'is_blocked',
        'is_online',
        'ip_address',
        'last_login_address',
        'device',
        'browser',
        'platform',
        'language',
        'country',
        'city',
        'zip',
        'timezone',
        'currency',
        'currency_code',
        'currency_symbol',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
