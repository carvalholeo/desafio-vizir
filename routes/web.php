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

Route::get('', 'PriceController@index')->name('home');

Route::get('charge', 'PriceController@charge')->name('tarifas');

Route::get('falemais', 'PriceController@falemais')->name('falemais');

Route::get('about', 'PriceController@about')->name('about');
