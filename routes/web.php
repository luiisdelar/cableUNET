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

Route::get('/','Auth\LoginController@loggeado')->name('start');

Route::post('login','Auth\LoginController@login')->name('login');

Route::post('logout','Auth\LoginController@logout')->name('logout');

//------------Users------------------
Route::get('/users','UserController@index')->name('user');

Route::get('/users/create','UserController@create')->name('user/create');

Route::post('/users','UserController@store');

Route::post('/admin/users/request','UserController@request')->name('admin/users/request');

//------------------Packchannel----------------------

Route::post('/users/packchannel','UserController@packChannel')->name('users/packchannel');

//---------------Packservice---------------
Route::get('/admin','PackserviceController@index')->name('admin');

Route::post('/admin','PackserviceController@store')->name('admin/store');

Route::get('/admin/users','UserController@list')->name('members');

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
Route::get('/admin/invoice','InvoiceController@index')->name('invoice');

//--------------------Plan------------------
Route::post('/users/plan','PlanController@store')->name('plan/store');

Route::get('/admin/plans','PlanController@authorization')->name('admin/plans');

Route::post('/admin/plans/accept','PlanController@accept')->name('admin/plans/accept');