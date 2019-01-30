<?php

use App\User;
use App\Invoice;
use App\Internet;
use App\Packservice;

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

Route::resource('/users','UserController');

Route::get('/admin',function () {
    return view('admin/index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
