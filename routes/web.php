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

//Routes client
Route::resource('client', 'ClientController');
//Routes client

//Routes area
Route::resource('area', 'AreaController');
Route::get('getAllAreas', 'AreaController@getAll');
//Routes area