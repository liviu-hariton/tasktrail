<?php

use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes([
    'register' => false,
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
