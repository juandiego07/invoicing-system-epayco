<?php

use Illuminate\Support\Facades\DB;
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

Route::get('/', 'App\Http\Controllers\HomeController@index')
    ->middleware('auth')
    ->name('home');
Route::get('/home/{status}', 'App\Http\Controllers\HomeController@show')
    ->middleware('auth')
    ->name('home.show');

Route::get('/register', 'App\Http\Controllers\RegisterController@create')
    ->middleware('guest')
    ->name('register');
Route::post('/register', 'App\Http\Controllers\RegisterController@store')
    ->name('register.store');

Route::get('/login', 'App\Http\Controllers\SessionController@create')
    ->middleware('guest')
    ->name('login');
Route::post('/login', 'App\Http\Controllers\SessionController@store')
    ->name('login.store');
Route::get('/logout', 'App\Http\Controllers\SessionController@destroy')
    ->middleware('auth')
    ->name('login.destroy');

Route::get('/customer', 'App\Http\Controllers\CustomerController@create')
    ->middleware('auth')
    ->name('customer');
Route::get('/customer/{id}', 'App\Http\Controllers\CustomerController@edit')
    ->middleware('auth')
    ->name('customer.edit');
Route::post('/customer/update', 'App\Http\Controllers\CustomerController@update')
    ->middleware('auth')
    ->name('customer.update');
Route::post('/customer', 'App\Http\Controllers\CustomerController@store')
    ->name('customer.store');

Route::get('/bill', 'App\Http\Controllers\BillController@create')
    ->middleware('auth')
    ->name('bill');
Route::post('/bill', 'App\Http\Controllers\BillController@store')
    ->name('bill.store');
Route::get('/bill/{id}', 'App\Http\Controllers\BillController@edit')
    ->name('bill.edit');
