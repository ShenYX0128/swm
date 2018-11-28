@extends('layout.index')
@section('title',$title)
@section('content')
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
         
          <form role="form" action="/admin/dopasschange" method="post" enctype='multipart/form-data'>
            
            <!-- 密码 -->
            <div class="form-group">
             <label for="exampleInputPassword1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">原密码</font></font></label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">新密码</font></font></label>
              <input type="password" name="newpassword" class="form-control" id="exampleInputPassword1" placeholder="newPassword">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">确认密码</font></font></label>
              <input type="password" name="qpassword" class="form-control" id="exampleInputPassword1" placeholder="qpassword">
            </div>
           
       		{{csrf_field()}}

          {{method_field('PUT')}}
          
    	    <button type="submit" class="btn btn-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">修改</font></font></button>
            

          </form>
        </div>
@endsection
