<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\User;
use DB;
use App\Model\Admin\Comment;
use App\Model\Admin\Goods;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        // dd($request);
        $res = Comment::orderBy('id','asc')->where(function($query) use($request){
            // 检测关键字
            $gname = $request->input('gname');
            // 如果商品名不为空
            if(!empty($gname)){
                $query->where('content','like','%'.$gname.'%');
            }
        })->paginate($request->input('num',10));
        
        $user = User::select('id','username')->get();

        // dd($user);
        return view('admin.comment.index',['title'=>'后台评论管理页面','res'=>$res,'request'=>$request,'user'=>$user]);
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
        //
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
     
        $del = Comment::where('id',$id)->delete();
        if($del){
            return  redirect('/admin/comment')->with('success','删除成功');
        } else {
            return back()->with('error','删除失败');
        }
    }
}
