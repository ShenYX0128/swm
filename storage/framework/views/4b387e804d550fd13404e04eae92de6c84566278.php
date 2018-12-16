<?php $__env->startSection('title',$title); ?>
<link rel="stylesheet" href="/admins/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="/admins/dist/css/skins/_all-skins.min.css">
<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
        订单管理
      </h1>
    </section>
    <section class="content">
        <div class="box">
    <!-- /.box-header -->
    <div class="box-body">
        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <form action="/admin/orders" method="get">
               <div class="row">
                <div class="col-sm-6">
                 
                        <label>
                            显示
                            <select name="num" aria-controls="example1" class="form-control input-sm">
                                <option value="10" <?php if($request->num == 10): ?> selected = "selected" <?php endif; ?>>
                                   10
                                </option>
                                <option value="15" <?php if($request->num == 15): ?> selected="selected" <?php endif; ?>>
                                    15
                                </option>
                                <option value="30" <?php if($request->num == 30): ?> selected="selected" <?php endif; ?>>
                                    30
                                </option>
                              
                            </select>
                            条数据
                        </label>
                   
                </div>
              <div class="col-sm-6">
                <div id="example1_filter" class="dataTables_filter">
                    <label>收货人:<input type="text" class="form-control input-sm" placeholder="" aria-controls="example1" name="oname" value="<?php echo e($request->oname); ?>">
                    </label>
                    <button class="btn btn-info">搜索</button>
                </div>
              </div>
            </div> 
            </form>
            

            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable"
                    role="grid" aria-describedby="example1_info" size="1" style="" >
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                                style="width: 182px;">
                                   ID
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">
                                    订单号
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">
                                   收货人
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                style="width: 199px;">
                                  收货人电话
                                </th>
                               <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                               colspan="1" aria-label="Platform(s): activate to sort column ascending"
                               style="width: 199px;">
                                 添加时间
                               </th>
                               <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                               colspan="1" aria-label="Platform(s): activate to sort column ascending"
                               style="width: 199px;">
                                 订单状态
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
                                <td><a href="/admin/detail?id=<?php echo e($v->id); ?>"><?php echo e($v->number); ?></a></td>
                                <td><?php echo e($v->oname); ?></td>
                                <td><?php echo e($v->o_phone); ?></td>
                                <td><?php echo e(date('Y-m-d H:i:s',$v->addtime)); ?></td>
                                <?php $__currentLoopData = $statuss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$vv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($v->o_status==$vv->id): ?>
                                <td><?php echo e($vv->name); ?></td>
                                <?php endif; ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               
                                <td width='220px'>
                                    <a href="/admin/orders/<?php echo e($v->id); ?>/edit" class='btn btn-info'>修改</a>
                                    <!-- <a href="/admin/category/<?php echo e($v->id); ?>" class='btn btn-info'>添加子分类</a> -->

                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                       <!--  <tfoot>
                           <tr role="row">
                               <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                               colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                               style="width: 182px;">
                                   商品名
                               </th>
                               <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                               colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">
                                   分类
                               </th>
                               <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                               colspan="1" aria-label="Platform(s): activate to sort column ascending"
                               style="width: 199px;">
                                  价格
                               </th>
                               <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                               colspan="1" aria-label="Engine version: activate to sort column ascending"
                               style="width: 156px;">
                                   规格
                               </th>
                               <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                               colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 112px;">
                                   详细信息
                               </th>
                               <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                               colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 112px;">
                                   状态
                               </th>
                               <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                               colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 112px;">
                                   操作
                               </th>
                           </tr>
                       </tfoot> -->
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5">
                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                        本页码是&nbsp;&nbsp;&nbsp;&nbsp;本页是从 to &nbsp;&nbsp;&nbsp;&nbsp;本表共有条数据
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                      
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