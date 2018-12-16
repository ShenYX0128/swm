@extends('layout.index')
@section('title',$title)
<link rel="stylesheet" href="/admins/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="/admins/dist/css/skins/_all-skins.min.css">
        <script type="text/javascript" src="/homes/js/jquery.js"></script>
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        订单详情
      </h1>
    </section>
    <section class="content">
    	<div class="box">
    <!-- /.box-header -->
    <div class="box-body">
        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <form action="" method="get">
               <div class="row">
                <div class="col-sm-6">
                 
                        <label>
                            显示
                            <select name="num" aria-controls="example1" class="form-control input-sm">
                                <option value="10" @if($request->num == 10) selected = "selected" @endif>
                                   10
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
                    <label>商品名:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1" name="gname" value="{{$request->gname}}">
                    </label>
                    <button class="btn btn-info">搜索</button>
                </div>
              </div>
            </div> 
            </form>
            

            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable"
                    role="grid" aria-describedby="example1_info" size="1" style="text-align: center;" >
                        <thead>
                            <tr role="row">
                               
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1" aria-label="Browser: activate to sort column ascending" style="">
                                    商品id
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">
                                    商品名称
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">
                                    商品图片
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">
                                    单价
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                style="width: 199px;">
                                   数量
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1" aria-label="Engine version: activate to sort column ascending"
                                style="width: 156px;">
                                   合计
                                </th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ors as $k => $v)
                            <tr role="row" class="odd">

                                @foreach($sp as $k=>$vv)
                                @if($vv->id == $v->gid)
                                <td>{{$vv->id}}</td>
                                <td>{{$vv->gname}}</td>
                                <td >
                                    <img src="@php
                                       $tu = DB::table('goods_img')->where('gid',$v->gid)->first();
                                       echo $tu->gpic;
                                    @endphp" 
                                    alt="" style="width:100px;">
                                    
                                </td>
                                <td>{{$vv->price}}</td>
                                @endif
                                @endforeach
                                <td>{{$v->num}}</td>
                                <td>{{$v->total}}</td>
                                
                              
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