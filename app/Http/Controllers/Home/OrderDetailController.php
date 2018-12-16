<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Orders;
use App\Model\Admin\Goods;
use App\Model\Admin\Address;

use App\Model\Admin\Goods;
use App\Model\Admin\Address;


class OrderDetailController extends Controller
{
    public function index()

    {   
        $uid=session('cid');
        // dd($uid);
    	$or=\DB::table('orders')->where('uid',$uid)->orderBy('addtime','desc')->get();
        $sp=Goods::get();
        // 待评价
        $dp=\DB::table('orders')->where('o_status','=',3)->where('uid',$uid)->get();
        // dd($dp);
        //待收货
        $ds=\DB::table('orders')->where('o_status','=',1)->where('uid',$uid)->get();
        //已完成
        $wg=\DB::table('orders')->where('o_status','=',2)->where('uid',$uid)->get();
       // dd($wg);
    	return view('home.order',[
    		'title'=>'订单页',
    		'or'=>$or,
    		'sp'=>$sp,
            'dp'=>$dp,
            'ds'=>$ds,
            'wg'=>$wg
    		]);
    }

    public function orderinfo(Request $request)
    {   
        $id=$_GET['id'];
        $uid = session('cid');
        
        // 获取地址表里的cid 等于session里的用户id 
        $addrs = \DB::table('address')->where('cid','=',$uid)->get();
        // 获取订单表里的ID等于传过来的id
        $ors = \DB::table('orders')->where('id','=',$id)->get();
        
        // 商品表里的信息
        $sp = \DB::table('goods')->get();
        return view('home.orderdetail',[
            'title'=>'订单详情',
            'addrs'=>$addrs,
            'ors'=>$ors,
            'sp'=>$sp
        ]);
    }

}
