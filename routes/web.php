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
    return view('welcome');
});
Route::get('beranda', function() {
    return view('beranda');
});

// pelanggan
Route::resource('pelanggan','PelangganController');
Route::get('/index', 'PelangganController@index')->name('pelanggan.index');
Route::get('/create', 'PelangganController@create')->name('pelanggan.create');
Route::get('/edit', 'PelangganController@edit')->name('pelanggan.edit');
Route::get('/edit/{id}', 'PelangganController@edit')->name('pelanggan.edit');
Route::get('/show', 'PelangganController@show')->name('pelanggan.show');
Route::get('/show/{id}', 'PelangganController@show')->name('pelanggan.show');
Route::post('/store', 'PelangganController@store')->name('pelanggan.store');
Route::put('/update/{id}', 'PelangganController@update')->name('pelanggan.update');
Route::delete('/destroy', 'PelangganController@destroy')->name('pelanggan.destroy');
Route::delete('/destroy{id}', 'PelangganController@destroy')->name('pelanggan.destroy');