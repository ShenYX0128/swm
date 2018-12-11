<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Category;
use App\Model\Admin\Goods;
use App\Model\Admin\Goodsimg;

class ListController extends Controller
{
    public function index($id)
    {
        $con=[];
        //如果传类别ID
        if(!empty($id)){
            $path = Category::where('path','like',"%,$id,%")->get();

            // dd($path);
        }
        $ids = [];
        foreach ($path as $k => $v) {
            $ids[]=$v->id;

        }
        // dd($ids);
        //查询
        $goods=Goods::whereIn('tid',$ids)->get();
        // dd($goods);
        foreach ($goods as $k => $v) {
            $gid = $v->id;
            // dd($gid);
        }
        $gimg=Goodsimg::where('gid',$gid)->first();
        // dd($gimg);

        return view('home.list',['title'=>'列表页','goods'=>$goods,'gimg'=>$gimg]);
    }
}
