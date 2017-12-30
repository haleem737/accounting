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

Route::resource('customers', 'CustomersController');
Route::resource('orders', 'ordersController');

// jquery function used in orders.create page to search for client name
Route::get('find-customer', 'CustomersController@findCustomer');