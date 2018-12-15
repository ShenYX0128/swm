<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Customer;
use Hash;
use DB;
use App\Library;

class RegisterController extends Controller
{
    //
    public function register()
    {
    	return view('home.register',['title'=>'用户注册页面']);
    }

    public function checkphone(Request $request)
    {
    	$number = $request->post('number');

    	$options['accountsid']='747c9976a92afc490ce85a81dfc08053';
		$options['token']='2d7e18073da43bd7e9a73f9415a321ef';

		$ucpass = new \App\Library\Ucpaas($options);

		// $ucpass->getDevinfo('xml');

		//验证码
		$code = rand(111111,999999);

		//session
		session(['code'=>$code]);

		$appId = "28b753e772144ea48f54a6bde1979869";
		
		$templateId = "390743";
		// $param=$code;

		$ucpass->templateSMS($appId,$number,$templateId,$code);

		echo $code;
    }

    public function checkcode(Request $request)
    {
    	$code = $request->get('code');

    	$cd = session('code');
    	//比较   跟手机收到的验证码作比较
    	if($code == $cd){

    		echo 1;
    	} else {
    		echo 0;
    	}

    }



    public function checkrephone(Request $request)
    {
        $phone = $request->post('phone');
        $rs = Customer::where('phone',$phone)->first();

        if($rs){

            echo 1;
        } else {
            echo 0;
        }

    }

    public function doregister(Request $request)
    {
        $res = $request->except('_token','code');

        //往数据表里面添加数据  hash加密
        $res['password'] = Hash::make($request->password);
        //dd($res);
        
            $data = Customer::create($res);
            
            if($data){
                $rs = Customer::where('phone',$res['phone'])->first();
                //存session信息
                session(['cid'=>$rs->id]);

                return redirect('/');
            }

       
    }
}
