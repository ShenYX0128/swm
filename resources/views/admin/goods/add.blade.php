@extends('layout.index')
@section('title',$title)
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>

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
		                        商品的添加页面
		                    </font>
		                </font>
		            </h3>
		        </div>
		        <!-- /.box-header -->
		        <!-- form start -->
		        <form role="form" action="/admin/goods" method="post" enctype="multipart/form-data">
		            <div class="box-body">
		               <div class="form-group">
		                  <label>分类名</label>
		                  <select name="tid" class="form-control">
		                    	<option value='0'>请选择</option>
		                    @foreach($rs as $v)
		                    	<option value="{{$v->id}}">
		                    		{{$v->tname}}
		                    	</option>
		                    @endforeach
		                  </select>
		                </div>
		                <div class="form-group">
		                    <label for="exampleInputPassword1">
		                        <font style="vertical-align: inherit;">
		                            <font style="vertical-align: inherit;">
		                                商品名称
		                            </font>
		                        </font>
		                    </label>
		                    <input type="text" class="form-control" id="exampleInputPassword1" name="gname" 
		                    placeholder="请输入商品的名称">
		                </div>
		                <div class="form-group">
		                    <label for="exampleInputPassword1">
		                        <font style="vertical-align: inherit;">
		                            <font style="vertical-align: inherit;">
		                                价格
		                            </font>
		                        </font>
		                    </label>
		                    <input type="text" class="form-control" id="exampleInputPassword1" name="price" 
		                    placeholder="请输入商品的价格">
		                </div>
		                <div class="form-group">
		                    <label for="exampleInputPassword1">
		                        <font style="vertical-align: inherit;">
		                            <font style="vertical-align: inherit;">
		                                规格
		                            </font>
		                        </font>
		                    </label>
		                    <input type="text" class="form-control" id="exampleInputPassword1" name="norns" 
		                    placeholder="请输入商品的规格">
		                </div>
		                <div class="form-group">
		                    <label for="exampleInputPassword1">
		                        <font style="vertical-align: inherit;">
		                            <font style="vertical-align: inherit;">
		                                库存
		                            </font>
		                        </font>
		                    </label>
		                    <input type="text" class="form-control" id="exampleInputPassword1" name="stock" 
		                    placeholder="请输入商品的库存">
		                </div>
		                <div class="form-group">
		                    <label for="exampleInputPassword1">
		                        详细信息
		                    </label>
		                    <script id="editor" name="descr" type="text/plain" style="width:600px;height:250px;"></script>
		                </div>
		                <div class="form-group">
		                    <label for="exampleInputPassword1">
		                               商品图片
		                    </label>
		                    <input type="file" id="exampleInputPassword1" name="gpic[]" multiple 
		                    >
		                </div>
		                <div class="form-group">
		                	<div class="form-group">
		                    <label for="exampleInputPassword1">
		                               状态
		                    </label>
		                    <p><input type="radio" name="status" id="optionsRadios1" value="0">
		                      下架&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="status" id="optionsRadios2" value="1" checked="">
		                      在售</p>
		                </div>
		                      
		                      
               		 </div>
		            </div>
		            <!-- /.box-body -->
		            <div class="box-footer">
		                <!-- <button type="submit" class="btn btn-primary">
		                   添加
		                </button> -->
		                {{csrf_field()}}
		                <input type="submit" name="" class="btn btn-primary" value="添加">
		            </div>
		        </form>
		    </div>
		</div>
      </div>
    	
    </section>
	
@stop
@section('js')
<script type="text/javascript">
	var ue = UE.getEditor('editor');
</script>
@stop
