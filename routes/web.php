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

Route::get('/adminIndex', 'AdminWebsiteController@index')->name('adminWebsite.index');
Route::get('/adminAbout-us', 'AdminWebsiteController@aboutUs')->name('adminWebsite.about-us');
Route::get('/adminBlog', 'AdminWebsiteController@blog')->name('adminWebsite.blog');
Route::get('/adminContact', 'AdminWebsiteController@contact')->name('adminWebsite.contact');
Route::get('/AdminElements', 'AdminWebsiteController@elements')->name('adminWebsite.elements');
Route::get('/AdminListings', 'AdminWebsiteController@listings')->name('adminWebsite.listings');
Route::post('/AdminListings', 'AdminWebsiteController@searchListings')->name('adminWebsite.searchListings');
Route::get('/adminSingle-blog', 'AdminWebsiteController@singleBlog')->name('adminWebsite.singleBlog');
Route::get('/adminSingle-listings/{property_id}', 'AdminWebsiteController@singleListings')->name('adminWebsite.singleListings');

Route::get('/adminLogin', 'AdminLoginController@index')->name('adminLogin.index');
Route::post('/adminLogin', 'AdminLoginController@verify');

Route::get('/adminLogout', 'AdminLogoutController@index')->name('adminLogout.index');

Route::get('/adminMain', 'AdminMainController@index')->name('adminMain.index');
Route::get('/adminMainCustomerDetail/{username}', 'AdminMainController@customerDetail')->name('adminMain.customerDetail');
Route::get('/adminMainPropertyDetail/{property_id}', 'AdminMainController@propertyDetail')->name('adminMain.propertyDetail');

Route::get('/adminRegister', 'AdminRegisterController@index')->name('adminRegister.index');
Route::post('/adminRegister', 'AdminRegisterController@verify');

Route::group(['middleware'=>['sessionVerify', 'typeCheck']], function(){
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
  Route::get('/adminPendingPropertyDetail/{property_id}', 'AdminHomeController@pendingPropertyDetail')->name('adminHome.pendingPropertyDetail');
  Route::get('/adminAllMessage', 'AdminHomeController@allMessage')->name('adminHome.allMessage');
  Route::post('/adminAllMessage', 'AdminHomeController@searchMessage')->name('adminHome.searchMessage');
  Route::get('/adminAddUserIndex', 'AdminHomeController@addUserIndex')->name('adminHome.addUserIndex');
  Route::post('/adminAddUserIndex', 'AdminHomeController@addUser')->name('adminHome.addUser');
  Route::get('/adminEditUserIndex/{username}', 'AdminHomeController@editUserIndex')->name('adminHome.editUserIndex');
  Route::post('/adminEditUserIndex/{username}', 'AdminHomeController@editUser')->name('adminHome.editUser');
  Route::get('/adminFeedback', 'AdminHomeController@feedbackIndex')->name('adminHome.feedbackIndex');
  Route::post('/adminFeedback', 'AdminHomeController@feedback')->name('adminHome.feedback');
  Route::get('/changeStatusToFeatured/{id}', 'AdminHomeController@toFeatured')->name('adminHome.toFeatured');
  Route::get('/changeStatusToAllowed/{id}', 'AdminHomeController@toAllowed')->name('adminHome.toAllowed');
});
