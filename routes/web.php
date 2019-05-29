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
    Route::get('user/check','User\UserController@check');
    Route::post('user/password/update','Auth\ChangePasswordController@change_password');
    //============ /User =============


    //============ Month =============
    Route::get('month','Month\MonthController@index');
    Route::post('month/save','Month\MonthController@save');
    Route::post('month/edit','Month\MonthController@edit');
    Route::get('month/del/{id}','Month\MonthController@del');

    Route::get('month/inner/{id}','Month\MonthController@inner');
    //============ /Month =============

    //============ Expense =============
    Route::get('expense','Expense\ExpenseController@index');
    //============ /Expense ============
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
