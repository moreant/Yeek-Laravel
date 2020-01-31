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
        Route::get('/all', 'WorkController@all');
        Route::get('/console', 'WorkController@console')->middleware('auth');
        Route::get('/save', 'WorkController@save');
        Route::get('/update/{id}', 'WorkController@update');
        Route::get('/delete/{id}', 'WorkController@delete');
        Route::get('/netdisc', 'WorkController@netdisc');
        Route::get('/info/{id}', 'WorkController@info');
        Route::any('/uploadFile', 'FileController@input');
        Route::any('/download/{dir}', 'FileController@download');
        Route::any('/fileList', 'FileController@getFileList');
    });
});

Route::get('/ftp', function () {
    $coursesFtp =  DB::table('courses')->orderBy('classroom')->whereNotNull('ftp')->get();
    return view('ftp', ['coursesFtp' => $coursesFtp]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
