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

    public function dostatus(Request $request)
    {
        $id = $request->input('id');

        $res = DB::table('address')->where('id',$id)->first();
       
        if($res->status){
            DB::update('update address set status="0" where id =?',[$id]);
            DB::update('update address set status="1" where id !=?',[$id]);    
        }
            
    }

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

}
