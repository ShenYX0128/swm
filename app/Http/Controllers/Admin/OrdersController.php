<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Orders;
use App\Model\Admin\OrderStatus;
use App\Model\Admin\Goods;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $res=Orders::where('oname','like','%'.$request->oname.'%')->orderBy('addtime','desc')->paginate($request->input('num',10));

        $statuss=OrderStatus::get();
     
        return view('admin.orders.index',[
            'title'=>'订单列表',
            'res'=>$res,
            'request'=>$request,
            'statuss'=>$statuss

        ]);
    }

    public function detail(Request $request)
    {   
        $id=$_GET['id'];
      

        $res=Goods::where('gname','like','%'.$request->input('gname').'%')->paginate($request->input('num',10));
        // 获取订单表里的ID等于传过来的id
        $ors = \DB::table('orders')->where('id','=',$id)->get();
        // 商品表里的信息
        $sp = \DB::table('goods')->get();
        // dd($sp);
        return view('admin.orders.order_detail',[
            'title'=>'订单详情',
            'ors'=>$ors,
            'sp'=>$sp,
            'request'=>$request,
            'res'=>$res
        ]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res=Orders::find($id);
        // dd($res);
        $statuss=OrderStatus::get();
        return view('admin.orders.edit',['title'=>'订单修改页面','res'=>$res,'sta'=>$statuss]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          $res=$request->only('o_status');
         
          try{
            $data=Orders::where('id',$id)->update($res);

            if($data){
                return redirect('/admin/orders')->with('success','修改成功');
            }
        }catch(\Exception $e){

            return back()->with('error','修改失败');
        }
    }   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        


          //删除
         try{
            $data=Orders::destroy($id);

            if($data){
                return redirect('/admin/orders')->with('success','删除成功');
            }
        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }
}
