<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //权限显示页面
        $res =  Permission::where('url_name','like','%'.$request->url_name.'%')->paginate($request->input('num',10));
       /*  $res = Permission::orderBy('id','asc')
            ->where(function($query) use($request){
                //检测关键字
                $url_name = $request->input('url_name');
                //如果权限名不为空
                if(!empty($url_name)) {
                    $query->where('url_name','like','%'.$url_name.'%');
                }
            })
        ->paginate($request->input('num', 5));*/

        return view('admin.permission.index',[
            'title'=>'权限的列表页面',
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
        //权限添加页面
        return view('admin.permission.add',['title'=>'权限添加页面']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //权限添加方法
        $res = $request->only('url_name','url');

         try{

            $data = Permission::create($res);
            
            if($data){
                return redirect('/admin/permission')->with('success','添加成功');
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
        //权限修改页面
        $res = Permission::find($id);

        return view('admin.permission.edit',['title'=>'权限的修改页面','res'=>$res]);
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
        //权限修改方法
        $res = $request->only('url_name','url');
        //dd($res);
        try{

            $data = Permission::where('id',$id)->update($res);
            
            if($data==0 || $data){
                return redirect('/admin/permission')->with('success','修改成功');
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
        //权限删除方法
        try{

            $data = Permission::where('id',$id)->delete();
            
            if($data){
                return redirect('/admin/permission')->with('success','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
    }
}
}
