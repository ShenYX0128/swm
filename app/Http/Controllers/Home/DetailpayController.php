<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class DetailpayController extends Controller
{
    //
    public function detailpay()
    {
    	$add = DB::table('address')->where('cid',session('cid'))->get();
    	$img = DB::table('goods_img')->join('goods', 'goods_img.gid', '=', 'goods.id')->select('goods_img.gid','goods_img.id','goods_img.gpic')->groupBy('gid')->get();
    	$gods = DB::table('goods')->join('detail','goods.id','=','detail.gid')->select('goods.id','detail.norns','goods.price','goods.gname','detail.d_num')->get();
    	// dd($gods);
    	$order = DB::table('orders')->where('uid',session('cid'))->orderBy('id','desc')->first();

    	// $gods = DB::table('goods')->where('gid',session('gid'))->first();
    	// $gods = session('gid');
    	// dd($gods);
    	
    	return view('home.detailpay',['title'=>'正在支付','add'=>$add,'img'=>$img,'gods'=>$gods,'order'=>$order]);
    }
    public function addpay(Request $request)
    {
    	$req = $request->except('_token');
    	// dd($req);
    	$order['gid'] = $req['gid'];
    	$order['uid'] = session('cid');
    	$add = DB::table('address')->where([['cid',session('cid')],['status','0']])->first();
    	$user = DB::table('customer')->where('id',session('cid'))->first();
    	// dd($add);
    	$order['number'] = rand(1111,9999).time();
    	$order['o_phone'] = $add->phone;
    	$order['o_address'] = $add->location;
    	$order['oname'] = $user->customername;
    	$order['addtime'] = time();
    	// dd($order);
    	if($order){
    		$res = DB::table('orders')->insert($order);
    	}
    	
    	// dd($res);
    	// dd($req['gid']);
    	// $img = DB::table('goods_img')
     //    ->join('goods', 'goods_img.gid', '=', 'goods.id')->select('goods_img.gid','goods_img.id','goods_img.gpic')->groupBy('gid')->get();
    	$god = DB::table('goods')->where('id',$req['gid'])->first();
    	$det = DB::table('orders')->where([['gid',$req['gid']],['uid',session('cid')]])->orderBy('id', 'desc')->first();
    	// dd($det);
    	$deta['oid'] = $det->id;
    	$deta['gid'] = $god->id;
    	$deta['norns'] = $req['norns'];
    	$deta['d_price'] = $god->price;
    	$deta['d_num'] = $req['d_num'];
    	// dd($deta);

    	if($deta){
    		$re = DB::table('detail')->insert($deta);
    	}
    	
    	if($res && $re){
    		echo "<script>location.href='/home/detailpay'</script>";
    	} else{
    		echo "<script>location.href='/home/detail'</script>";
    	}


    }
    public function paycreate(Request $request)
    {
    	$res = $request->except('oid');
    	$oid = $request->only('oid');
    	// var_dump($res);
    	$arr = DB::table('orders')->where('id',$oid)->update($res);
    	if($arr){
    		echo 1;
    	} else {
    		echo 0;
    	}

    } 
    public function success($id)
    {
    	$res = DB::table('orders')->where('id',$id)->get();
    	return view('home.success',['title'=>'结算成功','res'=>$res]);
    }
}
