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
Route::get('/adminMain', 'AdminMainController@index')->name('adminMain.index');
Route::get('/adminMainCustomerDetail/{username}', 'AdminMainController@customerDetail')->name('adminMain.customerDetail');
Route::get('/adminMainPropertyDetail/{property_id}', 'AdminMainController@propertyDetail')->name('adminMain.propertyDetail');

Route::get('/adminRegister', 'AdminRegisterController@index')->name('adminRegister.index');
Route::post('/adminRegister', 'AdminRegisterController@verify');

Route::get('/adminLogin', 'AdminLoginController@index')->name('adminLogin.index');
Route::post('/adminLogin', 'AdminLoginController@verify');

Route::get('/adminLogout', 'AdminLogoutController@index')->name('adminLogout.index');

Route::get('/adminHome', 'AdminHomeController@index')->name('adminHome.index');
Route::get('/adminAllCustomer', 'AdminHomeController@allCustomer')->name('adminHome.allCustomer');
Route::post('/adminAllCustomer', 'AdminHomeController@searchCustomer');
Route::get('/adminAllProperty', 'AdminHomeController@allProperty')->name('adminHome.allProperty');
Route::post('/adminAllProperty', 'AdminHomeController@searchProperty');
Route::get('/adminCustomerDetail/{username}', 'AdminHomeController@customerDetail')->name('adminHome.customerDetail');
Route::get('/adminActivePosts/{username}', 'AdminHomeController@activePosts')->name('adminHome.activePosts');
Route::get('/adminPendingPosts/{username}', 'AdminHomeController@pendingPosts')->name('adminHome.pendingPosts');
Route::get('/adminSoldPosts/{username}', 'AdminHomeController@soldPosts')->name('adminHome.soldPosts');
Route::get('/adminTotalPosts/{username}', 'AdminHomeController@totalPosts')->name('adminHome.totalPosts');
// Route::get('/acceptPending/{property_id}', 'AdminHomeController@accept')->name('adminHome.acceptPending');
// Route::get('/denyPending/{property_id}', 'AdminHomeController@deny')->name('adminHome.denyPending');
Route::get('/adminAccept/{property_id}', 'AdminHomeController@accept')->name('adminHome.accept');
Route::get('/adminDeny/{property_id}', 'AdminHomeController@deny')->name('adminHome.deny');
Route::get('/adminPropertyDetail/{property_id}', 'AdminHomeController@propertyDetail')->name('adminHome.propertyDetail');
