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
    return view('welcome');
});

Route::get('/adminLogin', 'AdminLoginController@index')->name('adminLogin.index');
Route::post('/adminLogin', 'AdminLoginController@verify');

Route::get('/adminLogout', 'AdminLogoutController@index')->name('adminLogout.index');

Route::get('/adminHome', 'AdminHomeController@index')->name('adminHome.index');
Route::get('/adminAllCustomer', 'AdminHomeController@allCustomer')->name('adminHome.allCustomer');
Route::get('/adminAllProperty', 'AdminHomeController@allProperty')->name('adminHome.allProperty');
