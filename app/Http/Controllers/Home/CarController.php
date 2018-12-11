<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    //购物车添加
    public function shopcreate($id)
    {
    	echo $id;
    }
}
