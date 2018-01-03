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
    return view('index');
});

Route::resource('customers', 'CustomersController');
Route::resource('orders', 'ordersController');
Route::resource('items', 'itemsController');
Route::resource('receipt_vouchers', 'rec_vouchersController');

// jquery function used in orders.create page to search for client name
Route::get('find-customer', 'CustomersController@findCustomer');

Route::post('items-add', 'ItemsController@store');