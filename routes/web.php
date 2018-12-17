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
//后台登录页面
Route::any('/admin/login','Admin\LoginController@login');
Route::any('/admin/dologin','Admin\LoginController@dologin');
Route::any('/admin/captcha','Admin\LoginController@captcha');
Route::any('/admin/header','Admin\LoginController@header');
Route::any('/admin/upload','Admin\LoginController@upload');
Route::any('/admin/passchange','Admin\LoginController@passchange');
Route::any('/admin/dopasschange','Admin\LoginController@dopasschange');
Route::any('/admin/logout','Admin\LoginController@logout');

// 后台
Route::group(['middleware'=>'login'],function(){
	// 首页
	Route::get('admin/','Admin\IndexController@index');
	//后台管理员管理
	Route::resource('admin/user','Admin\UserController');
	//后台用户管理
	Route::resource('admin/customer','Admin\CustomerController');
	// 商品管理
	Route::resource('admin/goods','Admin\GoodsController');
	//分类管理
	Route::resource('admin/category','Admin\CategoryController');

	//友情链接
	Route::resource('admin/friend','Admin\FriendController');

	//轮播管理
	Route::resource('admin/banner','Admin\BannerController');
	// 评论管理
	Route::resource('admin/comment','Admin\CommentController');
	// 广告管理
	Route::resource('admin/poster','Admin\PosterController');
	//订单管理
	Route::resource('admin/orders','Admin\OrdersController');
	Route::any('admin/detail','Admin\OrdersController@detail');
	//订单状态
	Route::resource('admin/orders_status','Admin\OrderstatusController');

	//角色管理
	Route::resource('/admin/role','Admin\RoleController');
	Route::any('/admin/role_per','Admin\RoleController@role_per');
	Route::any('/admin/do_role_per','Admin\RoleController@do_role_per');

	//权限管理
	Route::resource('/admin/permission','Admin\PermissionController');
	//后台网站配置管理
	Route::get('admin/config/edit','Admin\ConfigController@edit');
	Route::any('admin/configupdate','Admin\ConfigController@configupdate');
});

//用户权限提示页面
	Route::get('/admin/remind','Admin\UserController@remind');

//前台登录
Route::get('/home/login','Home\LoginController@login');
Route::post('/home/dologin','Home\LoginController@dologin');
Route::get('/home/logout','Home\LoginController@logout');

//前台的注册
Route::get('/home/register', 'Home\RegisterController@register');
Route::post('/home/doregister','Home\RegisterController@doregister');
Route::any('/home/checkphone','Home\RegisterController@checkphone');
Route::any('/home/checkcode','Home\RegisterController@checkcode');
// 前台主页
Route::get('/','Home\IndexController@index');

//列表页
Route::any('home/list/{id}','Home\ListController@index');
Route::any('home/inx/{id}','Home\ListController@inx');
Route::any('home/list/{id}','Home\ListController@index');
// 前台详情页
Route::get('/detailadd','Home\DetailController@detailadd');
Route::get('home/detail/{id}','Home\DetailController@detail');

// 去结算页面
Route::post('home/commit','Home\OrderController@commit');




//前台用户登陆后可操作
Route::group(['middleware'=>['homelogin']],function(){

	// 购物车
	Route::get('shopcar','Home\ShopcarController@shopcar');
	//购物车删除
	Route::post('home/shopdel','Home\ShopcarController@shopdel');
	//购物车数量+
	Route::get('home/shopadd','Home\ShopcarController@shopadd');
	//购物车数量-
	Route::any('home/shopdec','Home\ShopcarController@shopdec');
	//订单成功
	Route::post('jiesuan','Home\OrderController@jiesuan');
	//订单页
	Route::any('home/order','Home\OrderDetailController@index');


	// 立即购买
	Route::get('home/detailpay','Home\DetailpayController@detailpay');
	Route::post('home/addpay','Home\DetailpayController@addpay');
	// 提交定单
	Route::post('home/paycreate','Home\DetailpayController@paycreate');
	// 结算成功
	Route::get('/home/success/{id}','Home\DetailpayController@success');
	// 详情页评论
	Route::get('home/page','Home\DetailController@page');
	// 添加评论
	Route::get('home/commentlist/{id}','Home\CommitController@commentlist');
	Route::post('home/commentadd','Home\CommitController@commentadd');
	// 评论管理
	Route::get('home/comment','Home\CommitController@comment');

	//前台个人中心
	Route::get('home/personal/information','Home\PersonalController@information');
	Route::post('home/update','Home\PersonalController@update');
	//收货地址
	Route::get('home/personal/address','Home\PersonalController@address');
	Route::post('home/create','Home\PersonalController@create');
	//修改默认地址
	Route::post('home/dostatus','Home\PersonalController@dostatus');
	//修改地址信息
	Route::get('home/personal/addedit/{id}','Home\PersonalController@addedit');
	Route::post('home/addupdate/{id}','Home\PersonalController@addupdate');

	//删除地址信息
	Route::get('home/destory','Home\PersonalController@destory');
	//安全中心
	Route::get('home/personal/safety','Home\PersonalController@safety');

     //订单确认收货 ajax order_okgoods
    Route::get('/jiesuan/order_okgoods','Home\CarController@order_okgoods');
    //订单详情
	Route::get('home/orderinfo','Home\OrderDetailController@orderinfo');

});


//修改 忘记密码
Route::get('home/personal/password','Home\PersonalController@password');
Route::any('home/getphone','Home\PersonalController@getphone');
Route::any('home/getcode','Home\PersonalController@getcode');
Route::post('home/changepassword/{id}','Home\PersonalController@changepassword');