@extends('layout.index')
@section('title',$title)
@section('content')
<section class="content">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="box box-primary">
	<div class="box-body">
		@if (count($errors) > 0)
			<div class="callout callout-danger">
            	显示错误信息
                <ul>
                	@foreach ($errors->all() as $error)
                	<li style='font-size:14px'>{{$error}}</li>
                	@endforeach
                </ul>
            </div>
        @endif
          <form role="form" action="/admin/user/{{$res->id}}" method="post" enctype='multipart/form-data'>
            
            <!-- 管理员名 -->
            <div class="form-group">
              <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">管理员名</font></font></label>
              <input type="text" class="form-control" name="username" placeholder="Enter ..." value='{{$res->username}}'>
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

            <!-- 用户权限 -->
            <div class="form-group">
            	<label for="exampleInputEmail1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">用户权限</font></font></label>	
              <div class="radio">
                <label>
                  <input type="radio" name="auth" id="optionsRadios1" value="1" @if($res->auth== 1) checked @endif><font style="vertical-align: inherit;">管理员禁用<font style="vertical-align: inherit;">
                </font></font></label>
                <label>
                  <input type="radio" name="auth" id="optionsRadios2" value="0" @if($res->auth== 0) checked @endif><font style="vertical-align: inherit;">管理员启用<font style="vertical-align: inherit;"> 
                </font></font></label>
              </div>
            </div>

			<!-- 头像 -->
            <div class="form-group">
                  <label for="exampleInputFile"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">上传头像</font></font></label>
                  <img src="{{$res->header}}" alt=""style="max-width:250px;max-height:200px;">
                  <input type="file" name="header" id="exampleInputFile">     
            </div>
       		{{csrf_field()}}

          {{method_field('PUT')}}
          
    	    <button type="submit" class="btn btn-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">修改</font></font></button>
            

          </form>
        </div>
      </div>
      </div>
      </div>
@endsection

@section('js')
<script>
  $('.callout').delay(1000).fadeOut(2000);
</script>
@stop