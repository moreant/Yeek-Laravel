<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('user')->group(function () {
    Route::any('login', 'Api\UserController@login');
    Route::any('info', 'Api\UserController@info');
    Route::any('logout', 'Api\UserController@logout');
});

Route::prefix('work')->group(function () {
    Route::any('info', 'Api\WorkController@info');
    Route::any('upload', 'Api\WorkController@upload');
});