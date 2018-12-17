<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Goods;
use App\Model\Admin\Goodsimg;
use App\Model\Admin\Category;
use App\Model\Admin\Config;
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
       // dd($type);
        foreach ($type as $k => $v) {
            $sub =Category::where('pid',$v->id)->take(6)->get();
            foreach ($sub as $key => $va) {
                $arr[] = $va;   
            } 
            // echo $sub;

           $god[] = Goods::where([['tweet','=','1'],['pid','=',$v->id],['status','=','1']])->take(6)->get(); 
        }
        // dd($arr);
        if(!empty($god)){
            foreach ($god as $ke => $val){
                foreach ($val as $k => $v) {
                    $gods[$v->pid][] = $v;

                    // $img[] = Goodsimg::where('gid',$v->id)->get();
                    // $a = $k;
                }
            }
        }
        foreach ($gods as $k => $v) {
            $array[] = $k;
        }
       
        // dd($a[0]);
        $img = DB::table('goods_img')
        ->join('goods', 'goods_img.gid', 'goods.id')->select('goods_img.gid','goods_img.id','goods_img.gpic')->groupBy('gid')->get();
    	$data=Category::getSubCates();
        
        /*dd($gods);
    	dd($type);*/
    	$banner=Banner::get();
        $config = Config::where('id',1)->get();
        $adv = DB::table('poster')->get();
    	return view('home.index',['title'=>$config[0]->webname,'type'=>$type,'arr'=>$arr,'gods'=>$gods,'img'=>$img,'data'=>$data,'banner'=>$banner,'adv'=>$adv,'array'=>$array]
    );

    }

}

 