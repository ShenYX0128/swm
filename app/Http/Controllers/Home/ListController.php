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
        // $cate=Category::get();
        // dd($cate);
    
        //如果传类别ID
        // dd($id);
        if(!empty($id)){

             $path = Category::where('path','like',"%,$id,%")->pluck('id');

            // dd($path);
        }

        $goods=Goods::whereIn('tid',$path)->paginate(1);

        

        // dd($goods);
        $gid=[];
        foreach ($goods as $k => $v) {
            $gid[] = $v->id;
        }
        // dd($gid);
         $gimg=Goodsimg::whereIn('gid',$gid)->first();

          return view('home.list',['title'=>'列表页','goods'=>$goods,'gimg'=>$gimg]);
        
      
    }


    public function inx($id)
    {

        //查询
        $goods = Goods::where('tid',$id)->get();
        $gid=[];
        foreach ($goods as $k => $v) {
            $gid[] = $v->id;
        }
        // dd($gid);

        $gimg=Goodsimg::whereIn('gid',$gid)->first();
        // dd($gimg);
        //显示页面
        return view('home.list',['title'=>'列表页','goods'=>$goods,'gimg'=>$gimg]);
    }





}
