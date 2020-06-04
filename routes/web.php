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

View::creator('frontend.layout.header', function($view) {
    $currentLanguage = '';
    if (session()->has('currency')) {
        $view->with('currentLanguage', Session()->get('currency'));
    } else {
        $view->with('currentLanguage', \App\Currency::find(1));
    }
});
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
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
