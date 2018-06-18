<?php

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

Route::get('/','PagesController@root')->name('root');
Auth::routes();


Route::group(['middleware'=>'auth'],function(){
	Route::group(['middleware'=>'email_verified'],function(){
		Route::get('user_addresses','UserAddressesController@index')->name('user_addressed.index');


	});

	Route::get('email_verified_notice','PagesController@emailVerifyNotice')->name('email_verified_notice');
	Route::get('email_verified/verify','EmailVerificationsController@verify')->name('email_verified.verify');
    Route::get('email_verified/send','EmailVerificationsController@send')->name('email_verified.send');

});

