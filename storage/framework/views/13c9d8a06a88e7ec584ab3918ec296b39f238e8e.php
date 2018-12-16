<?php $__env->startSection('title',$title); ?>
<?php $__env->startSection('content'); ?>
	<section class="content-header">
      <h1>
        广告修改
      </h1>
    </section>
    <section class="content">
      <div class="row">
      	<div class="col-md-8 col-md-offset-2">
		    <!-- general form elements -->
		    <div class="box box-primary">
		        <!-- /.box-header -->
		        <!-- form start -->
		        <form role="form" action="/admin/poster/<?php echo e($res->id); ?>" method="post" enctype="multipart/form-data">
		            <div class="box-body">
		                <div class="form-group">
		                    <label for="exampleInputPassword1">
		                        广告商家
		                    </label>
		                    <input type="text" class="form-control" id="exampleInputPassword1" name="name" 
		                    placeholder="广告商家的名称" value="<?php echo e($res->name); ?>">
		                </div>
		                <div class="form-group">
		                    <label for="exampleInputPassword1">
		                        链接地址
		                    </label>
		                    <input type="text" class="form-control" id="exampleInputPassword1" name="url" 
		                    placeholder="请输入链接地址" value="<?php echo e($res->url); ?>">
		                </div>
		                <div class="form-group">
		                    <label for="exampleInputPassword1">
		                        广告内容
		                    </label>
		                    <input type="text" class="form-control" id="exampleInputPassword1" name="content" 
		                    placeholder="请输入广告的内容" value="<?php echo e($res->content); ?>">
		                </div>
		                <div class="form-group">
		                    <label for="exampleInputPassword1">
		                        
		                            
		                                广告图
		                    </label>
		                    <img src="<?php echo e($res->src); ?>" width="100px">
		                    <input type="file" id="exampleInputPassword1" name="src" 
		                    >
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
<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>