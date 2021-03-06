<?php $__env->startSection('title',$title); ?>
<link rel="stylesheet" href="/admins/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="/admins/dist/css/skins/_all-skins.min.css">
        <script type="text/javascript" src="/homes/js/jquery.js"></script>
<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        订单详情
      </h1>
    </section>
    <section class="content">
    	<div class="box">
    <!-- /.box-header -->
    <div class="box-body">
        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <form action="" method="get">
               <div class="row">
                <div class="col-sm-6">
                 
                        <label>
                            显示
                            <select name="num" aria-controls="example1" class="form-control input-sm">
                                <option value="10" <?php if($request->num == 10): ?> selected = "selected" <?php endif; ?>>
                                   10
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
                    <label>商品名:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1" name="gname" value="<?php echo e($request->gname); ?>">
                    </label>
                    <button class="btn btn-info">搜索</button>
                </div>
              </div>
            </div> 
            </form>
            

            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable"
                    role="grid" aria-describedby="example1_info" size="1" style="text-align: center;" >
                        <thead>
                            <tr role="row">
                               
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1" aria-label="Browser: activate to sort column ascending" style="">
                                    商品id
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">
                                    商品名称
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">
                                    商品图片
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">
                                    单价
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                style="width: 199px;">
                                   数量
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1" aria-label="Engine version: activate to sort column ascending"
                                style="width: 156px;">
                                   合计
                                </th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $ors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr role="row" class="odd">

                                <?php $__currentLoopData = $sp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$vv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($vv->id == $v->gid): ?>
                                <td><?php echo e($vv->id); ?></td>
                                <td><?php echo e($vv->gname); ?></td>
                                <td >
                                    <img src="<?php
                                       $tu = DB::table('goods_img')->where('gid',$v->gid)->first();
                                       echo $tu->gpic;
                                    ?>" 
                                    alt="" style="width:100px;">
                                    
                                </td>
                                <td><?php echo e($vv->price); ?></td>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <td><?php echo e($v->num); ?></td>
                                <td><?php echo e($v->total); ?></td>
                                
                              
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
<?php echo $__env->make('layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>