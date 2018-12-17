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
              <h3 class="box-title">角色添加</h3>
            </div>
            <div class="box-body">
            
           	<form role="form" action="/admin/role" method="post" enctype='multipart/form-data'>
            
            <!-- 角色名 -->

            <div class="form-group">
              <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">角色名</font></font></label>
              <input type="text" class="form-control" name="role_name" placeholder="请输入2-6位角色名">
            </div>

       		{{csrf_field()}}
    	    <button type="submit" class="btn btn-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">添加</font></font></button>
            

          </form>
            
            </div>
            
          </div>
          

        </div>
		</div>
@endsection