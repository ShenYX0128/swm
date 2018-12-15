<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ShopcarController extends Controller
{
<<<<<<< Updated upstream
    //
    public function shopcar()
    {
    	$res = DB::table('shopcar')->get();
    	// dd($res);
    	return view('home.shopcar',['title'=>'g-mall商城---购物车','res'=>$res]);
    }
    public function shopdata(Request $request)
=======
    //购物车显示
    public function shopcar(Request $request)
    {
       
    	$shop = session('shop');
        // dd($shop);
        
        return view('home.shopcar',[
            'title'=>'商品购物车页面',
            'shop'=>$shop
        ]);
    }
   
     // 删除商品
    public function shopdel(Request $request)
>>>>>>> Stashed changes
    {
        $id = $request->input('gid');
        
       
        // 遍历session中的商品
        $shop = session('shop');
        
     
        // 修改数量
        foreach ($shop as $key => $value) {
            if($value['id']==$id){
               unset($shop[$key]);
            }
        }
         // 将数据写入到session中 
        $request->session()->put('shop',$shop);
        echo 1;
    }
    // 购物车数量的加
    public function shopadd(Request $request)
    {   
        //获取修改的id
    	$id = $request->input('id');

        // 遍历session中的商品
        $shop=session('shop');

        //修改数量
    	foreach ($shop as $k => $v) {
    		if($v['id']==$id){
                $shop[$k]['num']=++$shop[$key]['num'];
            }
         }

         //将数据写入到session中
         $request->session()->put('shop',$shop);

         echo 1;
    }
<<<<<<< Updated upstream
    public function shopalldel(Request $request)
=======


    //购物车数量的减
    public function shopdec(Request $request)
>>>>>>> Stashed changes
    {
        //获取修改的id
        $id=$request->input('id');

        //遍历session中的商品
        $shop=session('shop');

        //修改数量
        foreach($shop as $k=>$v)
        {
            if($v['id']==$id){
                $shop[$k]['num']=--$shop[$k]['num'];
            }
        }

        //将数据写入到session中
        $request->session()->put('shop',$shop);

        echo 1;
    }
}