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
/*
 Route::get('/', function () {
     return view('welcome');
 });
  Route::any("/","Admin\AdminController@index");*/

Route::any('/','Index\IndexController@index');//前台首页

Route::any('/','Index\IndexController@index');//前台首页 

// Route::get('/', function () {
//     return view('welcome');
// });
//****************后台模块********

//后台首页

Route::prefix("/admin")->group(function(){
	Route::any("/index","Admin\AdminController@index");

	//角色管理
	Route::any("/role_add","Admin\RoleController@role_add");
	Route::any("/role_adds","Admin\RoleController@role_adds");
	Route::any("/role_del","Admin\RoleController@role_del");
});

