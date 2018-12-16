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
              <h3 class="box-title">权限添加</h3>
            </div>
            <div class="box-body">
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
           	<form role="form" action="/admin/permission" method="post" >
            
            <!-- 权限名 -->

            <div class="form-group">
              <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">权限名</font></font></label>
              <input type="text" class="form-control" name="url_name" placeholder="">
            </div>
            <!-- 权限路径 -->
            <div class="form-group">
              <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">权限路径</font></font></label>
              <input type="text" class="form-control" name="url" placeholder="">
            </div>

       		<?php echo e(csrf_field()); ?>

    	    <button type="submit" class="btn btn-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">添加</font></font></button>
            

          </form>
            
            </div>
            
          </div>
          

        </div>
		</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>