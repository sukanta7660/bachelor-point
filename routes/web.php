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
    Route::get('bill','User\IndividualMealController@index');



    Route::get('user','User\UserController@index');
    Route::post('user/create','User\UserController@create_user');
    Route::post('user/edit','User\UserController@edit_user');
    Route::get('user/del/{id}','User\UserController@del');


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
    Route::post('expense/save','Expense\ExpenseController@save');
    Route::post('expense/edit','Expense\ExpenseController@edit');
    Route::get('expense/del/{id}','Expense\ExpenseController@del');
    //============ /Expense ============

    //============ Meal =============
    Route::get('meal','Meal\MealController@index');
    Route::post('meal/save','Meal\MealController@save');
    Route::post('meal/edit','Meal\MealController@edit');
    //============ /Meal ============

    //============ Deposits =============
    Route::get('deposit','Deposite\DepositeController@index');
    Route::post('deposit/save','Deposite\DepositeController@save');
    Route::post('deposit/edit','Deposite\DepositeController@edit');
    Route::get('deposit/del/{id}','Deposite\DepositeController@del');
    //============ /Deposits ============
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
