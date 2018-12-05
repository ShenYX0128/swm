<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Category;
use App\Model\Admin\Banner;


class IndexController extends Controller
{
    //
    public function index()
    {	
    	$data=Category::getSubCates();

    	// dd($data);
    	$banner=Banner::get();

    	return view('home.index',['title'=>'g-mall首页','data'=>$data,'banner'=>$banner]);
    }
}
