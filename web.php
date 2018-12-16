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

// 后台管理员登录后可操作
Route::group(['middleware'=>['login','userper']],function(){
	// 首页
	Route::get('admin/','Admin\IndexController@index');
	//后台管理员管理
	Route::resource('admin/user','Admin\UserController');
	//后台用户管理
	Route::resource('admin/customer','Admin\CustomerController');
	//给用户添加角色
	Route::any('/admin/user_role','Admin\UserController@user_role');
	Route::any('/admin/do_user_role','Admin\UserController@do_user_role');
	// 商品管理
	Route::resource('admin/goods','Admin\GoodsController');
	//分类管理
	Route::resource('admin/category','Admin\CategoryController');

	//友情链接
	Route::resource('admin/friend','Admin\FriendController');

	// 评论管理
	Route::resource('admin/comment','Admin\CommentController');
	// 广告管理
	Route::resource('admin/poster','Admin\PosterController');
	//订单管理
	Route::resource('admin/orders','Admin\OrdersController');

	//轮播管理
	Route::resource('admin/banner','Admin\BannerController');

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
Route::post('home/detailadd','Home\DetailController@detailadd');
Route::get('home/detail/{id}','Home\DetailController@detail');

// 购物车
	Route::get('home/shopcar','Home\ShopcarController@shopcar');
	Route::post('home/shopdata','Home\ShopcarController@shopdata');
	Route::post('home/shopalldel','Home\ShopcarController@shopalldel');
	Route::any('home/shopcreate','Home\ShopcarController@shopcreate');

	// 立即购买
	Route::get('home/detailpay','Home\DetailpayController@detailpay');
	Route::post('home/addpay','Home\DetailpayController@addpay');
	// 详情页评论
	Route::get('home/page','Home\DetailController@page');

//前台用户登陆后可操作
Route::group(['middleware'=>['homelogin']],function(){

	

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

});


//修改 忘记密码
Route::get('home/personal/password','Home\PersonalController@password');
Route::any('home/getphone','Home\PersonalController@getphone');
Route::any('home/getcode','Home\PersonalController@getcode');
Route::post('home/changepassword/{id}','Home\PersonalController@changepassword');


