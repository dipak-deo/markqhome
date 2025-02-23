<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'site_title' => 'Indra Basnet',
            'fabicon' => 'https://indrabasnet.com.np/home/img/ib.jpg',
            'address' => 'Default address',
            'phone' => 'xxxxxxxxxxxxx',
            'email' => 'xxxxxxxxxxxxx',
            'logo' => 'https://indrabasnet.com.np/home/img/ib.jpg', 
            'maintenence_mode' => 0,          
        ];

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(['meta_key' => $key], ['meta_value' => $value]);
        }

    }
}
