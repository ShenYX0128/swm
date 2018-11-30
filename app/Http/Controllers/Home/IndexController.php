<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Goods;
use App\Model\Admin\Category;

class IndexController extends Controller
{
    //
    public function index()
    {
    	// 
    	$type = Category::where('pid',0)->get();
    	// dd($goods);
    	return view('home.index',['title'=>'g-mall首页','type'=>$type]);
    }
}
