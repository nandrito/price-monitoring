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

Route::get('/products', 'ProductController@index')->name('products');
Route::post('/products/store', 'ProductController@store')->name('products.store');
Route::get('/products/list', 'ProductController@list')->name('products.list');
Route::get('/products/show/{productModel}', 'ProductController@show')->name('products.show');
//Route::get('/updateprice', 'PriceController@updatePrice');
Route::post('/updateprice', 'PriceController@updatePrice')->name('updateprice');