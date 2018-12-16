<?php $__env->startSection('title',$title); ?>

<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        权限管理
      </h1>
    </section>
    <!-- Content Header (Page header) -->
    <section class="content">
      <div class="box">
    <!-- /.box-header -->
    <div class="box-body ">
        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <form action="/admin/permission" method="get">
               <div class="row">
                <div class="col-sm-6">
                        <label>
                            显示
                            <select name="num" aria-controls="example1" class="form-control input-sm">
                                <option value="5" <?php if($request->num == 5): ?> selected = "selected" <?php endif; ?>>
                                   5
                                </option>
                                <option value="25" <?php if($request->num == 25): ?> selected="selected" <?php endif; ?>>
                                    25
                                </option>
                                <option value="50" <?php if($request->num == 50): ?> selected="selected" <?php endif; ?>>
                                    50
                                </option>
                                <option value="100" <?php if($request->num == 100): ?> selected="selected" <?php endif; ?>>
                                    100
                                </option>
                            </select>
                            条数据
                        </label>
                   
                </div>
              <div class="col-sm-6">
                <div id="example1_filter" class="dataTables_filter">
                    <label>权限名:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1" name="url_name" value="<?php echo e($request->url_name); ?>">
                    </label>
                    <button class="btn btn-info">搜索</button>
                </div>
              </div>
            </div> 
            </form>
            

            <div class="row">
                <div class="col-sm-12 ">
                    <table id="example1" class="table table-bordered table-striped dataTable"
                    role="grid" aria-describedby="example1_info" size="1" style="text-align: center;" >
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                                style="width: 182px;">
                                    ID
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">
                                    权限名
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">
                                    权限路径
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 112px;">
                                    操作
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr role="row" class="odd">
                            
                                <td><?php echo e($v->id); ?></td>
                                <td><?php echo e($v->url_name); ?></td>
                                <td><?php echo e($v->url); ?></td>
                                <td>
                                    <a href="/admin/permission/<?php echo e($v->id); ?>/edit" class='btn btn-info'>修改</a>

                                    <form action="/admin/permission/<?php echo e($v->id); ?>" method='post' style='display:inline'>
                                <?php echo e(csrf_field()); ?>


                                <?php echo e(method_field("DELETE")); ?>

                                <button class='btn btn-danger'>删除</button>
                                
                                </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                      
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5">
                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                        本页码是<?php echo e($res->currentPage()); ?>&nbsp;&nbsp;&nbsp;&nbsp;本页是从<?php echo e($res->firstItem()); ?> to <?php echo e($res->lastItem()); ?>&nbsp;&nbsp;&nbsp;&nbsp;本表共有<?php echo e($res->total()); ?>条数据
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                      <?php echo e($res->appends($request->all())->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
</div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
  $('.alert').delay(1000).fadeOut(2000);
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>