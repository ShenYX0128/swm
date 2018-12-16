<?php $__env->startSection('title',$title); ?>
<?php $__env->startSection('content'); ?>
	<section class="content-header">
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
		                        <?php echo e($title); ?>

		                    </font>
		                </font>
		            </h3>
		        </div>
		        <!-- /.box-header -->
		        <!-- form start -->
		        <form role="form" action="/admin/customer" method="post" enctype="multipart/form-data">
		            <div class="box-body">
		                <!-- 用户名 -->
            <div class="form-group">
              <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">用户名</font></font></label>
              <input type="text" class="form-control" name="customername" placeholder="Enter ...">
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
              <input type="text" name="location" class="form-control" placeholder="Enter ...">
            </div>

            
			<!-- 头像 -->
            <div class="form-group">
                  <label for="exampleInputFile"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">上传头像</font></font></label>
                  <input type="file" name="profile" id="exampleInputFile">     
            </div>

       		<?php echo e(csrf_field()); ?>

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
  $('.alert').delay(1000).fadeOut(2000);
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>