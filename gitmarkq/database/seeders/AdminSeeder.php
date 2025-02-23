<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Str;
use Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'uuid' => Str::uuid(),
            'user_type' => 'super_admin',
            'is_admin' => 1,
            'email' => 'basnetindra342@gmail.com',
            'password' => Hash::make(12345678),
            'image' => 'ib.png',
            'username'=> 'superadmin123',
        ]);
    }
}
