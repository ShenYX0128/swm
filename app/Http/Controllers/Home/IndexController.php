<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Goods;
use App\Model\Admin\Goodsimg;
use App\Model\Admin\Category;
use DB;
use App\Model\Admin\Banner;


class IndexController extends Controller
{
    //
    public function index()
    {
    	// 
    	$type = Category::where('pid',0)->get();
    	// $sub = Category::where('pid','>',0)->take(6)->get();
    	/*$data = Category::all();
    	$goods = Goods::all();*/
       
        foreach ($type as $k => $v) {
            $sub =Category::where('pid',$v->id)->take(6)->get();
            foreach ($sub as $key => $va) {
                $arr[] = $va;   
            } 
           $god[] = Goods::where([['tweet','=','1'],['pid','=',$v->id]])->take(6)->get(); 
        }
        foreach ($god as $ke => $val){
            foreach ($val as $k => $v) {
                $gods[$v->pid][] = $v;
                // $img[] = Goodsimg::where('gid',$v->id)->get();
            }
        }
        $img = DB::table('goods_img')
        ->join('goods', 'goods_img.gid', '=', 'goods.id')->select('goods_img.gid','goods_img.id','goods_img.gpic')->groupBy('gid')->get();
    	$data=Category::getSubCates();

    	// dd($data);
    	$banner=Banner::get();

    	return view('home.index',['title'=>'g-mall首页','type'=>$type,'arr'=>$arr,'gods'=>$gods,'img'=>$img,'data'=>$data,'banner'=>$banner]);

    }
}