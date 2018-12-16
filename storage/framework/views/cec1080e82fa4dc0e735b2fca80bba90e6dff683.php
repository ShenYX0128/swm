<?php $__env->startSection('title',$title); ?>


<?php $__env->startSection('content'); ?>
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
                    轮播修改页面
                </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="/admin/banner/<?php echo e($res->id); ?>" method="post" enctype="multipart/form-data" >
                <div class="box-body">

                    
        
                     <div class="form-group">
                        <label for="exampleInputPassword1">
                            
                                
                                    链接地址
                                
                            
                        </label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="url" 
                        placeholder="请输入链接名称" value="<?php echo e($res->url); ?>">
                    </div>

                     <div class="form-group">
                        <label for="exampleInputPassword1">
                            图片链接
                        </label>
                        <img src="<?php echo e($res->src); ?>" alt="" width="505">
                        <input type="file" class="" id="exampleInputPassword1" name="src" 
                        placeholder="请输入链接名称">
                    </div>


                   </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <!-- <button type="submit" class="btn btn-primary">
                       添加
                    </button> -->
                    <?php echo e(csrf_field()); ?>


                    <?php echo e(method_field('PUT')); ?>

                    <input type="submit" name="" class="btn btn-primary" value="修改">
                 
                </div>
            </form>
        </div>
    </div>
      </div>
      
    </section>
  
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>