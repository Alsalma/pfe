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
Route::get('ajaxdata', 'SocieteController@index')->name('ajaxdata');
Route::get('ajaxdata/getdata', 'SocieteController@getdata')->name('ajaxdata.getdata');

Route::post('ajaxdata/postdata', 'SocieteController@postdata')->name('ajaxdata.postdata');
Route::get('ajaxdata/fetchdata', 'SocieteController@fetchdata')->name('ajaxdata.fetchdata');
Route::get('ajaxdata/removedata', 'SocieteController@removedata')->name('ajaxdata.removedata');
Route::get('ajaxdata/massremove', 'SocieteController@massremove')->name('ajaxdata.massremove');
