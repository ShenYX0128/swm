@extends('layout.index')
@section('title',$title)
@section('content')
	<section class="content">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{$title}}</h3>
            </div>
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
           	<form role="form" action="/admin/permission" method="post" >
            
            <!-- 权限名 -->

            <div class="form-group">
              <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">权限名</font></font></label>
              <input type="text" class="form-control" name="url_name" placeholder="">
            </div>
            <!-- 权限路径 -->
            <div class="form-group">
              <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">权限路径</font></font></label>
              <input type="text" class="form-control" name="url" placeholder="">
            </div>

       		{{csrf_field()}}
    	    <button type="submit" class="btn btn-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">添加</font></font></button>
            

          </form>
            
            </div>
            
          </div>
          

        </div>
		</div>
@endsection