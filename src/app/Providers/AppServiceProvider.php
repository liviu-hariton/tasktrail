<?php

namespace App\Providers;

use App\Traits\Overall;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    use Overall;

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

        Paginator::useBootstrapFour();

        /**
         * Load all available Javascript language files
         */
        View::composer('*', function ($view) {
            $view->with('js_lang_files', $this->loadJavascriptLanguageFiles());

            $view->with('per_page_options', $this->getPerPageOptions());
        });

        /**
         * Directive for roles
         * Usage: @role('ROLE_NAME')
         */
        Blade::if('role', function ($role) {
            return auth()->check() && auth()->user()->hasRole($role);
        });

        /**
         * Directive for permissions
         * Usage: @permission('PERMISSION_NAME')
         */
        Blade::if('permission', function ($permission) {
            return auth()->check() && auth()->user()->hasPermission($permission);
        });
    }
}
