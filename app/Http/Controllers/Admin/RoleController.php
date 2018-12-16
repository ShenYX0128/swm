<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Role;
use App\Model\Admin\Permission;
use DB;

class RoleController extends Controller
{   

    public function role_per(Request $request)
    {   
        //获取角色名

        $id = $request->id;

        $res = Role::find($id);

        $info = [];
        foreach($res->pers as $k => $v){
            $info[] = $v->id;

        }


        //把所有的权限路径查询出来
        $per = Permission::all();

        return view('admin.role.role_per',[

            'title'=>'角色添加权限的页面',
            'res'=>$res,
            'per'=>$per,
            'info'=>$info

        ]);
    }

    public function do_role_per(Request $request)
    {
        //角色id
        $id = $request->id;

        //先删除数据
        DB::table('role_permission')->where('role_id',$id)->delete();

        //权限id
        $per_id = $request->per_id;

        $pers = [];
        foreach($per_id as $k => $v){
            $rs = [];
            $rs['role_id'] = $id;
            $rs['per_id'] = $v;
            $pers[] = $rs;
        }

        //再插入数据
        $data = DB::table('role_permission')->insert($pers);

        if($data){

            return redirect('admin/role')->with('success','添加成功');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //角色浏览页面
        $res =  Role::where('role_name','like','%'.$request->role_name.'%')->paginate($request->input('num',5));


        return view('admin.role.index',[
            'title'=>'角色的列表页面',
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
        //角色的添加页面
        return view('admin.role.add',['title'=>'角色的添加页面']);
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

        $rs = $request->only('role_name');
        try{

            $data = Role::create($rs);
            
            if($data){
                return redirect('/admin/role')->with('success','添加成功');
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
        //角色修改页面
         $res = Role::where('id',$id)->first();

        return view('admin.role.edit',['title'=>'角色的添加页面','res'=>$res]);
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
        //角色修改方法
        $res = $request->only('role_name');

         try{

            $data = Role::where('id',$id)->update($res);
            
            if($data==0 || $data){
                return redirect('/admin/role')->with('success','修改成功');
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
        //删除角色
        try{

            $data = Role::destroy($id);
            
            if($data){
                return redirect('/admin/role')->with('success','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }
}
