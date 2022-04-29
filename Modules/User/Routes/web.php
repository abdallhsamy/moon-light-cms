<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\UserController;

//Route::prefix('user')->group(function() {
    Route::resource('users', UserController::class);
//});
