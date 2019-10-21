<?php

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
    return view('myWelcome');
});

Route::group(['middleware' => 'web'], function () {
    Route::prefix('work')->group(function () {
        Route::get('/', 'WorkController@index')->name('work');
        Route::get('/create', 'WorkController@create');
        Route::get('/save', 'WorkController@save');
        Route::any('/info/{id}', 'WorkController@info');
        Route::any('/upload', 'WorkController@upload');
        Route::get('/test', 'WorkController@test');
    });
});

Route::any('/t', 'WorkController@test');

Route::any('/fa', 'FileUploadController@add');
