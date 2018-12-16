<!DOCTYPE html>
<html>
<head>
	<title></title>
		<link rel="stylesheet" type="text/css" href="/homes/css/page.css">
</head>
<body>
								<div id="box">
									<ul class="am-comments-list am-comments-list-flip">

										
										<!-- 第二部分 -->
										
										<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if($v->id == $val->uid): ?>
										<li class="am-comment">
											<a href="">
												<img class="am-comment-avatar" src="<?php echo e($v->profile); ?>" />
											</a>

											<div class="am-comment-main">
												<!-- 评论内容容器 -->
												<header class="am-comment-hd">
													<!--<h3 class="am-comment-title">评论标题</h3>-->
													<div class="am-comment-meta">
														<!-- 评论元数据 -->
														<a href="#link-to-user" class="am-comment-author"><?php echo e($v->customername); ?></a>
														<!-- 评论者 -->
														评论于
														<time datetime=""><?php echo e($val->addtime); ?></time>
													</div>
												</header>

												<div class="am-comment-bd">
													<div class="tb-rev-item " data-id="255776406962">
														<div class="J_TbcRate_ReviewContent tb-tbcr-content ">
															<?php echo e($val->content); ?>

														</div>
														<div class="tb-r-act-bar">
															口味：<?php echo e($val->norns); ?>

														</div>
													</div>

												</div>
												<!-- 评论内容 -->
											</div>
										</li>
										<?php endif; ?>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</ul>

									<div class="clear"></div>

									<!--分页 -->
									
									<ul class="paginations paginations-right">
										<li><a href="javascript:void(0)" onclick="page(<?php echo $prev ?>)">&laquo;</a></li>
										<?php $__currentLoopData = $pp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if($val == $page): ?>
										<li class="active"><a href="javascript:void(0)" onclick="page(<?php echo e($val); ?>)"><?php echo e($val); ?></a></li>
										<?php else: ?>
										<li><a href="javascript:void(0)" onclick="page(<?php echo e($val); ?>)"><?php echo e($val); ?></a></li>
										
										<?php endif; ?>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<li><a href="javascript:void(0)" onclick="page(<?php echo $next ?>)">&raquo;</a></li>
									</ul>
								</div>
</body>
</html>