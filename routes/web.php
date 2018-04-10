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

Route::get('/', 'DocumentController@index')->name('index');

Route::post('import', 'DocumentController@import')->name('import');
Route::get('export', 'DocumentController@export')->name('export');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
