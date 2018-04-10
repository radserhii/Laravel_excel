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

Route::post('import', 'ImportController@import')->name('import');
Route::get('export', 'ExportController@export')->name('export');

Route::resource('/', 'DocumentController')->only(['index']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
