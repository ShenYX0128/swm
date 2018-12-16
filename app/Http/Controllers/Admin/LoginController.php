<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use Session;
use DB;
use Hash;

class LoginController extends Controller
{
    //显示登录页面
    public function login()
    {
    	return view('admin.login',['title'=>'后台的登录页面']);
    }

    //处理登录方法
    public function dologin(Request $request)
    {
    	//表单验证

        //判断用户名
        $rs = DB::table('user')->where('username',$request->username)->first();
        
        if(!$rs){

            return back()->with('error','管理员名或者密码错误');
        }
        //判断用户身份
        if($rs->auth != '0'){

            return back()->with('error','管理员已被禁用，请联系超级管理员');
        }

        //判断密码
        //hash
        if (!Hash::check($request->password, $rs->password)) {
            
            return back()->with('error','管理员名或者密码错误');
        }

        //判断验证码
        $code = session('code');

        if($code != $request->code){
            return back()->with('error','验证码错误');
        }

        //存session信息
        session(['uid'=>$rs->id]);
        session(['uname'=>$rs->username]);

        return redirect('/admin');
    }

    //生成验证码方法
    public function captcha()
    {
        $phrase = new PhraseBuilder;
        // 设置验证码位数
        $code = $phrase->build(4);
        // 生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder($code, $phrase);
        // 设置背景颜色
        $builder->setBackgroundColor(123, 203, 230);
        $builder->setMaxAngle(25);
        $builder->setMaxBehindLines(0);
        $builder->setMaxFrontLines(0);
        // 可以设置图片宽高及字体
        $builder->build($width = 120, $height = 34, $font = null);
        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入session
        session(['code'=>$phrase]);
        // 生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();
    }

     public function header()
    {
        return view('admin.header',['title'=>'修改头像']);
    }

    public function upload(Request $request)
    {
        //获取上传的文件对象
        $file = $request->file('header');
        //判断文件是否有效
        if($file->isValid()){
            //上传文件的后缀名
            $entension = $file->getClientOriginalExtension();
            //修改名字
            $newName = date('YmdHis').mt_rand(1000,9999).'.'.$entension;
            //移动文件
            $path = $file->move('./uploads',$newName);

            $filepath = '/uploads/'.$newName;

            $res['header'] = $filepath;
            DB::table('user')->where('id',session('uid'))->update($res);
            //返回文件的路径
            return  $filepath;
        }
    }

    //修改密码
    public function passchange(){

      return view('admin.passchange',['title'=>'修改密码页面']);

   }
   
    public function dopasschange(Request $request){
        
        $rs=DB::table('user')->where('id',session('uid'))->first();
        
        if(!$request->password){
            return back()->with('error','请输入原密码');
        }
        if(!$request->newpassword){
            return back()->with('error','请输入新密码');
        }
        if(!$request->qpassword){
            return back()->with('error','请确认密码');
        }
       if (!Hash::check($request->password, $rs->password)) {
            //dd($rs->password);
            return back()->with('error','原密码错误');
        }
        
        if ($request->newpassword != $request->qpassword) {
            
            return back()->with('error','两次密码不一致');
        }
        $rs->password =Hash::make($request->newpassword);
        
        $res = ['password'=>$rs->password];
        try{

            $data=DB::table('user')->where('id',session('uid'))->update($res);
            
            if($data){
                return redirect('/admin')->with('success','修改成功');
            
            }
        }catch(\Exception $e){

                return back()->with('error','修改失败');
        }

    }

    //退出
    public function logout()
    {
        //清空session
        session(['uid'=>'']);

        return redirect('/admin/login');
    }


}
