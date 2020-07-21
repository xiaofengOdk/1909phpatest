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
	##########################商品模块###############################
	//商品分类
	Route::any('/category','Admin\CategoryController@category');
	//商品品牌
	Route::any('/brand','Admin\BrandController@brand');
	Route::any('/dobrand','Admin\BrandController@dobrand');
	Route::any('/delbrand','Admin\BrandController@delbrand');
	Route::any('/brandedit/{id}','Admin\BrandController@brandedit');
	Route::any('/brandupd/{id}','Admin\BrandController@brandupd');
	//即点即改
	Route::any('/editbrand_name','Admin\BrandController@editbrand_name');
	Route::any('/editbrand_show','Admin\BrandController@editbrand_show');
	##########################商品模块###############################

});

