<?php $__env->startSection('title',$title); ?>
<?php $__env->startSection('content'); ?>
  <section class="content">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="box box-primary">
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
          <form role="form" action="/admin/user" method="post" enctype='multipart/form-data'>
            
            <!-- 用户名 -->
            <div class="form-group">
              <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">用户名</font></font></label>
              <input type="text" class="form-control" name="username" placeholder="Enter ...">
            </div>
			
			     <!-- 密码 -->
            <div class="form-group">
                  <label for="exampleInputPassword1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">密码</font></font></label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
   
            <!-- 性别 -->
            <div class="form-group">
            	<label for="exampleInputEmail1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">性别</font></font></label>	
              <div class="radio">
                <label>
                  <input type="radio" name="sex" id="optionsRadios1" value="1"><font style="vertical-align: inherit;">男<font style="vertical-align: inherit;">
                </font></font></label>
                <label>
                  <input type="radio" name="sex" id="optionsRadios2" value="0"><font style="vertical-align: inherit;">女<font style="vertical-align: inherit;"> 
                </font></font></label>
                <label>
                  <input type="radio" name="sex" id="optionsRadios2" value="2" checked><font style="vertical-align: inherit;">保密<font style="vertical-align: inherit;">
     			</font></font></label>
              </div>
            </div>

            <!-- 电子邮件地址 -->
            <div class="form-group">
                  <label for="exampleInputEmail1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">电子邮件地址</font></font></label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
            </div>

			<!-- 电话 -->
            <div class="form-group">
              <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">电话</font></font></label>
              <input type="text" name="phone" class="form-control" placeholder="Enter ...">
            </div>

            <!-- 地址 -->
            <div class="form-group">
              <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">地址</font></font></label>
              <input type="text" name="address" class="form-control" placeholder="Enter ...">
            </div>

            <!-- 用户权限 -->
            <div class="form-group">
            	<label for="exampleInputEmail1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">用户权限</font></font></label>	
              <div class="radio">
                <label>
                  <input type="radio" name="auth" id="optionsRadios1" value="1" checked="" checked><font style="vertical-align: inherit;">普通用户<font style="vertical-align: inherit;">
                </font></font></label>
                <label>
                  <input type="radio" name="auth" id="optionsRadios2" value="0"><font style="vertical-align: inherit;">管理员<font style="vertical-align: inherit;"> 
                </font></font></label>
              </div>
            </div>

			<!-- 头像 -->
            <div class="form-group">
                  <label for="exampleInputFile"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">上传头像</font></font></label>
                  <input type="file" name="header" id="exampleInputFile">     
            </div>

       		<?php echo e(csrf_field()); ?>

    	    <button type="submit" class="btn btn-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">提交</font></font></button>
            

          </form>
        </div>
        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
  $('.callout').delay(2000).fadeOut(2000);
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>