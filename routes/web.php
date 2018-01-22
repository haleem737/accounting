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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth'])->group(function () {

    Route::resource('customers', 'CustomersController');
    Route::resource('orders', 'OrdersController');
    Route::resource('items', 'ItemsController');
    Route::resource('receipt_vouchers', 'Rec_vouchersController');
    Route::resource('invoices', 'InvoicesController');


    // jquery function used in orders.create page to search for client name
    Route::get('find-customer', 'CustomersController@findCustomer');

    Route::post('item-add', 'ItemsController@addItem');


    // Auth::routes();

});
