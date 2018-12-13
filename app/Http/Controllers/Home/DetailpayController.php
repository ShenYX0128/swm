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
    	return view('home.detailpay',['title'=>'正在支付']);
    }
    public function addpay(Request $request)
    {
    	$req = $request->except('_token');
    	$order['gid'] = $req['gid'];
    	$order['uid'] = session('cid');
    	$add = DB::table('address')->where([['cid',session('cid')],['status','0']])->first();
    	$user = DB::table('customer')->where('id',session('cid'))->first();
    	// dd($add);
    	$order['o_phone'] = $add->phone;
    	$order['o_address'] = $add->location;
    	$order['oname'] = $user->customername;
    	$order['addtime'] = time();
    	// dd($order);
    	// $res = DB::table('orders')->insert($order);
    	// dd($res);
    	// dd($req['gid']);
    	// $img = DB::table('goods_img')
     //    ->join('goods', 'goods_img.gid', '=', 'goods.id')->select('goods_img.gid','goods_img.id','goods_img.gpic')->groupBy('gid')->get();
    	$god = DB::table('goods')->where('id',$req['gid'])->first();
    	$det = DB::table('detail')->where([['gid',$req['gid']],['uid',session('cid')]])->last();
    	dd($det);
    	$deta['gid'] = $god->id;
    	$deta['gname'] = $god->gname;
    	$deta['d_price'] = $god->price;
    	$deta['d_num'] = $req['d_num'];
    	// dd($deta);
    	$re = DB::table('detail')->insert($deta);

    }
}
