<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('auth')->group(function() {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
});

Route::middleware('auth:api')->group(function() {
    Route::post('logout', 'AuthController@logout');
    Route::get('get-all-users', 'UserController@getAllUsers');
    Route::middleware('verify_user')->prefix('user')->group(function () {
        Route::get('user-detail/{id}', 'UserController@getUserDetail');
        Route::post('delete-user/{id}', 'UserController@deleteUser');
        Route::put('update-user/{id}', 'UserController@updateUser');
        Route::put('change-user-status/{id}', 'UserController@changeStatus');
    });
});
