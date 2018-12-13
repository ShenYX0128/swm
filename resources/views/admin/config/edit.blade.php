@extends('layout.index')
@section('title',$title)
@section('content')
	<section class="content-header">
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
		                        {{$title}}
		                    </font>
		                </font>
		            </h3>
		        </div>
		        <!-- /.box-header -->
		        <!-- form start -->
		        <form role="form" action="/admin/configupdate" method="post" enctype="multipart/form-data">
		          <div class="box-body">
            
            <!-- 网站名 -->
            <div class="form-group">
              <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">网站名</font></font></label>
              <input type="text" class="form-control" name="webname"  value='{{$config->webname}}'>
            </div>
            
              <!-- 网站关键字 -->
            <div class="form-group">
                  <label for="exampleInputEmail1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">网站关键字</font></font></label>
                  <input type="text" name="keyword" class="form-control" id="exampleInputEmail1" value='{{$config->keyword}}'>
            </div>

             <!-- 网站描述 -->
            <div class="form-group">
              <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">网站描述</font></font></label>
              <input type="text" name="descript" class="form-control" value='{{$config->descript}}'>
            </div>

            <!-- 网站状态 -->
            <div class="form-group">
              <label for="exampleInputEmail1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">网站状态</font></font></label>  
              <div class="radio">
                <label>
                  <input type="radio" name="status" id="optionsRadios1" value="1" @if($config ->status== 1) checked @endif><font style="vertical-align: inherit;">开启<font style="vertical-align: inherit;">
                </font></font></label>
                <label>
                  <input type="radio" name="status" id="optionsRadios2" value="0" @if($config ->status== 0) checked @endif><font style="vertical-align: inherit;">关闭<font style="vertical-align: inherit;"> 
                </font></font></label>
              </div>
            </div>

            <!-- 网站logo -->
            <div class="form-group">
                  <label for="exampleInputFile"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">网站logo</font></font></label>
                  <img src="{{$config->logo}}" alt=""style="max-width:150px;max-height:100px;">
                  <input type="file" name="logo" id="exampleInputFile">     
            </div>
          
          {{csrf_field()}}

          {{method_field('PUT')}}
          
          <button type="submit" class="btn btn-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">修改</font></font></button>
            
		    </div>
		  </form>
		    </div>
		</div>
      </div>
    	
    </section>
	
@stop
@section('js')
<script>
  $('.alert').delay(1000).fadeOut(2000);
</script>
@stop