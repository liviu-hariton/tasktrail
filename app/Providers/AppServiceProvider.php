<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        Model::shouldBeStrict();

        /**
         * Load all available Javascript language files
         */
        View::composer('*', function ($view) {
            $locale = str_replace('_', '-', app()->getLocale());

            $lang_path = public_path("assets/js/lang/".$locale);

            $js_lang_files = [];

            if(File::exists($lang_path)) {
                $js_lang_files = File::files($lang_path);
            }

            $view->with('js_lang_files', $js_lang_files);
        });
    }
}
