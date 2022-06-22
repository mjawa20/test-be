<?php

use App\Http\Controllers\Barang;
use App\Http\Controllers\Customer;
use App\Http\Controllers\Sales;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Transaksi;

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

Route::resource('api/transaksi', Transaksi::class)->except([
    'create', 'update'
]);
Route::resource('api/barang', Barang::class)->except([
    'create', 'update'
]);
Route::resource('api/sales', Sales::class)->except([
    'create', 'update'
]);
Route::resource('api/customer', Customer::class)->except([
    'create', 'update'
]);