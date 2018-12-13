<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ShopcarController extends Controller
{
    //购物车显示
    public function shopcar()
    {
       
    	$res = DB::table('shopcar')->get();
        
        $gods = DB::table('goods')->get();
    	// dd($res);
    	return view('home.shopcar',['title'=>'g-mall商城---购物车','res'=>$res,'gods'=>$gods]);
    }
   
    // 购物车单个删除
    public function shopdata(Request $request)
    {
    	$id = $request->gid;
    	// echo $id;
    	$res = DB::table('shopcar')->where('id',$id)->delete();
    	if($res){
    		echo 1;
    	} else {
    		echo 0;
    	}

    }
    // 购物车批量删除
    public function shopalldel(Request $request)
    {
    	$id = $request->arr;

    	foreach ($id as $k => $v) {
    		$res = DB::table('shopcar')->where('id',$v)->delete();
    	}
    	
    	if($res){
    		echo 1;
    	} else {
    		echo 0;
    	}
    }
}
