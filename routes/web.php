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
Route::group(['middleware' => ['auth']], function(){
    Route::get('/','MainController@index');


    //============ User ==============
    Route::get('user','User\UserController@index');
    Route::get('user/profile','User\UserController@profile');
    Route::post('user/profile/update','User\UserController@profile_info');
    //============ /User =============
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
