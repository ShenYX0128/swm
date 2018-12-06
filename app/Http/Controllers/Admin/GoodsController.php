<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Type;
use DB;
use App\Model\Admin\Goods;
use App\Model\Admin\Goodsimg;
class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        //
        $res = Goods::orderBy('id','asc')->where(function($query) use($request){
            // 检测关键字
            $gname = $request->input('gname');
            // 如果商品名不为空
            if(!empty($gname)){
                $query->where('gname','like','%'.$gname.'%');
            }
        })->paginate($request->input('num',10));
        // dd($request);
        return view('admin.goods.index',['title'=>'后台商品管理页','res'=>$res,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $rs = Type::select(DB::raw('*,CONCAT(path,id) as paths'))->orderBy('paths')->get();
        foreach ($rs as $v) {
            $ps = substr_count($v->path,',');
            $v->tname = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $ps).'|--'.$v->tname;
        }
        return view('admin.goods.add',['title'=>'后台商品添加页','rs'=>$rs]);
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
        $res = $request->except('_token','gpic');
        $tid = $request->tid;
        $typ = Type::find($tid);
        $res['pid'] = $typ->pid;
        $rs = Goods::create($res);
        // var_dump($res);
        $id = $rs->id;
        // $a = $request->hasFile('gpic');
        // var_dump($a);
        // echo $rs;
        // exit;
        // dd($res);
        // 模型关联 一对多
        if($request->hasFile('gpic')){
            $file = $request->file('gpic');
            // var_dump($file);
            $arr = [];
            foreach ($file as $k => $v) {
              $ar = [];
              $ar['gid'] = $id;
                // 设置名字
                $name = rand(1111,9999).time();
                // 后缀
                $suffix = $v->getClientOriginalExtension();
                // 移动
                $v->move('./uploads',$name.'.'.$suffix);
                $ar['gpic'] = '/uploads/'.$name.'.'.$suffix;
                // echo $v;
                $arr[] = $ar;
            }
        }
        // 插入数据 一对多
        $data = Goods::find($id);
        try{
            $gs = $data->gis()->createMany($arr);
            if($gs){
                return redirect('/admin/goods')->with('success','添加成功');
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

        // $res = Goodsimg::destroy($id);
        $res = Goodsimg::where('id',$id)->delete();
        if($res){
            echo 1;
        } else {
            echo 0;
        }
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
        $rs = Type::select(DB::raw('*,CONCAT(path,id) as paths'))->orderBy('paths')->get();
        foreach ($rs as $v) {
            $ps = substr_count($v->path,',');
            $v->tname = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $ps).'|--'.$v->tname;
        }
        $res = Goods::find($id);
        $gimg = Goodsimg::where('gid',$id)->get();
        // dd($gimg);
        return view('admin.goods.edit',['title'=>'后台商品修改页面','rs'=>$rs,'res'=>$res,'gimg'=>$gimg]);
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
        
        
        $res = $request->except('_token','_method','gpic');
        $data = Goods::where('id',$id)->update($res);
        //表单验证
        $rs = Goodsimg::where('gid',$id)->get();
        $gpic = $request->only('gpic');
        // dd($gpic);
        // ::where('uid',$uid)->groupBy('tag')->get();
        if($gpic){
            foreach ($rs as $v) {
                //
                unlink('.'.$v->gpic); 
            }

            // 关联表信息
            if($request->hasFile('gpic')){
                $file = $request->file('gpic');
                // dd($file);
                $arr = [];
                foreach ($file as $k => $v) {
                    $ar = [];
                    $ar['gid'] = $id;
                    $name = rand(1111,9999).time();
                    $suffix = $v->getClientOriginalExtension();
                    $v->move('./uploads',$name.'.'.$suffix);
                    $ar['gpic'] = '/uploads/'.$name.'.'.$suffix;
                    $arr[] = $ar;
                }
            }
            $rs = Goodsimg::where('gid',$id)->insert($arr);
            if($rs){
                return redirect('/admin/goods')->with('success','修改成功');
            }
        }
        return redirect('/admin/goods')->with('success','修改成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //根据id 获取图片的路径
        $data = Goodsimg::where('gid',$id)->get();
        foreach ($data as $k => $v) {
            unlink('.'.$v->gpic); 
        }
        // 根据id删除商品信息
        $del = Goods::where('id',$id)->delete();
        $gimgs = Goodsimg::where('gid',$id)->delete();
        if($del && $gimgs)
        {
            return  redirect('/admin/goods')->with('success','删除成功');
        } else {
            return back()->with('error','添加失败');
        }
    }
}
