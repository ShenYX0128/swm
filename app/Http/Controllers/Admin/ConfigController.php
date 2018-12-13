<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Config;
use DB;

class ConfigController extends Controller
{
    //显示网页配置
    public function edit()
    {
    	$config = Config::where('id','=',1)->first();

        return view('admin.config.edit',[
            'title'=>'网站配置修改',
            'config'=>$config
        ]);    
    }

    //修改网页配置方法
    public function configupdate(Request $request)
    {
    	$config = $request->except('_token','logo','_method');

    	if($request->hasFile('logo')){
            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $suffix = $request->file('logo')->getClientOriginalExtension();

            $request->file('logo')->move('./uploads',$name.'.'.$suffix);

            $config['logo'] = '/uploads/'.$name.'.'.$suffix;
        }
        //dd($config);
         //$data = DB::table('config')->where('id','=',1)->update($config);
        try{
 
            $data = Config::where('id','=',1)->update($config);
            
            if($data){
                return redirect('/admin/config/edit')->with('success','修改成功');
            }

        }catch(\Exception $e){

            return back()->with('error','修改失败');
        }
    }
}
