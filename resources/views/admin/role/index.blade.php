@extends('layout.index')
@section('title',$title)

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content">
      <div class="box">
        <div class="box-header">
        <h3 class="box-title">
            角色管理
        </h3>
      </div>
    <!-- /.box-header -->
    <div class="box-body ">
        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <form action="/admin/role" method="get">
               <div class="row">
                <div class="col-sm-6">
                 
                        <label>
                            显示
                            <select name="num" aria-controls="example1" class="form-control input-sm">
                                <option value="10" @if($request->num == 5) selected = "selected" @endif>
                                   5
                                </option>
                                <option value="25" @if($request->num == 25) selected="selected" @endif>
                                    25
                                </option>
                                <option value="50" @if($request->num == 50) selected="selected" @endif>
                                    50
                                </option>
                                <option value="100" @if($request->num == 100) selected="selected" @endif>
                                    100
                                </option>
                            </select>
                            条数据
                        </label>
                   
                </div>
              <div class="col-sm-6">
                <div id="example1_filter" class="dataTables_filter">
                    <label>角色名:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1" name="role_name" value="{{$request->role_name}}">
                    </label>
                    <button class="btn btn-info">搜索</button>
                </div>
              </div>
            </div> 
            </form>
            

            <div class="row">
                <div class="col-sm-12 ">
                    <table id="example1" class="table table-bordered table-striped dataTable"
                    role="grid" aria-describedby="example1_info" size="1" style="text-align: center;" >
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                                style="width: 182px;">
                                    ID
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">
                                    角色名
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 112px;">
                                    操作
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($res as $k => $v)
                            <tr role="row" class="odd">
                            
                                <td>{{$v->id}}</td>
                                <td>{{$v->role_name}}</td>
                                <td>
                                <a href="/admin/role/{{$v->id}}/edit" class='btn btn-info'>修改</a>

                                <form action="/admin/role/{{$v->id}}" method='post' style='display:inline'>
                                {{csrf_field()}}

                                {{method_field("DELETE")}}
                                <button class='btn btn-danger'>删除</button>
                                
                                <a href="/admin/role_per?id={{$v->id}}" class='btn btn-success'>添加权限</a>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5">
                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                        本页码是{{$res->currentPage()}}&nbsp;&nbsp;&nbsp;&nbsp;本页是从{{$res->firstItem()}} to {{$res->lastItem()}}&nbsp;&nbsp;&nbsp;&nbsp;本表共有{{$res->total()}}条数据
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                      {{$res->appends($request->all())->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
</div>
    </section>

@endsection

@section('js')
<script>
  $('.alert').delay(1000).fadeOut(2000);
</script>

@stop