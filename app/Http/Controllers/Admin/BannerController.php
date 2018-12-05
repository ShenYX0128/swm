<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $res=Banner::where('url','like','%'.$request->input('url').'%')->paginate($request->input('num',10));

        // dd($res);
        return view('admin.banner.index',[
            'title'=>'轮播浏览页面',
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
         
        


        return view('admin.banner.add',['title'=>'轮播添加页面']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {    
        //表单验证
         $this->validate($req, [
            
            'url' => 'required',
            'src' => 'required',
          
        ],[
            
            'url.required' => '链接地址不能为空',
            'src.required' => '请选择上传文件',
         
        ]);

     $res=$req->except('_token');

         if($req->hasFile('src')){
            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $suffix = $req->file('src')->getClientOriginalExtension();

            $req->file('src')->move('./uploads',$name.'.'.$suffix);

            $res['src'] = '/uploads/'.$name.'.'.$suffix;
               
            }

      

     try{
        $data = Banner::create($res);

         if($data){
                return redirect('/admin/banner')->with('success','添加成功');
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
        $res=Banner::find($id);

        return view('admin.banner.edit',['title'=>'轮播修改页面','res'=>$res]);
        
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
        


        $res=$request->except(['_token','_method','src']);
    
     
      
         if($request->hasFile('src')){
            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $suffix = $request->file('src')->getClientOriginalExtension();

            $request->file('src')->move('./uploads',$name.'.'.$suffix);

            $res['src'] = '/uploads/'.$name.'.'.$suffix;
               
            }

         // dd($res);
          try{
            $data=Banner::where('id',$id)->update($res);


            if($data){
                return redirect('/admin/banner')->with('success','修改成功');
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
            $row=Banner::destroy($id);

            if($row){
                return redirect('/admin/banner')->with('success','删除成功');
            }
        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }
}
