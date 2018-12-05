<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Category;
use App\Model\Admin\Goods;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {    
        $res=Category::select(DB::raw('*,CONCAT(path,id)as paths'))->where('tname','like','%'.$request->tname.'%')->orderBy('paths')->paginate($request->input('num',10));

        foreach($res as $v){

            //path
            $ps=abs(substr_count($v->path,',')-1);

            $v->tname=str_repeat('&nbsp;',$ps*10).'|--'.
            $v->tname;
        }

        return view('admin.category.index',[
            'title'=>'分类列表',
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


        //查询表里面的信息
        $rs = Category::select(DB::raw('*,CONCAT(path,id) as paths'))->
        orderBy('paths')->
        get();
        // dd($rs);
        // 家用电器
        // '|--'.电视

        foreach($rs as $v){

            //path  
            $ps =abs( substr_count($v->path,',')-1);

            //拼接  分类名
            // $v->catname = str_repeat('|--',$ps).$v->catname;

            $v->tname = str_repeat('&nbsp;',$ps*10).'|--'.$v->tname;

        }



        // select *,CONCAT(path,id) as paths from category order by paths

        return view('admin.category.add',[
            'title'=>'分类添加页面',
            'rs'=>$rs,

            
        ]);

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
            'tname' => 'required',
          
        ],[
            'tname.required' => '不能为空',
         
        ]);


       // $res= $req->all();
        $res=$request->except('_token');

        // dd($res);
        

        if($request->pid=='0'){

            $res['path']='0,';
        }else{
            //查询数据
             $rs = DB::table('type')->where('id',$request->pid)->first();

            //path.id    0,1,
             $res['path'] = $rs->path.$rs->id.',';
        }


        //往数据表里面进行添加
        try{

            $data = Category::create($res);
            
            if($data){
                return redirect('/admin/category')->with('success','添加成功');
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
        // //                //查询表里面的信息
        // $rs = Category::select(DB::raw('*,CONCAT(path,id) as paths'))->
        // orderBy('paths')->
        // get();
        // // dd($rs);
        // // 家用电器
        // // '|--'.电视

        // foreach($rs as $v){

        //     //path  
        //     $ps = abs(substr_count($v->path,',')-1);

        //     //拼接  分类名
        //     // $v->catname = str_repeat('|--',$ps).$v->catname;

        //     $v->tname = str_repeat('&nbsp;',$ps*10).'|--'.$v->tname;

        // }

        // // select *,CONCAT(path,id) as paths from category order by paths

        // return view('admin.category.adds',[
        //     'title'=>'分类添加页面',
        //     'rs'=>$rs,
        //     'id'=>$id
            
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rs=Category::select(DB::raw('*,CONCAT(path,id) as paths'))->orderBy('paths')->get();

        foreach($rs as $v){

            //path
            $ps=abs(substr_count($v->path,',')-1);

            //拼接 分类名
            $v->tname=str_repeat('&nbsp;',$ps*10).'|--'.$v->tname;
        }

        $res=Category::find($id);

        return view('admin.category.edit',[

                'title'=>'分类修改页面',
                'res'=>$res,
                'rs'=>$rs
        ]);
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
        
        // dd($request->all());
        $res=$request->only('tname','pid');
        // dd($res);
            try{
                $data=Category::where('id',$id)->update($res);
                // dd($data);
                if($data==0 || $data){
                    return redirect('/admin/category')->with('success','修改成功');
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
        
          
        //判断是否有子类
        $cate=Category::where('pid',$id)->first();

        // dd($cate);
        if($cate){
            return back()->with('error','有子类不能删');
        }
      

        //判断类别下是否有商品
        $cate=Category::find($id);
        $goods=Goods::where('tid',$cate->id)->get();

        if(count($goods)!=0){
            return back()->with('error','有商品不能删');

        }


        //删除
         try{
            $data=Category::destroy($id);

            if($data){
                return redirect('/admin/category')->with('success','删除成功');
            }
        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }



}
