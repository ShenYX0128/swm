<?php $__env->startSection('title',$title); ?>


<?php $__env->startSection('content'); ?>

    <?php if(count($errors) > 0): ?>
      <div class="callout callout-danger">
              显示错误信息
                <ul>
                  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li style='font-size:14px'><?php echo e($error); ?></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

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
                    轮播添加
                </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="/admin/banner" method="post" enctype="multipart/form-data">
                <div class="box-body">
                   
                  
                  
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

                      <div class="form-group">
                        <label for="exampleInputPassword1">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    图片链接
                                </font>
                            </font>
                        </label>
                        <input type="file" class="" id="exampleInputPassword1" name="src" 
                        placeholder="请输入链接地址">
                    </div>

                     

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <!-- <button type="submit" class="btn btn-primary">
                       添加
                    </button> -->
                    <?php echo e(csrf_field()); ?>

                    <input type="submit" name="" class="btn btn-primary" value="添加">
                </div>
            </form>
        </div>
    </div>
      </div>
      
    </section>
  
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
  $('.callout').delay(1000).fadeOut(2000);
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>