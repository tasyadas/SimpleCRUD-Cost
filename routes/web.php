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

Auth::routes();

//route ini akan memanggil fungsi index pada HomeController
Route::get('/', 'HomeController@index')->name('home');

//route ini akan memanggil fungsi index pada CostController
Route::get('pengeluaran', 'CostController@index')->name('pengeluaran');
// menampilkan halaman form tambah pengeluaran
Route::get('tambah-pengeluaran', 'CostController@create')->name('tambah_pengeluaran');
// menyimpan pengeluaran
Route::post('tambah-pengeluaran', 'CostController@store')->name('simpan_pengeluaran');
