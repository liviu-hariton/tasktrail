<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Role;
use App\Http\Controllers\Setting;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes([
    'register' => false,
]);

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('setlocale/{locale}', function($locale) {
    session(['locale' => $locale]);

    return redirect()->back();
})->name('setlocale');

Route::middleware(['auth'])
    ->group(
        function() {
            // Ajax calls
            Route::patch('set-per-page-option', [Setting::class, 'setPerPageOption'])->name('set-per-page-option');

            // App routes
            Route::get('/dashboard', [Dashboard::class, 'index'])
                ->name('dashboard');

            Route::resource('/users', User::class);
            Route::resource('/roles', Role::class);
        }
    );
