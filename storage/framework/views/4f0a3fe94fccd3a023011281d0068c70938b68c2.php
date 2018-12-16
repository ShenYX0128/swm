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
                    订单修改
                </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form role="form" action="/admin/orders/<?php echo e($res->id); ?>"  method="post" >
                <div class="box-body">

                     <div class="form-group">
                        <label for="exampleInputPassword1">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    订单状态
                                </font>
                            </font>
                        </label>
                        
                        <select name="o_status" class="form-control">
                       
                          <?php $__currentLoopData = $sta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($res->o_status==$v->id): ?>
                          <option selected value="<?php echo e($v->id); ?>"><?php echo e($v->name); ?></option>
                          <?php else: ?>
                          <option  value="<?php echo e($v->id); ?>"><?php echo e($v->name); ?></option>
                          <?php endif; ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      
                      </select>
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