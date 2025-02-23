<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (env('APP_ENV') !== 'local') {
            URL::forceScheme('https');
        }

        if (!app()->runningInConsole() && Schema::hasTable('settings')) {
            $site_setting = [];
            $settings = Setting::all();
            foreach ($settings as $key=>$setting) {
                $site_setting[$setting->meta_key] = $setting->meta_value;
            }
            $site_setting = (object) $site_setting;
            // dd($settings);
            view()->share('settings', $site_setting);
        }
    }
}
