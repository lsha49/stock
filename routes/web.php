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


Route::get('stock', 'baseController@index')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
Route::get('users','UserController@userMan');
Route::get('users/{id}/edit','UserController@edit');
Route::put('users/{id}','UserController@update');
Route::delete('users/{id}','UserController@destroy');