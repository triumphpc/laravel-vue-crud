<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

// Auth route
Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, "login"]);
    Route::get("refresh", [AuthController::class, "refresh"]);
    Route::get("user", [AuthController::class, "user"]);

});

// SP entrypoint
Route::get('{any}', function () {
    return view('app');
})->where('any', '.*');
