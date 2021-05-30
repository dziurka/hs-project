<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {

    // API test endpoint
    Route::get('echo', function () {
        return response()->json([]);
    })->name('echo');

    // Auth routes
    Route::prefix('auth')->group(function () {
        Route::post('login', [\App\API\Auth\Controllers\LoginController::class, 'login']);
        Route::post('register', [\App\API\Auth\Controllers\RegisterController::class, 'register']);
        Route::post('logout', [\App\API\Auth\Controllers\LogoutController::class, 'logout']);
    });

    // For logged
    Route::middleware('auth:sanctum')->group(function () {
        Route::prefix('user')->group(function () {
            Route::get('me', [\App\API\User\Controllers\UserController::class, 'show']);
        });
    });
});
