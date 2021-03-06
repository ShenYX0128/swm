<?php $__env->startSection('title',$title); ?>
<?php $__env->startSection('content'); ?>
<div class="box-body">
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
        <div class="row">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
            </div>
        </div>

        <div class="row">
        	<form action="/admin/user" method='get'>
        	<div class="col-sm-6">
    <div class="dataTables_length" id="example1_length">
        <label>
            <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">
                    数据
                </font>
            </font>
            <select name="num" aria-controls="example1" class="form-control input-sm">
                <option value="2"<?php if($request->num == 2): ?>  selected="selected" <?php endif; ?>>
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                            2
                        </font>
                    </font>
                </option>
                <option value="10"<?php if($request->num == 10): ?>  selected="selected" <?php endif; ?>>
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                            10
                        </font>
                    </font>
                </option>
                <option value="15"<?php if($request->num == 15): ?>  selected="selected" <?php endif; ?>>
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                            15
                        </font>
                    </font>
                </option>
            </select>
            <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">
                    条
                </font>
            </font>
        </label>
    </div>
</div>

		<div class="col-sm-6">
    <div id="example1_filter" class="dataTables_filter">
        <label>
            <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">
                    查找：
                </font>
            </font>
            <input type="search" name="username" value="<?php echo e($request->username); ?>" class="form-control input-sm" placeholder="" aria-controls="example1">
            <button class='btn btn-info'>搜索</button>
        </label>
    </div>
</div>
</form>
            <div class="col-sm-12">
                <table id="example2" class="table table-bordered table-hover dataTable"
                role="grid" aria-describedby="example2_info">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                            colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        ID
                                    </font>
                                </font>
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                            colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        用户名
                                    </font>
                                </font>
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                            colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        性别
                                    </font>
                                </font>
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                            colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        邮箱
                                    </font>
                                </font>
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                            colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        电话
                                    </font>
                                </font>
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                            colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        地址
                                    </font>
                                </font>
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                            colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        用户权限
                                    </font>
                                </font>
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                            colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        头像
                                    </font>
                                </font>
                            </th>
                             <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                            colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        操作
                                    </font>
                                </font>
                            </th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

						<?php if($k % 2 == 0): ?>
						 	<tr class="odd">
						<?php else: ?> 
							<tr class="even">
						<?php endif; ?>
                            <td class="">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        <?php echo e($v->id); ?>

                                    </font>
                                </font>
                            </td>
                            <td class="">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        <?php echo e($v->username); ?>

                                    </font>
                                </font>
                            </td>
                            <td class="">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        <?php if($v->sex== 0): ?>
											女
			                        	<?php elseif($v->sex== 1): ?> 
			                        		男
			                        	<?php elseif($v->sex== 2): ?>	
											保密
			                        	<?php endif; ?>
                                    </font>
                                </font>
                            </td>
                            <td class="">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        <?php echo e($v->email); ?>

                                    </font>
                                </font>
                            </td>
                            <td class="">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        <?php echo e($v->phone); ?>

                                    </font>
                                </font>
                            </td>
                            <td class="">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        <?php echo e($v->address); ?>

                                    </font>
                                </font>
                            </td>
                            <td class="">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        <?php if($v->auth== 1): ?>

			                        		普通用户
			                        	<?php else: ?> 
			                        		管理员

			                        	<?php endif; ?>
                                    </font>
                                </font>    
                            </td>
                            <td class="">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        <img src="<?php echo e($v->header); ?>" alt="" width='80px'>
                                    </font>
                                </font>
                            </td>
                            <td class="">
                            	<a href="/admin/user/<?php echo e($v->id); ?>/edit" class='btn btn-info'>修改</a>

                               <form action="/admin/user/<?php echo e($v->id); ?>" method='post' style='display:inline'>
                            	<?php echo e(csrf_field()); ?>


                            	<?php echo e(method_field("DELETE")); ?>

                            	<button class='btn btn-danger'>删除</button>
                                <a href="/admin/user_role?id=<?php echo e($v->id); ?>" class='btn btn-success'>添加角色</a>
                            </form>
                            </td>
                        </tr>
                      	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                   
                </table>

            </div>
        </div>
        <?php echo e($res->appends($request->all())->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
  $('.alert').delay(1000).fadeOut(2000);
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>