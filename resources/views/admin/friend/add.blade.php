@extends('layout.index')
@section('title',$title)


@section('content')
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


  <section class="content-header col-md-offset-5">
      <h1><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
        友情链接添加
         </font></font><small><font style="vertical-align: inherit;"></font></small>
      </h1>
     
    </section>



    <section class="content">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                           
                        </font>
                    </font>
                </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="/admin/friend" method="post" enctype="multipart/form-data">
                <div class="box-body">
                   
                    <div class="form-group">
                        <label for="exampleInputPassword1">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    链接名称
                                </font>
                            </font>
                        </label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="fname" 
                        placeholder="请输入链接名称">
                    </div>
                  
                     <div class="form-group">
                        <label for="exampleInputPassword1">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    链接地址
                                </font>
                            </font>
                        </label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="url" 
                        placeholder="请输入链接地址">
                    </div>


                   
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <!-- <button type="submit" class="btn btn-primary">
                       添加
                    </button> -->
                    {{csrf_field()}}
                    <input type="submit" name="" class="btn btn-primary" value="添加">
                </div>
            </form>
        </div>
    </div>
      </div>
      
    </section>
  
@stop

@section('js')
<script>
  $('.callout').delay(1000).fadeOut(2000);
</script>
@stop