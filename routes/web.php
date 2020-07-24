
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
    Route::any('/show','Index\IndexController@show');//前台首页
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
	Route::any("/role_add","Admin\RoleController@role_add")->middleware("islogin");//添加、展示
	Route::any("/role_adds","Admin\RoleController@role_adds");
	Route::any("/role_Del","Admin\RoleController@role_Del");//删除
	Route::any("/pth","Admin\RoleController@pth");//即点即改


	Route::any('/upd', 'Admin\RoleController@upd');//角色赋予权限
// 权限管理
    Route::any("/right/right_add","Admin\RightController@right_add");//权限赋予的路由
	Route::any("/right/index","Admin\RightController@index")->middleware("islogin");
	Route::any("/right/add_right","Admin\RightController@add_right");
	Route::any("/right/del","Admin\RightController@del");
	Route::any("/right/updateajax","Admin\RightController@updateajax");
	Route::any("/right/paginate","Admin\RightController@paginate");
	Route::any("/pth","Admin\RoleController@pth");//即点即改
 // Route::any("/","Admin\AdminController@index");
	##########################商品模块###############################
	//商品分类
	Route::any('/category','Admin\CategoryController@category');
	//商品品牌
	Route::any('/brand','Admin\BrandController@brand')->middleware("islogin");
	Route::any('/dobrand','Admin\BrandController@dobrand');
	Route::any('/delbrand','Admin\BrandController@delbrand');
	Route::any('/brandedit/{id}','Admin\BrandController@brandedit');
	Route::any('/brandupd/{id}','Admin\BrandController@brandupd');
	//即点即改
	Route::any('/editbrand_name','Admin\BrandController@editbrand_name');
	Route::any('/editbrand_show','Admin\BrandController@editbrand_show');
	##########################商品模块###############################
	Route::any('/jup', 'Admin\RoleController@jup');//即点即改
    Route::any('/gadd', 'Admin\GoodsController@gadd');//商品添加   李彤
    Route::any('/gdo', 'Admin\GoodsController@gdo');//商品添加执行   李彤



    Route::any('/adtg_add', 'Admin\AdtgController@adtg_add');//广告展示   李丹阳
    Route::any('/adtg_adds', 'Admin\AdtgController@adtg_adds');//广告添加   李丹阳
    Route::any('/adtg_del', 'Admin\AdtgController@adtg_del');//广告删除   李丹阳
    Route::any('/pol', 'Admin\AdtgController@pol');//广告即点即改   李丹阳
  
    Route::any('/attr_add', 'Admin\SkuController@attr_add');//attr展示   李丹阳
    Route::any('/attrval_add', 'Admin\SkuController@attrval_add');//attrval展示   李丹阳
    Route::any('/attr_adds', 'Admin\SkuController@attr_adds');//attr添加   李丹阳
    Route::any('/attrval_adds', 'Admin\SkuController@attrval_adds');//attrval添加   李丹阳
    Route::any('/attr_del', 'Admin\SkuController@attr_del');//attr删除   李丹阳
    Route::any('/attrval_del', 'Admin\SkuController@attrval_del');//attrval删除   李丹阳
    Route::any('/attr_pth', 'Admin\SkuController@attr_pth');//attr即点即改 李丹阳
    Route::any('/attrval_pth', 'Admin\SkuController@attrval_pth');//attrval即点即改   李丹阳





    Route::any('/category', 'Admin\CategoryController@category');//分类展示  邢慧峰
    Route::any('/cate_adds', 'Admin\CategoryController@cate_adds');//分类添加  邢慧峰
    Route::any('/cate_del', 'Admin\CategoryController@cate_del');//分类删除  邢慧峰
    Route::any('/cate_ji', 'Admin\CategoryController@cate_ji');//分类即点即改  邢慧峰


    Route::any('/nav_add', 'Admin\NavController@nav_add');//导航添加   阴晓菲
    Route::any('/nav_adds', 'Admin\NavController@nav_adds');//导航执行方法   阴晓菲
    Route::any('/nav_jidian', 'Admin\NavController@nav_jidian');//即点即改   阴晓菲
    Route::any('/nav_dels', 'Admin\NavController@nav_dels');//导航删除  阴晓菲
    Route::any('/nav_upd/{id}', 'Admin\NavController@nav_upd');//修改  阴晓菲
    Route::any('/nav_updo/{id}', 'Admin\NavController@nav_updo');//修改执行   阴晓菲



    Route::any('/gimgs_adds', 'Admin\GimgsController@gimgs_adds');//商品添加   刘远浩
    Route::any('/gimgs_add', 'Admin\GimgsController@gimgs_add');//商品添加   刘远浩
    Route::any('/gimgs_del', 'Admin\GimgsController@gimgs_del');//商品删除 刘远浩
    Route::any('/gimgs_upd/{id}', 'Admin\GimgsController@gimgs_upd');//商品删除 刘远浩
    Route::any('/gimgs_upddo/{id}', 'Admin\GimgsController@gimgs_upddo');//商品添加   刘远浩

    Route::any('/slide_add', 'Admin\SlideController@slide_add');//轮播图添加   刘远浩
    Route::any('/slide_show', 'Admin\SlideController@slide_show');//轮播图展示   刘远浩
    Route::any('/slide_del', 'Admin\SlideController@slide_del');//轮播删除   刘远浩
    Route::any('/slide_upd/{id}', 'Admin\SlideController@slide_upd');//轮播图修改 刘远浩
    Route::any('/slide_upddo/{id}', 'Admin\SlideController@slide_upddo');//轮播图修改执行 刘远浩

});
