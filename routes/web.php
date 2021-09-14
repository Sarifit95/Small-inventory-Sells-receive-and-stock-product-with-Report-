<?php

use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login');
});
//Route::get('/login', 'CustomerController@login')->name('login');


Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
Route::group([ 'middleware' => ['auth']], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('products', 'App\Http\Controllers\ProductController');
    Route::resource('customers', 'App\Http\Controllers\CustomerController');
    Route::resource('vendors', 'App\Http\Controllers\VendorController');
    Route::resource('sells', 'App\Http\Controllers\SellsController');


    Route::post('getproduct', [App\Http\Controllers\SellsController::class, 'getproduct'])->name('getproduct');

    Route::get('/sells/voucher/{id}', [App\Http\Controllers\SellsController::class, 'voucher'])->name('voucher');

    Route::resource('receive', 'App\Http\Controllers\ReceiveController');
    Route::post('receive/getproduct', [App\Http\Controllers\ReceiveController::class, 'getproduct'])->name('receive.getproduct');
    Route::get('/receive/voucher/{id}', [App\Http\Controllers\ReceiveController::class, 'voucher'])->name('receive.voucher');

    Route::resource('sellsreport', 'App\Http\Controllers\SellsreportController');
    Route::resource('receivereport', 'App\Http\Controllers\ReceivereportController');
    Route::resource('stockreport', 'App\Http\Controllers\StockreportController');


});
