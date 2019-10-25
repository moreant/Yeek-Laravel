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
        Route::get('/console', 'WorkController@console');
        Route::get('/save', 'WorkController@save');
        Route::get('/update/{id}', 'WorkController@update');
        Route::get('/delete/{id}', 'WorkController@delete');
        Route::get('/test', 'WorkController@test');
        Route::get('/info/{id}', 'WorkController@info');
        Route::any('/uploadFile','FileController@input');
        Route::any('/download/{dir}','FileController@download');
    });
});

Route::any('/t', 'FileController@download');

Route::any('/t2', 'FileController@zip');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
