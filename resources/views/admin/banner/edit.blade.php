@extends('layout.index')
@section('title',$title)


@section('content')
  <section class="content-header col-md-offset-5">
      <h1><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
        轮播修改页面
         </font></font><small><font style="vertical-align: inherit;"></font></small>
      </h1>
     
    </section>



    <section class="content">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                           
                        </font>
                    </font>
                </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="/admin/banner/{{$res->id}}" method="post" enctype="multipart/form-data" >
                <div class="box-body">

                    
        
                     <div class="form-group">
                        <label for="exampleInputPassword1">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    链接地址
                                </font>
                            </font>
                        </label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="url" 
                        placeholder="请输入链接名称" value="{{$res->url}}">
                    </div>

                     <div class="form-group">
                        <label for="exampleInputPassword1">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    图片链接
                                </font>
                            </font>
                        </label>
                        <img src="{{$res->src}}" alt="">
                        <input type="file" class="" id="exampleInputPassword1" name="src" 
                        placeholder="请输入链接名称">
                    </div>


                   </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <!-- <button type="submit" class="btn btn-primary">
                       添加
                    </button> -->
                    {{csrf_field()}}

                    {{method_field('PUT')}}
                    <input type="submit" name="" class="btn btn-primary" value="修改">
                 
                </div>
            </form>
        </div>
    </div>
      </div>
      
    </section>
  
@stop

