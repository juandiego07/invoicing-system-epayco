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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    return view('home');
})->name('home')->middleware('auth');

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

Route::get('/client', 'App\Http\Controllers\ClientController@create')
    ->middleware('auth')
    ->name('client');

Route::post('/client', 'App\Http\Controllers\ClientController@store')
    ->name('client.store');
