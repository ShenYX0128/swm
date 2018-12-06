@extends('layout.index')
@section('title',$title)
@section('content')
	<section class="content-header">
      <h1><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
        常规表单元素
         </font></font><small><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">预览</font></font></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 家</font></font></a></li>
        <li><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">形式</font></font></a></li>
        <li class="active"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">一般要素</font></font></li>
      </ol>
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
		                        广告添加页面
		                    </font>
		                </font>
		            </h3>
		        </div>
		        <!-- /.box-header -->
		        <!-- form start -->
		        <form role="form" action="/admin/poster/{{$res->id}}" method="post" enctype="multipart/form-data">
		            <div class="box-body">
		                <div class="form-group">
		                    <label for="exampleInputPassword1">
		                        <font style="vertical-align: inherit;">
		                            <font style="vertical-align: inherit;">
		                                广告商家
		                            </font>
		                        </font>
		                    </label>
		                    <input type="text" class="form-control" id="exampleInputPassword1" name="name" 
		                    placeholder="广告商家的名称" value="{{$res->name}}">
		                </div>
		                <div class="form-group">
		                    <label for="exampleInputPassword1">
		                        <font style="vertical-align: inherit;">
		                            <font style="vertical-align: inherit;">
		                                链接地址
		                            </font>
		                        </font>
		                    </label>
		                    <input type="text" class="form-control" id="exampleInputPassword1" name="url" 
		                    placeholder="请输入链接地址" value="{{$res->url}}">
		                </div>
		                <div class="form-group">
		                    <label for="exampleInputPassword1">
		                        <font style="vertical-align: inherit;">
		                            <font style="vertical-align: inherit;">
		                                广告内容
		                            </font>
		                        </font>
		                    </label>
		                    <input type="text" class="form-control" id="exampleInputPassword1" name="content" 
		                    placeholder="请输入广告的内容" value="{{$res->content}}">
		                </div>
		                <div class="form-group">
		                    <label for="exampleInputPassword1">
		                        <font style="vertical-align: inherit;">
		                            <font style="vertical-align: inherit;">
		                                广告图
		                            </font>
		                        </font>
		                    </label>
		                    <img src="{{$res->src}}" width="100px">
		                    <input type="file" id="exampleInputPassword1" name="src" 
		                    >
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
		                <input type="submit" name="" class="btn btn-primary" value="添加">
		            </div>
		        </form>
		    </div>
		</div>
      </div>
    	
    </section>
	
@stop
@section('js')

@stop
