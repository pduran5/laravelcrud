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
Auth::routes();

Route::get('/', 'ItemController@index')->middleware('auth');

Route::get('items', 'ItemController@index')->middleware('auth');

Route::get('items/create', 'ItemController@create')->middleware('auth');
Route::post('items/create', 'ItemController@store')->middleware('auth');

Route::get('items/update/{id}', 'ItemController@updateForm')->middleware('auth');
Route::post('items/update', 'ItemController@update')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');
