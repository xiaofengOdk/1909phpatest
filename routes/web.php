
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
    Route::any('/sshow','Index\IndexController@sshow');//前台首页
Route::prefix("/admin")->group(function(){
	Route::any("/index","Admin\AdminController@index");//后台首页
    Route::any("/reg","Admin\RegController@reg");//后台注册
    Route::any("/rdo","Admin\RegController@rdo");//后台注册执行
    Route::any("/login","Admin\LoginController@login");//后台登录;
    Route::any("/quit","Admin\LoginController@quit");//后台退出;
    Route::any("/logdo","Admin\LoginController@logDo");//后台执行登录;
    Route::any("/ushow","Admin\AdminController@uShow")->middleware('checklogin');//后台执行登录;
    Route::any("/udo","Admin\AdminController@udo");//用户赋予角色;
    Route::any("/del","Admin\AdminController@del");//删除;
    Route::any("/jupdo","Admin\AdminController@jupdo");//即点击改;
	Route::any("/role_add","Admin\RoleController@role_add")->middleware("islogin");//添加、展示
	Route::any("/role_adds","Admin\RoleController@role_adds");
    Route::any("/role_upd/{id}","Admin\RoleController@role_upd");//修改
    Route::any("/role_updo/{id}","Admin\RoleController@role_updo");//修改执行
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
    Route::any('/gadd', 'Admin\GoodsController@gadd')->middleware('checklogin');//商品添加   李彤
    Route::any('/gdo', 'Admin\GoodsController@gdo');//商品添加执行   李彤
    Route::any('/goods_show', 'Admin\GoodsController@goods_show');//商品添加   李彤
    Route::any('/uploadadd', 'Admin\GoodsController@uploadadd');//商品添加   李彤
    Route::any('/goods_del', 'Admin\GoodsController@goods_del');//商品添加   李彤
    Route::any('/goods_ji', 'Admin\GoodsController@goods_ji');//商品添加   李彤



    Route::any('/adtg_add', 'Admin\AdtgController@adtg_add')->middleware('checklogin');//广告展示   
    Route::any('/adtg_adds', 'Admin\AdtgController@adtg_adds');//广告添加   
    Route::any('/adtg_del', 'Admin\AdtgController@adtg_del');//广告删除   
    Route::any('/pol', 'Admin\AdtgController@pol');//广告即点即改   
    Route::any('/adtg_upd/{id}', 'Admin\AdtgController@adtg_upd');//广告修改 
    Route::any('/adtg_updo/{id}', 'Admin\AdtgController@adtg_updo');//广告执行  



    Route::any('/attr_add', 'Admin\SkuController@attr_add')->middleware('checklogin');//attr展示   
    Route::any('/attrval_add', 'Admin\SkuController@attrval_add');//attrval展示   
    Route::any('/attr_adds', 'Admin\SkuController@attr_adds');//attr添加   
    Route::any('/attrval_adds', 'Admin\SkuController@attrval_adds');//attrval添加   
    Route::any('/attr_del', 'Admin\SkuController@attr_del');//attr删除   
    Route::any('/attr_upd/{id}', 'Admin\SkuController@attr_upd');//attrval修改  
    Route::any('/attr_updo/{id}', 'Admin\SkuController@attr_updo');//attrval执行  
    Route::any('/attrval_del', 'Admin\SkuController@attrval_del');//attrval删除   
    Route::any('/attr_pth', 'Admin\SkuController@attr_pth');//attr即点即改 
    Route::any('/attrval_pth', 'Admin\SkuController@attrval_pth');//attrval即点即改   
    Route::any('/attrval_upd/{id}', 'Admin\SkuController@attrval_upd');//attrval修改
    Route::any('/attrval_updo/{id}', 'Admin\SkuController@attrval_updo');//attrval修改执行


   


    Route::any('/category', 'Admin\CategoryController@category')->middleware('checklogin');//分类展示  邢慧峰
    Route::any('/cate_adds', 'Admin\CategoryController@cate_adds');//分类添加  邢慧峰
    Route::any('/cate_del', 'Admin\CategoryController@cate_del');//分类删除  邢慧峰
    Route::any('/cate_ji', 'Admin\CategoryController@cate_ji');//分类即点即改  邢慧峰


    Route::any('/nav_add', 'Admin\NavController@nav_add')->middleware('checklogin');//导航添加   阴晓菲
    Route::any('/nav_adds', 'Admin\NavController@nav_adds');//导航执行方法   阴晓菲
    Route::any('/nav_jidian', 'Admin\NavController@nav_jidian');//即点即改   阴晓菲
    Route::any('/nav_dels', 'Admin\NavController@nav_dels');//导航删除  阴晓菲
    Route::any('/nav_upd/{id}', 'Admin\NavController@nav_upd');//修改  阴晓菲
    Route::any('/nav_updo/{id}', 'Admin\NavController@nav_updo');//修改执行   阴晓菲
    Route::any('/foot_add', 'Admin\FootController@foot_add');//添加  阴晓菲
    Route::any('/foot_adds', 'Admin\FootController@foot_adds');//执行  阴晓菲
    Route::any('/foot_show', 'Admin\FootController@foot_show')->middleware('checklogin');//展示  阴晓菲
    Route::any('/foot_del', 'Admin\FootController@foot_del');//删除 阴晓菲


    Route::any('/gimgs_adds', 'Admin\GimgsController@gimgs_adds')->middleware('checklogin');//商品添加   刘远浩
    Route::any('/gimgs_add', 'Admin\GimgsController@gimgs_add');//商品添加   刘远浩
    Route::any('/gimgs_del', 'Admin\GimgsController@gimgs_del');//商品删除 刘远浩
    Route::any('/gimgs_upd/{id}', 'Admin\GimgsController@gimgs_upd');//商品删除 刘远浩
    Route::any('/gimgs_upddo/{id}', 'Admin\GimgsController@gimgs_upddo');//商品添加   刘远浩

    Route::any('/slide_add', 'Admin\SlideController@slide_add');//轮播图添加   刘远浩
    Route::any('/slide_show', 'Admin\SlideController@slide_show')->middleware('checklogin');//轮播图展示   刘远浩
    Route::any('/slide_del', 'Admin\SlideController@slide_del');//轮播删除   刘远浩
    Route::any('/slide_upd/{id}', 'Admin\SlideController@slide_upd');//轮播图修改 刘远浩
    Route::any('/slide_upddo/{id}', 'Admin\SlideController@slide_upddo');//轮播图修改执行 刘远浩
});


#########################3前台############
Route::prefix("/index")->group(function(){
    Route::any('/reg','Index\RegController@reg');
    Route::any('/regdo','Index\RegController@regdo');
    Route::any('/verify','Index\RegController@verify');
    Route::any('/login','Index\RegController@login');
    Route::any('/adv_list/{id}','Index\AdvController@adv_list');
    Route::any('/logindo','Index\RegController@logindo');
    Route::any('/user_index','Index\PersonController@user_index');
    Route::any('/order_info/{id}','Index\PersonController@order_info');
    Route::any('/goods_list/{id}','Index\GoodsController@goods_list');
    Route::any('/goods_desc/{id}','Index\GoodsinfoController@goods_desc');
    Route::any('/nav_list/{id}','Index\NavController@nav_list');
    Route::any('/nav_hot/{id}','Index\NavController@nav_hot');
    Route::any('/cart_list','Index\CartController@cart_list');
    Route::any('/getnewinfo','Index\GoodsController@getnewinfo');
    Route::any('/sousuo','Index\GoodsController@sousuo');
     Route::any('/add_Cart','Index\CartController@add_Cart');
   Route::any('/cart_add','Index\CartshopController@cart_add');
   Route::any('/test','Index\CartshopController@test');
   Route::any('/cate_add','Index\GoodsinfoController@cate_add');
   Route::any('/cart_num','Index\CartController@cart_num');//数量
   Route::any('/cart_nums','Index\CartController@cart_nums');//数量
    Route::any('/cart_del','Index\CartController@cart_del');//数量
   Route::any('/sku','Index\GoodsinfoController@sku');
    Route::any('/cart_del','Index\CartController@cart_del');//删除
    Route::any('/cart_dels','Index\CartController@cart_dels');//批量删除
    Route::any('/cart_num_del_new','Index\CartController@cart_num_del_new');
    Route::any('/cart_delds','Index\CartController@cart_delds');//删除、彻底消失
    Route::any('/goshop','Index\CartController@goshop');//删除、彻底消失
    Route::any('/quit','Index\RegController@quit');

}); 
Route::prefix("/order")->group(function(){
   Route::any('/index','Index\OrderinfoController@index');
   Route::any('/index_do','Index\OrderinfoController@index_do');
   Route::any('/del/{id}','Index\OrderinfoController@del');
   Route::any('/moren/{id}','Index\OrderinfoController@moren');
   Route::any('/order_sub','Index\OrderinfoController@order_sub');
   Route::any('/payno','Index\OrderinfoController@payno');
   Route::any('/payok','Index\OrderinfoController@payok');
  Route::any('/getnewInfo','Index\GoodsinfoController@getnewInfo');
});
Route::prefix("/user")->group(function(){
    Route::any('/user_info','Index\UserController@user_info');
    Route::any('/user_add','Index\UserController@user_add');
    Route::any('/user_address','Index\AddressController@user_address');
    Route::any('/addressdo','Index\AddressController@addressdo');
    Route::any('/user_file','Index\UserController@user_file');
    Route::any('/del/{id}','Index\AddressController@del');
    Route::any('/default/{id}','Index\AddressController@default');
    Route::any('/getCity','Index\AddressController@getCity');
    Route::any('/answer','Index\AnswerController@answer');
    Route::any('/answer_add','Index\AnswerController@answer_add');
    Route::any('/answer_list','Index\AnswerController@answer_list');
}); 
Route::any('/payMoney1/{id}','Index\Test@payMoney1');
Route::any('/return_url','Index\Test@return_url');
Route::any('/notify_url','Index\Test@notify_url');
