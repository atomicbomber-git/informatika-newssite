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
    return view('welcome');
});

Auth::routes();

Route::get('/', 'GuestHomeController@show')->name('guest.home.show');

Route::get("/admin", function () {
    return redirect()->route("artikel.index");
});

Route::group(['prefix' => '/artikel', 'as' => 'artikel.'], function() {
    Route::get('/show/{artikel}', 'ArtikelController@show')->name('show');
    Route::get('/index', 'ArtikelController@index')->name('index');
    Route::get('/create', 'ArtikelController@create')->name('create');
    Route::post('/store', 'ArtikelController@store')->name('store');
    Route::get('/edit/{artikel}', 'ArtikelController@edit')->name('edit');
    Route::post('/update/{artikel}', 'ArtikelController@update')->name('update');
    Route::post('/delete/{artikel}', 'ArtikelController@delete')->name('delete');
    Route::get('/main_image/{artikel}', 'ArtikelController@mainImage')->name('main_image');
});

Route::group(['prefix' => '/guest-artikel', 'as' => 'guest-artikel.'], function() {
    Route::get('/index', 'GuestArticleController@index')->name('index');
    Route::get('/show/{artikel}', 'GuestArticleController@show')->name('show');
});