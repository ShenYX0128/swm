<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Customer;
use App\Model\Admin\Address;
use Session;
use DB;
use Hash;

class PersonalController extends Controller
{
    //显示个人中心用户信息
    public function information()
    {
    	return view('home.personal.information',['title'=>'个人中心']);

    }

    //修改个人中心用户信息
    public function update(Request $request)
    {
        $res = $request->except('_token','profile');

        
         if($request->hasFile('profile')){
            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $suffix = $request->file('profile')->getClientOriginalExtension();

            $request->file('profile')->move('./uploads',$name.'.'.$suffix);

            $res['profile'] = '/uploads/'.$name.'.'.$suffix;
        }
      //dd($res);
        try{
 
            $data = Customer::where('id', session('cid'))->update($res);
            
            if($data){
                return redirect('/')->with('success','修改成功');
            }

        }catch(\Exception $e){

            return back()->with('error','修改失败');
        }
    }

    //实时改变用户头像
    public function profile(Request $request)
    {
        //获取上传的文件对象
        $file = $request->file('profile');
        //判断文件是否有效
        if($file->isValid()){
            //上传文件的后缀名
            $entension = $file->getClientOriginalExtension();
            //修改名字
            $newName = date('YmdHis').mt_rand(1000,9999).'.'.$entension;
            //移动文件
            $path = $file->move('./uploads',$newName);

            $filepath = '/uploads/'.$newName;

            $res['profile'] = $filepath;
            DB::table('customer')->where('id',session('cid'))->update($res);
            //返回文件的路径
            return  $filepath;
        }
    }

    //收货地址
    public function address()
    {
        return view('home.personal.address',['title'=>'收货地址']);

    }

    //添加收货地址
    public function create(Request $request)
    {    
       
        $res = $request->except('_token');
        //dd($res);
        try{
 
            $data = Address::where('id', session('cid'))->create($res);
            
            if($data){
                return back()->with('success','修改成功');
            }

        }catch(\Exception $e){

            return back()->with('error','修改失败');
        }
    }
    //修改默认地址
    public function dostatus(Request $request)
    {
        $id = $request->input('id');

        $res = DB::table('address')->where('id',$id)->first();
        
        $rs = DB::table('customer')->where('id',session('cid'))->first();
       
        if($res->status){
            DB::update('update address set status="0" where cid=? && id =?',[session('cid'),$id]);
            DB::update('update address set status="1" where  cid=? && id !=?',[session('cid'),$id]);    
        }
            
    }
    //删除地址
    public function destory(Request $request)
    {
        // $id = strip_tags($_GET['id']);
        $id = $request->id;
        $res = DB::table('address')->where('id',$id)->delete();
        if ($res) {
            echo 1;
        } else {
            echo 0;
        }
    }
    //修改地址信息
    public function addedit($id)
    {   
        $address = DB::table('address')->where('id', $id)->first();
        // dd($address);
        
        return view('home.personal.addedit',[
            'title'=>'地址修改页面',
            'add'=>$address
            ]);

    }   

    //修改地址方法
    public function addupdate(Request $request,$id) 
    {
        $res = $request->except('_token');
        //dd($res);
        try{
 
            $data = address::where('id', $id)->update($res);
            
            if($data){
                return redirect('/home/personal/address')->with('alert','修改成功');
            }

        }catch(\Exception $e){

            return back()->with('alert','修改失败');
        }
    }

    //安全中心
    public function safety()
    {
        return view('home.personal.safety',['title'=>'安全中心']);
    }

    //修改密码
    public function password()
    {
        return view('home.personal.password',['title'=>'修改密码']);
    }
    //获取验证码
    public function getphone(Request $request)
    {
        $number = $request->post('number');

        $options['accountsid']='747c9976a92afc490ce85a81dfc08053';
        $options['token']='2d7e18073da43bd7e9a73f9415a321ef';

        $ucpass = new \App\Library\Ucpaas($options);

        // $ucpass->getDevinfo('xml');

        //验证码
        $code = rand(111111,999999);

        //session
        session('code',$code);

        $appId = "28b753e772144ea48f54a6bde1979869";
        
        $templateId = "390744";
        // $param=$code;

        $ucpass->templateSMS($appId,$number,$templateId,$code);

        echo $code;
    }
    //比较验证码
    public function getcode(Request $request)
    {
        $code = $request->get('code');

        $cd = session('code');
        dump($code,$cd);
        //比较   跟手机收到的验证码作比较
        if($code == $cd){

            echo 1;
        } else {
            echo 0;
        }

    }

    public function changepassword(Request $request,$id)
    {
        $res = $request->except('_token','phone','code','repassword');

        //往数据表里面添加数据  hash加密
        $res['password'] = Hash::make($request->password);
        //dd($res);
        try{
 
            $data = customer::where('id', $id)->update($res);
            
            if($data){
                return redirect('/')->with('alert','修改成功');
            }

        }catch(\Exception $e){

            return back()->with('alert','修改失败');
        }
    }

}
