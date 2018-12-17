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
           	<form role="form" action="/admin/do_user_role?id={{$res->id}}" method="post">
            
            <!-- 管理员名 -->

            <div class="form-group">
              <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">管理员名</font></font></label>
              <input type="text" class="form-control" name="username" value="{{$res->username}}" disabled>
            </div>
            <!-- 角色名 -->
            <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">角色名</font></font></label>
            <div class="form-group">
                  @foreach($roles as $k=>$v)
                  @if(in_array($v->id,$info))
                    <div class="checkbox inline">
                    <label>
                      <input type="checkbox" name="role_id[]" value="{{$v->id}}" checked>
                      {{$v->role_name}}
                    </label>
                    </div>
                  @else
                    <div class="checkbox inline">
                      <label>
                        <input type="checkbox" name="role_id[]" value="{{$v->id}}">
                        {{$v->role_name}}
                      </label>
                    </div>
                  @endif
                  @endforeach
                </div>

       		{{csrf_field()}}
    	    <button type="submit" class="btn btn-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">添加</font></font></button>
            

          </form>
            
            </div>
            
          </div>
          

        </div>
		</div>
@endsection