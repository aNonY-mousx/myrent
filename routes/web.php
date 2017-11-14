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
    return view('rent_home');
});

Route::get('/rent',function(){
	return view('rent_home');

});

Auth::routes();
Route::get('/admin','AdminController@index')->middleware('auth','admin');
Route::get('/home', 'HomeController@index')->name('home');



// to handle all admin page requests 
Route::resource('/admin','AdminController');