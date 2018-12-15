<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Orders;

class OrderDetailController extends Controller
{
    public function index()
    {
    	$or=Orders::get();

    	return view('home.order',[
    		'title'=>'订单页',
    		'or'=>$or
    		]);
    }
}
