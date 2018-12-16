<?php $__env->startSection('title',$title); ?>
<?php $__env->startSection('content'); ?>
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
         
          <form role="form" action="/admin/dopasschange" method="post" enctype='multipart/form-data'>
            
            <!-- 密码 -->
            <div class="form-group">
             <label for="exampleInputPassword1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">原密码</font></font></label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">新密码</font></font></label>
              <input type="password" name="newpassword" class="form-control" id="exampleInputPassword1" placeholder="newPassword">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">确认密码</font></font></label>
              <input type="password" name="qpassword" class="form-control" id="exampleInputPassword1" placeholder="qpassword">
            </div>
           
       		<?php echo e(csrf_field()); ?>


          <?php echo e(method_field('PUT')); ?>

          
    	    <button type="submit" class="btn btn-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">修改</font></font></button>
            

          </form>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>