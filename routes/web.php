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


Route::any('/','Index\IndexController@index');//前台首页 

// Route::get('/', function () {
//     return view('welcome');
// });
 // Route::any("/","Admin\AdminController@index");
Route::prefix("/admin")->group(function(){
	Route::any("/index","Admin\AdminController@index");
});

