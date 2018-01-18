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

Route::prefix('v')->group(function () {
  Route::get('micuenta', 'AccountController@index')->name('myaccount');
  Route::post('micuenta/{id}', 'AccountController@update')->name('updateaccount');
  Route::resource('products', 'ProductController');
});

Route::get('/productos', 'FrontProductController@index')->name('front.products.index');
Route::get('/productos/{id}', 'FrontProductController@show')->name('front.products.show');


Route::get('talles', 'ProductController@sizes');
