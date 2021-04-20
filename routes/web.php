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
Route::get('beranda', function () {
    return view('beranda');
});
Route::get('/berandaUser', function () {
    return view('berandaUser');
});

// kategori
Route::resource('kategori', 'KategoriController');
Route::get('/index', 'KategoriController@index')->name('kategori.index');
Route::get('/create', 'KategoriController@create')->name('kategori.create');
Route::get('/edit', 'KategoriController@edit')->name('kategori.edit');
Route::get('/edit/{id}', 'KategoriController@edit')->name('kategori.edit');
Route::get('/show', 'KategoriController@show')->name('kategori.show');
Route::get('/show/{id}', 'KategoriController@show')->name('kategori.show');
Route::post('/store', 'KategoriController@store')->name('kategori.store');
Route::put('/update/{id}', 'KategoriController@update')->name(
    'kategori.update'
);
Route::delete('/destroy', 'KategoriController@destroy')->name(
    'kategori.destroy'
);
Route::delete('/destroy{id}', 'KategoriController@destroy')->name(
    'kategori.destroy'
);

// pelanggan
Route::resource('pelanggan', 'PelangganController');
Route::get('/index', 'PelangganController@index')->name('pelanggan.index');
Route::get('/create', 'PelangganController@create')->name('pelanggan.create');
Route::get('/edit', 'PelangganController@edit')->name('pelanggan.edit');
Route::get('/edit/{id}', 'PelangganController@edit')->name('pelanggan.edit');
Route::get('/show', 'PelangganController@show')->name('pelanggan.show');
Route::get('/show/{id}', 'PelangganController@show')->name('pelanggan.show');
Route::post('/store', 'PelangganController@store')->name('pelanggan.store');
Route::put('/update/{id}', 'PelangganController@update')->name(
    'pelanggan.update'
);
Route::delete('/destroy', 'PelangganController@destroy')->name(
    'pelanggan.destroy'
);
Route::delete('/destroy{id}', 'PelangganController@destroy')->name(
    'pelanggan.destroy'
);

//makanan
Route::resource('makanan', 'MakananController');
Route::get('/index', 'MakananController@index')->name('makanan.index');
Route::get('/create', 'MakananController@create')->name('makanan.create');
Route::get('/edit', 'MakananController@edit')->name('makanan.edit');
Route::get('/edit/{id}', 'MakananController@edit')->name('makanan.edit');
Route::get('/show', 'MakananController@show')->name('makanan.show');
Route::get('/show/{id}', 'MakananController@show')->name('makanan.show');
Route::post('/store', 'MakananController@store')->name('makanan.store');
Route::put('/update/{id}', 'MakananController@update')->name('makanan.update');
Route::delete('/destroy', 'MakananController@destroy')->name('makanan.destroy');
Route::delete('/destroy{id}', 'MakananController@destroy')->name(
    'makanan.destroy'
);
Route::get('/makananUser', 'makananController@index2')->name('makananUser');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');