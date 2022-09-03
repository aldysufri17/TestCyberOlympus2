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
    return view('home');
});

Route::get('/home', 'HomeController@index')->name('home');
// product
Route::get('/product', 'HomeController@product')->name('product');
// customer
Route::get('/customer', 'HomeController@customer')->name('customer');
Route::get('/agent', 'HomeController@agent')->name('agent');
// orders
Route::get('/orders', 'HomeController@order')->name('orders');
Route::get('/order/detail/{id}', 'HomeController@orderDetail')->name('order.detail');
// Search
Route::get('/search', 'HomeController@search');
Route::get('/filter', 'HomeController@filter');
