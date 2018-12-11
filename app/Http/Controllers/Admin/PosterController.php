<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\Poster;
class PosterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $res = Poster::orderBy('id','asc')->where(function($query) use($request){
            // 检测关键字
            $gname = $request->input('gname');
            // 如果商品名不为空
            if(!empty($gname)){
                $query->where('name','like','%'.$gname.'%');
            }
        })->paginate($request->input('num',10));
        // dd($request);
        date_default_timezone_set('PRC');
        return view('admin.poster.index',['title'=>'后台商品管理页','res'=>$res,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.poster.add',['title'=>'后台广告添加页面']);
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
        $res = $request->except('_token','src');
        if($request->hasFile('src')){
            $name = rand(1111,9999).time();
            $suffix = $request->file('src')->getClientOriginalExtension();
            $request->file('src')->move('./uploads',$name.'.'.$suffix);
            $res['src']= '/uploads/'.$name.'.'.$suffix;
        }      
   
        $res['addtime']=time();
        $re = Poster::create($res);
        if($re){
            return redirect('/admin/poster')->with('success','添加成功');
        }else{
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
        $res = Poster::find($id);
        return view('admin.poster.edit',['title'=>'后台广告添加页面','res'=>$res]);
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
        $req = $request->only('src');
        // dd($req);
        if($req){
            $data = Poster::find($id);
            // dd($data);
            if($data->src){
                unlink('.'.$data->src);
            }
            
            $res = $request->except('_token','src','_method');
            if($request->hasFile('src')){
                $name = rand(1111,9999).time();
                $suffix = $request->file('src')->getClientOriginalExtension();
                $request->file('src')->move('./uploads',$name.'.'.$suffix);
                $res['src']= '/uploads/'.$name.'.'.$suffix;
            }
            $re = Poster::where('id',$id)->update($res);
            if($re){
                return redirect('/admin/poster')->with('success','修改成功');
            }else{
                return back()->with('error','修改成功');
            }
        }
         $res = $request->except('_token','_method');
         $re = Poster::where('id',$id)->update($res);
         if($re){
                return redirect('/admin/poster')->with('success','修改成功');
            }else{
                return back()->with('error','修改成功');
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
        $del = Poster::where('id',$id)->delete();
        if($del){
            return redirect('/admin/poster')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
