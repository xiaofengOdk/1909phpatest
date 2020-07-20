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

Route::prefix("/admin")->group(function(){
	Route::any("/right/index","Admin\RightController@index");
	Route::any("/right/add_right","Admin\RightController@add_right");
	Route::any("/right/del","Admin\RightController@del");
	Route::any("/right/updateajax","Admin\RightController@updateajax");
	Route::any("/right/paginate","Admin\RightController@paginate");
});