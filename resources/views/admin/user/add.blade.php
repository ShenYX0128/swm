@extends('layout.index')
@section('title',$title)
@section('content')
  <section class="content">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
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
	<div class="box-body">
          <form role="form" action="/admin/user" method="post" enctype='multipart/form-data'>
            
            <!-- 用户名 -->
            <div class="form-group">
              <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">管理员名</font></font></label>
              <input type="text" class="form-control" name="username" placeholder="Enter ...">
            </div>
			
			     <!-- 密码 -->
            <div class="form-group">
                  <label for="exampleInputPassword1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">密码</font></font></label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
   
            <!-- 性别 -->
            <div class="form-group">
            	<label for="exampleInputEmail1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">性别</font></font></label>	
              <div class="radio">
                <label>
                  <input type="radio" name="sex" id="optionsRadios1" value="1"><font style="vertical-align: inherit;">男<font style="vertical-align: inherit;">
                </font></font></label>
                <label>
                  <input type="radio" name="sex" id="optionsRadios2" value="0"><font style="vertical-align: inherit;">女<font style="vertical-align: inherit;"> 
                </font></font></label>
                <label>
                  <input type="radio" name="sex" id="optionsRadios2" value="2" checked><font style="vertical-align: inherit;">保密<font style="vertical-align: inherit;"></font></font></label>
              </div>
            </div>

            <!-- 电子邮件地址 -->
            <div class="form-group">
                  <label for="exampleInputEmail1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">电子邮件地址</font></font></label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
            </div>

			<!-- 电话 -->
            <div class="form-group">
              <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">电话</font></font></label>
              <input type="text" name="phone" class="form-control" placeholder="Enter ...">
            </div>

            <!-- 管理员权限 -->
            <div class="form-group">
            	<label for="exampleInputEmail1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">管理员权限</font></font></label>	
              <div class="radio">
                <label>
                  <input type="radio" name="auth" id="optionsRadios1" value="1" ><font style="vertical-align: inherit;">管理员禁用<font style="vertical-align: inherit;">
                </font></font></label>
                <label>
                  <input type="radio" name="auth" id="optionsRadios2" value="0" checked><font style="vertical-align: inherit;">管理员启用<font style="vertical-align: inherit;"> 
                </font></font></label>
              </div>
            </div>

			<!-- 头像 -->
            <div class="form-group">
                  <label for="exampleInputFile"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">上传头像</font></font></label>
                  <input type="file" name="header" id="exampleInputFile">     
            </div>

       		{{csrf_field()}}
    	    <button type="submit" class="btn btn-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">提交</font></font></button>
            

  </form>
  </div>
        </div>
      </div>
    </div>
@endsection

@section('js')
<script>
  $('.alert').delay(1000).fadeOut(2000);
</script>
@stop