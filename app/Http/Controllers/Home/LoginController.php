<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Customer;
use Session;
use DB;
use Hash;


class LoginController extends Controller
{
    //
    public function login()
    {
    	return view('home.login',['title'=>'用户登录页面']);
    }

    //处理登录方法
    public function dologin(Request $request)
    {
    	//判断手机号
        $rs = DB::table('customer')->where('phone',$request->phone)->first();
        //dd($rs);
        if(!$rs){

            return back()->with('error','账号或者密码错误');
        }

        //判断密码
        //hash
        if (!Hash::check($request->password, $rs->password)) {
            
            return back()->with('error','账号或者密码错误');
        }
        //dd($rs);
        //存session信息
        session(['cid'=>$rs->id]);
        session(['cname'=>$rs->customername]);

        return redirect('/');
    }

    //退出
    public function logout()
    {
        //清空session
        session(['cid'=>'']);

        return redirect('/home/login');
    }
   
}
