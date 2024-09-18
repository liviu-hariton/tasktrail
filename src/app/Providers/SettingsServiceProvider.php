<?php

namespace App\Providers;

use App\Models\Settings;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Load all site specific settings from the database and cache them
        $_ttr_settings = (object) Cache::rememberForever('_ttrs', function () {
            return Settings::all()
                ->keyBy('key')
                ->transform(fn ($setting) => $setting->value)
                ->toArray();
        });

        // Merge the site specific settings with the Laravel config
        config([
            '_ttrs' => $_ttr_settings
        ]);

        // Share the site specific settings with all views
        View::share('_ttrs', $_ttr_settings);
    }
}
