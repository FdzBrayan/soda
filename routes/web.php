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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Routes sale
Route::resource('sale', 'SaleController');
//Routes sale

//Routes client
Route::resource('client', 'ClientController');
Route::get('getAllClients', 'ClientController@getAll');
//Routes client

//Routes area
Route::resource('area', 'AreaController');
Route::get('getAllAreas', 'AreaController@getAll');
//Routes area

//Routes product
Route::resource('product', 'ProductController');
Route::get('getAllProducts', 'ProductController@getAll');
//Routes product

//Routes invoice
Route::resource('invoice', 'InvoiceController');
Route::get('getAllInvoices', 'InvoiceController@getAll');
//Routes invoice