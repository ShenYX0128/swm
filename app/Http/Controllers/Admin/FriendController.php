<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Friend;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $res=Friend::where('fname','like','%'.$request->input('fname').'%')->paginate($request->input('num',10));

        // dd($res);
        return view('admin.friend.index',[
            'title'=>'友情链接浏览页面',
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
        return view('admin.friend.add',['title'=>'友情链接添加页面']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //
        $res=$req->except('_token');

        // dd($req->all());

         try{

            $data = Friend::create($res);
            
            if($data){
                return redirect('/admin/friend')->with('success','添加成功');
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
        //
        $res=Friend::find($id);

        return view('admin.friend.edit',['title'=>'链接修改页面','res'=>$res]);
        
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
        //
       $res=$request->except(['_token','_method']);

          try{
            $data=Friend::where('id',$id)->update($res);

            if($data){
                return redirect('/admin/friend')->with('success','修改成功');
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
            $row=Friend::destroy($id);

            if($row){
                return redirect('/admin/friend')->with('success','删除成功');
            }
        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }

    }
}
