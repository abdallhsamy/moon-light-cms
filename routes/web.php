<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home', ['test' => 'working']);
})->name('home');

Route::get('/about-us', function () {
    return Inertia::render('About', ['about_us' => 'working']);
})->name('about-us');

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::prefix(config('core.backend_prefix'))->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('roles', RoleController::class);
    });
});
