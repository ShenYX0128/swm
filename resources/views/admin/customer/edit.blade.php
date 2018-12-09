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
		        <form role="form" action="/admin/customer/{{$res->id}}" method="post" enctype="multipart/form-data">
		          <div class="box-body">
                  <!-- 用户名 -->
            <div class="form-group">
              <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">用户名</font></font></label>
              <input type="text" class="form-control" name="customername" placeholder="Enter ..." value='{{$res->customername}}'>
            </div>
            <!-- 性别 -->
            <div class="form-group">
              <label for="exampleInputEmail1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">性别</font></font></label>  
              <div class="radio">
                <label>
                  <input type="radio" name="sex" id="optionsRadios1" value="1" @if($res->sex== 1) checked @endif><font style="vertical-align: inherit;">男<font style="vertical-align: inherit;">
                </font></font></label>
                <label>
                  <input type="radio" name="sex" id="optionsRadios2" value="0" @if($res->sex== 0) checked @endif><font style="vertical-align: inherit;">女<font style="vertical-align: inherit;"> 
                </font></font></label>
                <label>
                  <input type="radio" name="sex" id="optionsRadios2" value="2" @if($res->sex== 2) checked @endif><font style="vertical-align: inherit;">保密<font style="vertical-align: inherit;">
          </font></font></label>
              </div>
            </div>

            <!-- 电子邮件地址 -->
            <div class="form-group">
                  <label for="exampleInputEmail1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">电子邮件地址</font></font></label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value='{{$res->email}}'>
            </div>

      <!-- 电话 -->
            <div class="form-group">
              <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">电话</font></font></label>
              <input type="text" name="phone" class="form-control" placeholder="Enter ..." value='{{$res->phone}}'>
            </div>

            <!-- 地址 -->
            <div class="form-group">
              <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">地址</font></font></label>
              <input type="text" name="location" class="form-control" placeholder="Enter ..." value='{{$res->location}}'>
            </div>

            <!-- 头像 -->
            <div class="form-group">
                  <label for="exampleInputFile"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">上传头像</font></font></label>
                  <img src="{{$res->profile}}" alt=""style="max-width:150px;max-height:100px;">
                  <input type="file" name="profile" id="exampleInputFile">     
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