<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\Goods;
use App\Model\Admin\Goodsimg;
class DetailController extends Controller
{
    //
    public function detail($id)
    {
    	$good = Goods::where('id',$id)->get();
    	$imgs = Goodsimg::where('gid',$id)->get();
    	$img = Goodsimg::where('gid',$id)->first();
    	// dd($img);
    	return view('home.detail',['title'=>'前台详情页','good'=>$good,'imgs'=>$imgs,'img'=>$img]);
    }
    public function detailadd()
    {

    }
}
