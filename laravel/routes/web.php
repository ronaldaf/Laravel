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

Route::get('/home', 'HomeController@index')->name('home');


//Route nggawe dewe
Route::get('/dashboard','DashboardController@index');

Route::get('/transaksi','TransaksiController@index');
Route::get('/transaksi/tambah','TransaksiController@tambah');
Route::post('/transaksi/proses','TransaksiController@proses');
Route::get('/transaksi/hapus/{id}','TransaksiController@hapus');

Route::get('/customer','CustomerController@index');
Route::get('/customer/tambah','CustomerController@tambah');
Route::get('/customer/edit/{id}','CustomerController@edit');
Route::get('/customer/hapus/{id}','CustomerController@hapus');
Route::post('/customer/proses','CustomerController@proses');
Route::post('/customer/update','CustomerController@update');
Route::get('/customer/cari','CustomerController@cari');