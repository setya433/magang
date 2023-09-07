<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::get('/barang','App\Http\Controllers\BarangController@index')->name("barang.index");
Route::get('/barang/tambahbarang','App\Http\Controllers\BarangController@tambahbarang')->name("barang.tambahbarang");
Route::post('/barang/store','App\Http\Controllers\BarangController@store')->name("barang.store");
Route::get('/barang/edit/{id}','App\Http\Controllers\BarangController@editbarang')->name("barang.editbarang");
Route::post('/barang/update','App\Http\Controllers\BarangController@update')->name("barang.update");
Route::get('/barang/hapus/{id}','App\Http\Controllers\BarangController@delete')->name("barang.delete");

Route::get('/customer','App\Http\Controllers\CustomerController@customerindex')->name("customer.customerindex");
Route::get('/customer/tambahcustomer','App\Http\Controllers\CustomerController@tambahcustomer')->name("customer.tambahcustomer");
Route::post('/customer/store','App\Http\Controllers\CustomerController@store')->name("customer.store");
Route::get('/customer/edit/{id}','App\Http\Controllers\CustomerController@editcustomer')->name("customer.editcustomer");
Route::post('/customer/update','App\Http\Controllers\CustomerController@update')->name("customer.update");
Route::get('/customer/hapus/{id}','App\Http\Controllers\CustomerController@delete')->name("customer.delete");

Route::get('/transaksi','App\Http\Controllers\TransaksiController@index')->name("transaksi.index");
Route::get('/transaksi/tambahtransaksi','App\Http\Controllers\TransaksiController@create')->name("transaksi.tambahtransaksi");
Route::post('/transaksi/store','App\Http\Controllers\TransaksiController@store')->name("transaksi.store");
Route::get('/transaksi/edit/{id}','App\Http\Controllers\TransaksiController@edittransaksi')->name("transaksi.edittransaksi");
Route::post('/transaksi/update','App\Http\Controllers\TransaksiController@update')->name("transaksi.update");
Route::get('/transaksi/hapus/{id}/','App\Http\Controllers\transaksiController@delete')->name("transaksi.delete");
//Route::get('/transaksi','App\Http\Controllers\TransaksiController@total')->name("transaksi.total");
//Route::delete('/transaksi/{id}', 'TransaksiDetailController@destroy')->name('transaksi.destroy');
//Route::post('/transaksi/store', 'App\Http\Controllers\transaksiController@kondisistok')->name("transaksi.kondisistok");
//Route::put('/transaksi/update/{id}', 'TransaksiController@update')->name('transaksi.update');

