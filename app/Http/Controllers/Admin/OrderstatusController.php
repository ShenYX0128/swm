<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\OrderStatus;

class OrderstatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $res=OrderStatus::where('name','like','%'.$request->input('name').'%')->paginate($request->input('num',10));
        return view('admin.orders_status.index',[
            'title'=>'订单状态浏览',
            'res'=>$res,
            'request'=>$request
        ]);
    
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.orders_status.add',['title'=>'订单状态添加页面']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //表单验证
         $this->validate($request, [
            'name' => 'required', 
        ],[
            'name.required' => '订单状态不能为空',   
        ]);

         $res=$request->except('_token');

          try{

            $data = OrderStatus::create($res);

            // dd($data);
            
            if($data){
                return redirect('/admin/orders_status')->with('success','添加成功');
            }

        }catch(\Exception $e){

            return back()->with('error','添加失败');
        }

         

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
         $res=OrderStatus::find($id);

        return view('admin.orders_status.edit',['title'=>'订单状态修改页面','res'=>$res]);
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
                return redirect('/admin/orders_status')->with('success','修改成功');
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
        //
    }
}
