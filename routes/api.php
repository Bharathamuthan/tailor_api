<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('registration','Api\CustomController@registration');
Route::post('login','Api\CustomController@login');
//Customer Table
Route::post('customermeasurement','Api\CustomController@customermeasurement');
Route::get('getAllCustomers','Api\CustomController@getAllCustomers');
Route::get('getCustomer/{id}','Api\CustomController@getCustomer');
Route::get('editCustomer/{id}','Api\CustomController@editCustomer');
Route::get('deleteCustomer/{id}','Api\CustomController@deleteCustomer');
Route::post('updateCustomer/{id}','Api\CustomController@updateCustomer');
//Tailor Shop user
Route::post('tailorshopuser','Api\CustomController@tailorshopuser');
Route::get('getAllTailorusers','Api\CustomController@getAllTailorusers');
Route::get('getTailoruser/{id}','Api\CustomController@getTailoruser');
Route::get('editTailoruser/{id}','Api\CustomController@editTailoruser');
Route::get('deleteTailoruser/{id}','Api\CustomController@deleteTailoruser');
Route::post('updateTailoruser/{id}','Api\CustomController@updateTailoruser');
//Order List
Route::post('orderlist','Api\CustomController@orderlist');
//Order Type
Route::post('ordertype','Api\CustomController@ordertype');

Route::post('password/email','Api\CustomController@forgotPassword');
Route::post('logout','Api\CustomController@logoutApi');
Route::post('password/reset', 'Api\PasswordResetController@passwordReset');
Route::get('password/email-find/{token}', 'Api\PasswordResetController@emailFind');
Route::post('password/reset-confirm', 'Api\PasswordResetController@resetConfirm');
Route::group(['middleware' => 'auth:api'], function(){
    Route::get('hello', 'Api\CustomController@hello');
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
