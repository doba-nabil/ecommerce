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


/*------------------------------ common ----------------------------------*/
Route::get('/ajax-cities', 'frontendController@getCities');
Route::get('/ajax-subcats', 'frontendController@getSubcats');
Route::get('/ajax-subsubcats', 'frontendController@getsubSubcats');
Route::get('/ajax-brands', 'frontendController@getBrands');
Route::get('/ajax-code', 'frontendController@getCode');
Route::post('read', 'frontendController@readNotification');
Route::get('auth/facebook', 'frontendController@redirectToFacebook');
Route::get('auth/facebook/callback', 'frontendController@handleFacebookCallback');
Route::get('auth/google', 'frontendController@redirectToGoogle');
Route::get('auth/google/callback', 'frontendController@handleGoogleCallback');
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


