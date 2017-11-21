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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/update', 'HomeController@update')->name('home_update');

Route::get('/user', 'UserController@index')->name('user_get_all');
Route::get('/user/add', 'UserController@add')->name('user_get_add');
Route::post('/user/add', 'UserController@add')->name('user_post_add');
Route::get('/user/{id}', 'UserController@update')->name('user_get');
Route::post('/user/{id}', 'UserController@update')->name('user_update');

Route::get('/myaccount/stripe', 'MyaccountController@getstripe')->name('myaccount_stripe_get');
Route::post('/myaccount/stripe', 'MyaccountController@getstripe')->name('myaccount_stripe_update');