<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Orders;

class CarController extends Controller
{
    //购物车添加
    public function shopcreate($id)
    {
    	echo $id;
    }



    //确认收货ajax
    public function order_okgoods()
    {
        //获取ID
        $goodsid = $_GET['id'];

        //修改订单状态为 待评价
        $result = \DB::table('orders')->where('id','=',$goodsid)->update(['o_status' => 3]);
        
       
        if($result){
            $jieg=array(
                "zhuangt"=>"0",
                "goodsid" => $goodsid,
                "tishi"=>"确认收货成功！",
            );
        }else {
            $jieg=array(
                "zhuangt"=>"1",
                "tishi"=>"操作失败！",
            );
        }


        return response()->json($jieg);
    }

}
