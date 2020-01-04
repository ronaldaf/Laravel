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

Route::get('/show_data','nilaiController@show_data');

Route::get('/tugas_6','nilaiController@tugas_6');

Route::get('/show_ci','nilaiController@show_ci');

Route::get('/nilaimhs','nilaiController@index')->name('nilaimhs');
Route::resource('mhs','nilaiController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
