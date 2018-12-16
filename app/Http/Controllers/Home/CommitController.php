<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CommitController extends Controller
{
    //评论管理
    public function comment() 
    {
    	$com = DB::table('comment')->where('uid',session('cid'))->get();
    	// dd($com);
    	$img = DB::table('goods_img')->join('goods', 'goods_img.gid', '=', 'goods.id')->select('goods_img.gid','goods_img.id','goods_img.gpic','goods.gname')->groupBy('gid')->get();
    	/*foreach ($com as $k => $v) {
    		$god[] = DB::table('goods')->where('id',$v->gid)->get();
    	}
    	foreach ($god as $k => $v) {
    		foreach ($v as $key => $value) {
    			$gods[] = $value;
    		}
    		
    	}
    	dd($god);*/
    	return view('home.comment',['title'=>'评论管理','com'=>$com,'img'=>$img]);
    }
    // 评论添加页面
    public function commentlist($id)
    {
    	// dd($id);
    	$ord = DB::table('orders')->where([['o_status',3],['id',$id],['uid',session('cid')]])->get();
    	// dd($ord);
    	$img = DB::table('goods_img')->join('goods', 'goods_img.gid', '=', 'goods.id')->select('goods_img.gid','goods_img.id','goods_img.gpic')->groupBy('gid')->get();
    	// dd($img);
    	foreach ($ord as $k => $v) {
    		$gods = DB::table('goods')->where('id',$v->gid)->get();
    	}
    	
    	// dd($gods);
    	return view('home.commentlist',['title'=>'商品评论','ord'=>$ord,'img'=>$img,'gods'=>$gods]);
    }
    public function commentadd(Request $request)
    {
    	$res = $request->except('oid');
    	$oid = $request->only('oid');
    	$res['addtime'] = time();
    	$res['uid'] = session('cid');
    	var_dump($res);
    	$req = DB::table('comment')->insert($res);
    	if($req){
    		$suc = DB::table('orders')->where('id',$oid)->update(['o_status'=>2]);
    		
    	}
    	if($suc){
    		echo 1;
    		}
    }
}
