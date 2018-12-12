@extends('layout.index')
@section('title',$title)
@section('content')
  <section class="content-header col-md-offset-5">
      <h1>
      </h1>
    </section>
	<section class="content">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">权限修改</h3>
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
           	<form role="form" action="/admin/permission/{{$res->id}}" method="post" >
            
            <!-- 权限名 -->

            <div class="form-group">
              <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">权限名</font></font></label>
              <input type="text" class="form-control" name="url_name" value="{{$res->url_name}}">
            </div>

            <!-- 权限路径 -->

            <div class="form-group">
              <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">权限路径</font></font></label>
              <input type="text" class="form-control" name="url" value="{{$res->url}}">
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