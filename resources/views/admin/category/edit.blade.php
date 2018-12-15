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
                <h3 class="box-title">
                    分类的修改
                </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="/admin/category/{{$res->id}}" method="post">
                <div class="box-body">
                   <div class="form-group">
                      <label>顶级分类</label>
                      <select name="pid" class="form-control" disabled>
                          <option value='0'>请选择</option>
                        @foreach($rs as $v)
                          <option value="{{$v->id}}"
                            @if($res->pid==$v->id) selected @endif>
                            {{$v->tname}}
                          </option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    类别名称
                                </font>
                            </font>
                        </label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="tname" 
                        placeholder="请输入商品的名称" value="{{$res->tname}}">
                    </div>
                
<!--                    <div class="form-group">
  <div class="form-group">
    <label for="exampleInputPassword1">
               状态
    </label>
    <p><input type="radio" name="status" id="optionsRadios1" value="0">
      下架&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="status" id="optionsRadios2" value="1" checked="">
      上架</p>
</div>
        -->
                          
                   </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <!-- <button type="submit" class="btn btn-primary">
                       添加
                    </button> -->
                    {{csrf_field()}}

                    {{method_field('PUT')}}
                    <input type="submit" name="" class="btn btn-primary" value="修改">
                 
                </div>
            </form>
        </div>
    </div>
      </div>
      
    </section>
  
@stop

