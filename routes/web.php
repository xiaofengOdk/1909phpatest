
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
    // Route::get('/', function () {
    //     return view('welcome');
    // });

    Route::any('/','Index\IndexController@index');//前台首页


   Route::prefix("/admin")->group(function(){
        Route::any("/index","Admin\AdminController@index");//后台首页
        Route::any("/reg","Admin\RegController@reg");//后台注册
        Route::any("/rdo","Admin\RegController@rdo");//后台注册执行
        Route::any("/login","Admin\LoginController@login");//后台登录;
        Route::any("/logdo","Admin\LoginController@logDo");//后台执行登录;
        Route::any("/ushow","Admin\AdminController@uShow");//后台执行登录;
        Route::any("/udo","Admin\AdminController@udo");//用户赋予角色;
        Route::any("/del","Admin\AdminController@del");//删除;
        Route::any("/jupdo","Admin\AdminController@jupdo");//即点击改;

        Route::any("/role_add","Admin\RoleController@role_add");//添加、展示
        Route::any("/role_adds","Admin\RoleController@role_adds");
        Route::any("/role_Del","Admin\RoleController@role_Del");//删除

        Route::any('/update/{id}', 'Admin\RoleController@update');//修改页
        Route::any('/upd', 'Admin\RoleController@upd');//修改页


// Route::get('/', function () {
//     return view('welcome');
// });
 // Route::any("/","Admin\AdminController@index");
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

	Route::any('/jup', 'Admin\RoleController@jup');//即点即改

});