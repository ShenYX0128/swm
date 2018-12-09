@extends('layout.index')
@section('title',$title)
@section('content')
	 <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i>权限不足,请联系管理员</h4>
     </div>
@stop