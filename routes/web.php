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

//------------Users------------------

Route::get('/users','UserController@index');

Route::get('/users/create','UserController@create');

Route::post('/users','UserController@store');

Route::get('/users/plans','PlanController@index');

//---------------Packservice---------------

Route::get('/admin','PackserviceController@index')->name('admin');

Route::post('/admin','PackserviceController@store')->name('admin/store');

//---------------Cable------------------

Route::post('/admin/cable','CableController@store')->name('cable/store');



Route::resource('/admin/channel','ChannelController');

Route::resource('/admin/internet','InternetController');

Route::resource('/admin/telephone','TelephoneController');

Route::resource('/admin/programation','ProgramationController');

Route::resource('/admin/invoice','InvoiceController');

Route::resource('/admin/plan','PlanController');

Auth::routes(); 

Route::get('/home', 'HomeController@index')->name('home');
