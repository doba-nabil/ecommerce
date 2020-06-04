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
View::creator('backend.layout.navbar', function($view) {

});
Route::get('admin/login', 'backendAuthController@showLoginFrom')->name('backendLogin');
Route::post('admin/login', 'backendAuthController@login');
// authenticated
Route::group(['prefix'=>'admin' ,'middleware' => 'auth:moderator'], function() {
    Route::get('home', 'backendController@backendHome')->name('backend-home');
});
