<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\Goods;
use App\Model\Admin\Goodsimg;
use Illuminate\Support\Facades\Input;
// use App\Model\Admin\Shopcar;
class DetailController extends Controller
{
    //
    public function detail(Request $request,$id)
    {
        // 商品详情
        // dd($id);
         session('gid',$id);
        // dd($a);
    	$good = Goods::where('id',$id)->get();
    	$imgs = Goodsimg::where('gid',$id)->get();
    	$img = Goodsimg::where('gid',$id)->first();
        foreach ($good as $k => $v) {
            $arr = explode(',',$v->norns);
            $prices = explode(',', $v->price);
            $disc = explode(',', $v->discount);
        }
        $ord = DB::table('orders')->where([['gid',$id],['o_status',0]])->get();
        foreach ($ord as $k => $v) {
            $det = DB::table('detail')->where('oid',$v->id)->get();
        }
        // dd($det);
       /* $ord = DB::table('orders')->join('detail','detail.oid','=','orders.id')->join('orders','orders.o_status','0')->select('detail.id')->get();
    	dd($ord);*/
        // 评论
        /*// $com = DB::table('comment')->where('gid',$id)->get();
        $com = DB::table('goods')->join('comment','goods.id', '=', 'comment.gid')
                    ->select('goods.norns','comment.uid','comment.gid','comment.content','comment.star','comment.addtime')
                ->paginate(1);
        foreach ($com as $k => $v) {
            $user = DB::table('customer')->where('id',$v->uid)->get();
        }*/
        
        // dd($com->links());
        //1、查询数据库总条数
        $count = count(DB::table('goods')->join('comment','goods.id', '=', 'comment.gid')->select('goods.norns','comment.uid','comment.gid','comment.content','comment.star','comment.addtime')
                ->get());
        // dd($count);
        //2、设置每页显示条数
        $rev = '1';
        //3、求总页数
        $sums = ceil($count/$rev);
        // dd($sums);
        //4、求单前页
        $page = Input::get('page');
        if(empty($page)){
        $page = "1";
        }
        //5、设置上一页、下一页
        $prev = ($page-1)>0?$page-1:1;
        $next = ($page+1)<$sums?$page+1:$sums;
        // dd($next);
        //6、求偏移量
        $offset = ($page-1)*$rev;
        //7、sql查询数据库
        $data = DB::table('goods')->join('comment','goods.id', '=', 'comment.gid')->select('goods.norns','comment.uid','comment.gid','comment.content','comment.star','comment.addtime')
                ->paginate($rev);
        //8、数字分页(可有可无)
        $pp = array();
        for($i=1;$i<=$sums;$i++){
        $pp[$i]=$i;
        }
        
        foreach ($data as $k => $v) {
            $user = DB::table('customer')->where('id',$v->uid)->get();
        }
        // dd($user);
    	return view('home.detail',['title'=>'前台详情页','good'=>$good,'imgs'=>$imgs,'img'=>$img,'arr'=>$arr,'prices'=>$prices,'disc'=>$disc,'data'=>$data,'det'=>$det,'user'=>$user,'prev'=>$prev,'next'=>$next,'sums'=>$sums,'pp'=>$pp,'page'=>$page]);
    }
    public function detailadd(Request $request)
    {
        $res = $request->arr;
        var_dump($res);
        $arr = explode(',',$res);
        $arr = ['address'=>$arr[0],'norns'=>$arr[1],'num'=>$arr[2],'name'=>$arr[3],'gid'=>$arr[4],'shop_img'=>$arr[5],'prime'=>$arr[6],'uid'=>session('cid')];

        // var_dump($arr);
        $req = DB::table('shopcar')->insert($arr);

        if($req) {
            echo 1;
        } else {
            echo 0;
        }
    }
    public function page(){
        //1、查询数据库总条数
        $count = count(DB::table('goods')->join('comment','goods.id', '=', 'comment.gid')
                    ->select('goods.norns','comment.uid','comment.gid','comment.content','comment.star','comment.addtime')
                ->get());
        //2、设置每页显示条数
        $rev = '1';
        //3、求总页数
        $sums = ceil($count/$rev);
        //4、求单前页
        $page = Input::get('page');
        if(empty($page)){
        $page = "1";
        }
        //5、设置上一页、下一页
        $prev = ($page-1)>0?$page-1:1;
        $next = ($page+1)<$sums?$page+1:$sums;
        //6、求偏移量
        $offset = ($page-1)*$rev;
        //7、sql查询数据库
        $data = DB::table('goods')->join('comment','goods.id', '=', 'comment.gid')->select('goods.norns','comment.uid','comment.gid','comment.content','comment.star','comment.addtime')
                ->paginate($rev);
        //8、数字分页(可有可无)
        $pp = array();
        for($i=1;$i<=$sums;$i++){
        $pp[$i]=$i;
        }
        foreach ($data as $k => $v) {
            $user = DB::table('customer')->where('id',$v->uid)->get();
        }
        return view('home.page',['data'=>$data,'user'=>$user,'prev'=>$prev,'next'=>$next,'sums'=>$sums,'pp'=>$pp,'page'=>$page]);
    }
  
}
