<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\Goods;
use App\Model\Admin\Goodsimg;
// use App\Model\Admin\Shopcar;
class DetailController extends Controller
{
    //
    public function detail($id)
    {
    	$good = Goods::where('id',$id)->get();
    	$imgs = Goodsimg::where('gid',$id)->get();
    	$img = Goodsimg::where('gid',$id)->first();
        foreach ($good as $k => $v) {
            $arr = explode(',',$v->norns);
        }
    	// dd($good);
    	return view('home.detail',['title'=>'前台详情页','good'=>$good,'imgs'=>$imgs,'img'=>$img,'arr'=>$arr]);
    }
    public function detailadd(Request $request)
    {
        $res = $request->arr;
        $arr = explode(',',$res);
        $arr = ['address'=>$arr[0],'norns'=>$arr[1],'num'=>$arr[2],'name'=>$arr[3],'gid'=>$arr[4],'shop_img'=>$arr[5],'prime'=>$arr[6]];

        // var_dump($arr);
        $req = DB::table('shopcar')->insert($arr);

        if($req) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
