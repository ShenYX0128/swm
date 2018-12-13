<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Address;
use App\Model\Admin\Friend;
use DB;


class OrderController extends Controller
{		



    public function commit(Request $req)
    {	
    	$data=$req->all();
    	dd($data);
    	// $res = DB::table('shopcar')->get();

    	$adr=Address::where([['cid',session('cid')],['status','0']])->first();

    	$fri=Friend::get();
        // dd($adr);
	    return view('home.jsy',[
	    	'title'=>'结算页',
	    	'adr'=>$adr,
	    	'fri'=>$fri
	    ]);
    }
}
