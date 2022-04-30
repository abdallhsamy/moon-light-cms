<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return Inertia::render('Home', ['test' => 'working']);
    })->name('home');

    Route::get('/about-us', function () {
        return Inertia::render('About', ['about_us' => 'working']);
    })->name('about-us');

    Route::prefix(config('core.backend_prefix'))->group(function () {
        Route::resource('users', UserController::class);
    });
});
