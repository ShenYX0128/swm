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

        if($ord){
            foreach ($ord as $k => $v) {
                $det = DB::table('detail')->where('oid',$v->id)->get();
            }
        }else{
            echo '该商品没有评论';
        }
        // dd($ord);
       /* $ord = DB::table('orders')->join('detail','detail.oid','=','orders.id')->join('orders','orders.o_status','0')->select('detail.id')->get();
    	dd($ord);
        // 评论
        // $com = DB::table('comment')->where('gid',$id)->get();
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
    	return view('home.detail',['title'=>'前台详情页','good'=>$good,'imgs'=>$imgs,'img'=>$img,'arr'=>$arr,'prices'=>$prices,'disc'=>$disc,'data'=>$data,'user'=>$user,'prev'=>$prev,'next'=>$next,'sums'=>$sums,'pp'=>$pp,'page'=>$page]);
    }
    public function detailadd(Request $request)
    {
        $data = session('shop')?session('shop'):array();
        $a = 0;
        // 如果存在 进行遍历  
        if($data){
            foreach ($data as $key => &$value) {
                if($value['id']==$_GET['id']){
                    // 如果购物车里有该商品  在进行加的时候  将购物车里面的加进行叠加
                    $value['num']=$value['num']+$_GET['num'];
                    $a = 1;
                }
            }
        }

        if(!$a){
            $data[]=array(
               
                "id"=>$_GET['id'],
                "num"=>$_GET['num'],
                "goodsinfo"=>DB::table("goods")->where('id',$_GET['id'])->first(),
            );
        }
       
        // 将数据写入到session中 
        $request->session()->put('shop',$data);
        $data = session('shop');
        
        return redirect('shopcar');
        
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
