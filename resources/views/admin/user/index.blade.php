@extends('layout.index')
@section('title',$title)
@section('content')
<div class="box-body">
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
        <div class="row">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
            </div>
        </div>

        <div class="row">
        	<form action="/admin/user" method='get'>
        	<div class="col-sm-6">
    <div class="dataTables_length" id="example1_length">
        <label>
            <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">
                    数据
                </font>
            </font>
            <select name="num" aria-controls="example1" class="form-control input-sm">
                <option value="2"@if($request->num == 2)  selected="selected" @endif>
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                            2
                        </font>
                    </font>
                </option>
                <option value="10"@if($request->num == 10)  selected="selected" @endif>
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                            10
                        </font>
                    </font>
                </option>
                <option value="15"@if($request->num == 15)  selected="selected" @endif>
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                            15
                        </font>
                    </font>
                </option>
            </select>
            <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">
                    条
                </font>
            </font>
        </label>
    </div>
</div>

		<div class="col-sm-6">
    <div id="example1_filter" class="dataTables_filter">
        <label>
            <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">
                    查找：
                </font>
            </font>
            <input type="search" name="username" value="{{$request->username}}" class="form-control input-sm" placeholder="" aria-controls="example1">
            <button class='btn btn-info'>搜索</button>
        </label>
    </div>
</div>
</form>
            <div class="col-sm-12">
                <table id="example2" class="table table-bordered table-hover dataTable"
                role="grid" aria-describedby="example2_info">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                            colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        ID
                                    </font>
                                </font>
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                            colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        用户名
                                    </font>
                                </font>
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                            colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        性别
                                    </font>
                                </font>
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                            colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        邮箱
                                    </font>
                                </font>
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                            colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        电话
                                    </font>
                                </font>
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                            colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        地址
                                    </font>
                                </font>
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                            colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        用户权限
                                    </font>
                                </font>
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                            colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        头像
                                    </font>
                                </font>
                            </th>
                             <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                            colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        操作
                                    </font>
                                </font>
                            </th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($res as $k => $v)

						@if($k % 2 == 0)
						 	<tr class="odd">
						@else 
							<tr class="even">
						@endif
                            <td class="">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        {{$v->id}}
                                    </font>
                                </font>
                            </td>
                            <td class="">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        {{$v->username}}
                                    </font>
                                </font>
                            </td>
                            <td class="">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        @if($v->sex== 0)
											女
			                        	@elseif($v->sex== 1) 
			                        		男
			                        	@elseif($v->sex== 2)	
											保密
			                        	@endif
                                    </font>
                                </font>
                            </td>
                            <td class="">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        {{$v->email}}
                                    </font>
                                </font>
                            </td>
                            <td class="">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        {{$v->phone}}
                                    </font>
                                </font>
                            </td>
                            <td class="">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        {{$v->address}}
                                    </font>
                                </font>
                            </td>
                            <td class="">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        @if($v->auth== 1)

			                        		普通用户
			                        	@else 
			                        		管理员

			                        	@endif
                                    </font>
                                </font>    
                            </td>
                            <td class="">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        <img src="{{$v->header}}" alt="" width='80px'>
                                    </font>
                                </font>
                            </td>
                            <td class="">
                            	 <a href="/admin/user/{{$v->id}}/edit" class='btn btn-info'>修改</a>

                               <form action="/admin/user/{{$v->id}}" method='post' style='display:inline'>
                            	{{csrf_field()}}

                            	{{method_field("DELETE")}}
                            	<button class='btn btn-danger'>删除</button>

                            </form>
                            </td>
                        </tr>
                      	@endforeach
                    </tbody>
                   
                </table>

            </div>
        </div>
        {{$res->appends($request->all())->links()}}
    </div>
</div>
@stop