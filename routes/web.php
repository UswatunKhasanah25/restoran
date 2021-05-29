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
Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Laporan', 'PemesananController1@index');
Route::get('/Laporan/print', 'PemesananController1@print');

Route::group(['middleware' => ['auth', 'role:customer']], function () {
    Route::get('/order/{id}', 'PemesananController@getPemesanan')->name(
        'getPemesanan'
    );
    Route::post('/order', 'PemesananController@postPemesanan')->name(
        'postPemesanan'
    );
    Route::get('/order-list', 'PemesananController@listPemesanan')->name(
        'listPemesanan'
    );
    Route::get(
        '/order/{id}/detail',
        'PemesananController@detailPemesanan'
    )->name('detailPemesanan');
    Route::post(
        '/order/{id}/cancel',
        'PemesananController@cancelPemesanan'
    )->name('cancelPemesanan');
    Route::get('/order-success', 'PemesananController@successPemesanan')->name(
        'successPemesanan'
    );
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'LoginController@showLoginForm')->name('getLogin');
    Route::post('/login', 'LoginController@login')->name('postLogin');
    Route::post('/logout', 'LoginController@logout')->name('logout-admin');
    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/', 'HomeController1@index');

        // kategori
        Route::resource('kategori', 'KategoriController');
        Route::get('/index', 'KategoriController@index')->name(
            'kategori.index'
        );
        Route::get('/create', 'KategoriController@create')->name(
            'kategori.create'
        );
        Route::get('/edit', 'KategoriController@edit')->name('kategori.edit');
        Route::get('/edit/{id}', 'KategoriController@edit')->name(
            'kategori.edit'
        );
        Route::get('/show', 'KategoriController@show')->name('kategori.show');
        Route::get('/show/{id}', 'KategoriController@show')->name(
            'kategori.show'
        );
        Route::post('/store', 'KategoriController@store')->name(
            'kategori.store'
        );
        Route::put('/update/{id}', 'KategoriController@update')->name(
            'kategori.update'
        );
        Route::delete('/destroy', 'KategoriController@destroy')->name(
            'kategori.destroy'
        );
        Route::delete('/destroy{id}', 'KategoriController@destroy')->name(
            'kategori.destroy'
        );

        // meja
        Route::resource('meja', 'MejaController');
        Route::get('/index', 'MejaController@index')->name('meja.index');
        Route::get('/create', 'MejaController@create')->name('meja.create');
        Route::post('/store', 'MejaController@store')->name('meja.store');
        Route::delete('/destroy', 'MejaController@destroy')->name(
            'meja.destroy'
        );
        Route::delete('/destroy{id}', 'MejaController@destroy')->name(
            'meja.destroy'
        );

        //makanan
        Route::resource('makanan', 'MakananController');
        Route::get('/index', 'MakananController@index')->name('makanan.index');
        Route::get('/create', 'MakananController@create')->name(
            'makanan.create'
        );
        Route::get('/edit', 'MakananController@edit')->name('makanan.edit');
        Route::get('/edit/{id}', 'MakananController@edit')->name(
            'makanan.edit'
        );
        Route::get('/show', 'MakananController@show')->name('makanan.show');
        Route::get('/show/{id}', 'MakananController@show')->name(
            'makanan.show'
        );
        Route::post('/store', 'MakananController@store')->name('makanan.store');
        Route::put('/update/{id}', 'MakananController@update')->name(
            'makanan.update'
        );
        Route::delete('/destroy', 'MakananController@destroy')->name(
            'makanan.destroy'
        );
        Route::delete('/destroy{id}', 'MakananController@destroy')->name(
            'makanan.destroy'
        );

        //pemesanan
        Route::get('/order/all', 'PemesananController1@index')->name(
            'all-order'
        );
        Route::get('/order/pending', 'PemesananController1@pending')->name(
            'pending-order'
        );
        Route::get('/order/{id}/detail', 'PemesananController1@detail')->name(
            'detail-order'
        );
        Route::post('/order/{id}/verify', 'PemesananController1@verify')->name(
            'verify-order'
        );
        Route::post('/order/{id}/remove', 'PemesananController1@remove')->name(
            'remove-order'
        );

        //customer
        Route::resource('customer', 'CustomerController');
        Route::get('/index', 'CustomerController@index')->name(
            'customer.index'
        );
        Route::get('/show', 'CustomerController@show')->name('customer.show');
        Route::get('/show/{id}', 'CustomerController@show')->name(
            'customer.show'
        );
        Route::delete('/destroy', 'CustomerController@destroy')->name(
            'customer.destroy'
        );
        Route::delete('/destroy{id}', 'CustomerController@destroy')->name(
            'customer.destroy'
        );
    });
});