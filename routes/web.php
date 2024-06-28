<?php

use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes([
    'register' => false,
    'confirm' => false,
    'verify' => false
]);

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware(['auth'])
    ->group(
        function() {
            Route::get('/dashboard', [Dashboard::class, 'index'])
                ->name('dashboard');
        }
    );
