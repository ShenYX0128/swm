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
              <h3 class="box-title"><?php echo e($title); ?></h3>
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
           	<form role="form" action="/admin/role/<?php echo e($res->id); ?>" method="post" enctype='multipart/form-data'>
            
            <!-- 角色名 -->

            <div class="form-group">
              <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">角色名</font></font></label>
              <input type="text" class="form-control" name="role_name" value="<?php echo e($res->role_name); ?>">
            </div>

       		<?php echo e(csrf_field()); ?>

          <?php echo e(method_field('PUT')); ?>

    	    <button type="submit" class="btn btn-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">修改</font></font></button>
            

          </form>
            
            </div>
            
          </div>
          

        </div>
		</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>