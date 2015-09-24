<?php

/*
 * |--------------------------------------------------------------------------
 * | Application Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register all of the routes for an application.
 * | It's a breeze. Simply tell Laravel the URIs it should respond to
 * | and give it the controller to call when that URI is requested.
 * |
 */

// Homepage
Route::get ( '/', 'WelcomeController@index' );

// Manage page
Route::get ( '/manage', 'ManageController@index' );

// ClientType page
Route::get ( '/manage/clienttype', 'ClientTypeController@index' );
Route::get ( '/manage/clienttype/create', 'ClientTypeController@create' );
Route::get ( '/manage/clienttype/{id}/edit', 'ClientTypeController@edit' );
Route::post ( '/manage/clienttype', 'ClientTypeController@store' );
Route::patch ( '/manage/clienttype/{id}', 'ClientTypeController@update' );

// Status page
Route::get ( '/manage/status', 'StatusController@index' );
Route::get ( '/manage/status/create', 'StatusController@create' );
Route::get ( '/manage/status/{id}/edit', 'StatusController@edit' );
Route::post ( '/manage/status', 'StatusController@store' );
Route::patch ( '/manage/status/{id}', 'StatusController@update' );

// ClientDetail page
Route::get ( '/manage/clientdetail', 'ClientDetailController@index' );
Route::get ( '/manage/clientdetail/create', 'ClientDetailController@create' );
Route::get ( '/manage/clientdetail/{id}/edit', 'ClientDetailController@edit' );
Route::post ( '/manage/clientdetail', 'ClientDetailController@store' );
Route::patch ( '/manage/clientdetail/{id}', 'ClientDetailController@update' );

// About page
Route::get ( '/about', 'AboutController@index' );

// User
Route::controllers ( [ 
		'auth' => 'Auth\AuthController',
		'password' => 'Auth\PasswordController' 
] );

// Ajax
Route::post ('/place', 'AjaxController@getPlaces');