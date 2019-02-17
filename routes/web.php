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

Route::get('/','Auth\LoginController@loggeado');

Route::post('login','Auth\LoginController@login')->name('login');

Route::post('logout','Auth\LoginController@logout')->name('logout');

//------------Users------------------
Route::get('/users','UserController@index')->name('user');

Route::get('/users/create','UserController@create');

Route::post('/users','UserController@store');

//---------------Packservice---------------
Route::get('/admin','PackserviceController@index')->name('admin');

Route::post('/admin','PackserviceController@store')->name('admin/store');

//---------------Cable------------------
Route::post('/admin/cable','CableController@store')->name('cable/store');

//------------------Internet--------------
Route::post('/admin/internet','InternetController@store')->name('internet/store');

//----------------Telephone-------------------
Route::post('/admin/telephone','TelephoneController@store')->name('telephone/store');

//----------------Channel------------------
Route::post('/admin/channel','ChannelController@store')->name('channel/store');

//-------------------Programation----------------
Route::post('/admin/programation','ProgramationController@store')->name('programation/store');

//------------------Invoice----------------------
Route::post('/admin/invoice','InvoiceController@store')->name('invoice/store');

//--------------------Plan------------------
Route::post('/users/plan','PlanController@store')->name('plan/store');
