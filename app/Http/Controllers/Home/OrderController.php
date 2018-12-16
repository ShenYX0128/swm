<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Address;
use App\Model\Admin\Friend;
use App\Model\Admin\Orders;
use DB;


class OrderController extends Controller
{		


    public function commit(Request $req)
    {	
         // 接收到商品的数据
        $idArr = $req->input('items');
        
        // dd($idArr);
        if($idArr == null){
              return redirect('shopcar');
              
        }else{
            // 读取session
            $shop = session('shop');
            // dd($shop);
            // 声明新数组
            $newArr = array();

            foreach ($idArr as $key => $value) {
                foreach ($shop as $k => $v) {

                    if($v['id']==$value){
                        $newArr[] = $v;

                    }
                }
            }

        }
       
    	// $res = DB::table('shopcar')->get();
    	// $adr=Address::where([['cid',session('cid')],['status','0']])->first();
        // dd($adr);
    	$fri=Friend::get();
        // dd($adr);
	    return view('home.jsy',[
	    	'title'=>'结算页',
	    	// 'adr'=>$adr,
	    	'fri'=>$fri,
            'newArr'=>$newArr
	    ]);
    }


    public function jiesuan(Request $request)
    {

        $shop = session('shop');

        $res = $request->except('_token');
       
        //获取 session userid 用户ID
        $session_id = $request->session()->get('cid');

        //获取全部商品ID
        $shopid = $res['shopid'];
        //单价
        $price = $res['price'];
        //获取每个商品数量
        $num = $res['num'];


        //获取用户默认收货地址
        $addr_data = Address::where('cid','=',$session_id)->where('status','=','0')->first();
        
        //判断用户是否有默认地址
        if(count($addr_data) != 1){
            echo "没有默认地址";
        }

        //随机订单号
        $order_number = rand(100000000,999999999);

        //用户ID
        $data_cont['uid'] = $session_id;
        //订单号
        $data_cont['number'] = $order_number;
        //收货地址
        $data_cont['o_address'] = $addr_data['id'];

              //收货人姓名
        $data_cont['oname'] = $addr_data['name'];
              //收货人电话
        $data_cont['o_phone'] = $addr_data['phone'];
        //订单状态  确认收货
        $data_cont['o_status'] = 1;
        //下单时间
        $data_cont['addtime'] = time();
       


        for ($i=0; $i < count($shopid); $i++) { 
            //echo "商品ID：".$shopid[$i]."单价：".$price[$i]."数量：".$num[$i]."用户ID：".$session_id. "收货地址ID：" .$addr_data['id'] ."<br>";
            
            //商品ID
            $data_cont['gid'] = $shopid[$i];
            //价格
            $data_cont['total'] = $price[$i];
            //数量
            $data_cont['num'] = $num[$i];

            Orders::create($data_cont);
           
           
        }

        //商品一共价格
        $pricesum = $res['pricesum'];
        
         // 遍历session中的商品
        $shop = session('shop');
        
        // 修改数量
        foreach ($shop as $key => $value) {
            foreach ($shopid as $k => $v) {
               if($v == $value['id'])
               {
                 unset($shop[$key]);
               }
            }
        }

        // dd($shop);
        // 将数据写入到session中 
        $request->session()->put('shop',$shop);
       
        $fri=Friend::get();

       

        return view('home.success1',[
            'title'=>'结算页面',
            'pricesum' => $pricesum,
            'codecode' => $order_number,
            'shop'=>$shop,
            'fri'=>$fri,

        ]);
    }
}
