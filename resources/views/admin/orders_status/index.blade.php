@extends('layout.index')
@section('title',$title)
<link rel="stylesheet" href="/admins/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="/admins/dist/css/skins/_all-skins.min.css">
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
        订单浏览页面
      </h1>
    </section>
    <section class="content">
        <div class="box">
    <!-- /.box-header -->
    <div class="box-body">
        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <form action="/admin/orders_status" method="get">
               <div class="row">
                <div class="col-sm-6">
                 
                        <label>
                            显示
                            <select name="num" aria-controls="example1" class="form-control input-sm">
                                <option value="10" @if($request->num == 10) selected = "selected" @endif>
                                   10
                                </option>
                                <option value="15" @if($request->num == 15) selected="selected" @endif>
                                    15
                                </option>
                                <option value="30" @if($request->num == 30) selected="selected" @endif>
                                    30
                                </option>
                              
                            </select>
                            条数据
                        </label>
                        <a href="/admin/orders_status/create" class="btn btn-info">添加状态</a>
                </div>

              <div class="col-sm-6">
                <div id="example1_filter" class="dataTables_filter">
                    <label>状态:<input type="text" class="form-control input-sm" placeholder="" aria-controls="example1" name="fname" value="{{$request->name}}">
                    </label>
                    <button class="btn btn-info">搜索</button>
                </div>
              </div>
            </div> 
            </form>
            

            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable"
                    role="grid" aria-describedby="example1_info" size="1" style="" >
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                                style="width: 182px;">
                                   ID
                                </th>

                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">
                                    状态
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
                                <td>{{$v->name}}</td>
                               

                                <td>
                                    <a href="/admin/orders_status/{{$v->id}}/edit" class='btn btn-info'>修改</a>

                                
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                       <!--  <tfoot>
                           <tr role="row">
                               <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                               colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                               style="width: 182px;">
                                   商品名
                               </th>
                               <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                               colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">
                                   分类
                               </th>
                               <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                               colspan="1" aria-label="Platform(s): activate to sort column ascending"
                               style="width: 199px;">
                                  价格
                               </th>
                               <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                               colspan="1" aria-label="Engine version: activate to sort column ascending"
                               style="width: 156px;">
                                   规格
                               </th>
                               <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                               colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 112px;">
                                   详细信息
                               </th>
                               <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                               colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 112px;">
                                   状态
                               </th>
                               <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                               colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 112px;">
                                   操作
                               </th>
                           </tr>
                       </tfoot> -->
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