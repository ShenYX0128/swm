<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserEditRequest;
use App\Model\Admin\User;
use DB;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $res = User::orderBy('id','asc')
            ->where(function($query) use($request){
                //检测关键字
                $username = $request->input('username');
                $email = $request->input('email');
                //如果用户名不为空
                if(!empty($username)) {
                    $query->where('username','like','%'.$username.'%');
                }
                //如果邮箱不为空
                if(!empty($email)) {
                    $query->where('email','like','%'.$email.'%');
                }
            })
        ->paginate($request->input('num', 2));
        return view('admin.user.index',[
            'title'=>'用户的列表页面',
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
        //
        return view('admin.user.add',['title'=>'添加用户']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
        $res = $request->except('_token');

        
         if($request->hasFile('header')){
            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $suffix = $request->file('header')->getClientOriginalExtension();

            $request->file('header')->move('./uploads',$name.'.'.$suffix);

            $res['header'] = '/uploads/'.$name.'.'.$suffix;
        }    

        //网数据表里面添加数据  hash加密
        $res['password'] = Hash::make($request->password);
       
        try{
 
            $data = User::create($res);
            
            if($data){
                return redirect('/admin/user')->with('success','添加成功');
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
        //显示修改用户
        $res = User::find($id);

        return view('admin.user.edit',[
            'title'=>'用户的修改页面',
            'res'=>$res,
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        //修改用户
        $res = $request->except('_token','_method','header');

        
         if($request->hasFile('header')){
            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $suffix = $request->file('header')->getClientOriginalExtension();

            $request->file('header')->move('./uploads',$name.'.'.$suffix);

            $res['header'] = '/uploads/'.$name.'.'.$suffix;
        }

        try{
 
            $data = User::where('id', $id)->update($res);
            
            if($data){
                return redirect('/admin/user')->with('success','修改成功');
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
        //删除用户
         try{

            $res = User::destroy($id);
            
            if($res){
                return redirect('/admin/user')->with('success','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }
}
