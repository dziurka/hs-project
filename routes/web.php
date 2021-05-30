<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return response('HSTest API v. 1.0.0');
});

// Get CSRF Token by cookie
Route::get('api/v1/csrf-cookie', [\App\API\Auth\Controllers\CsrfCookieController::class, 'show']);
