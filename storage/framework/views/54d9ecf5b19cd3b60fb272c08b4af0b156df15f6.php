<?php $__env->startSection('title',$title); ?>
	
<?php $__env->startSection('content'); ?>
	 
	 <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>订单详情</title>

		<link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/homes/css/infstyle.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="/homes/js/jquery.js"></script>
		<link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/homes/css/orstyle.css" rel="stylesheet" type="text/css">

		<script src="/homes/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/homes/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
			
	</head>
	<body>
		<!--头 -->
		<header>
			<article>
				<div class="mt-logo">
					<!--顶部导航条 -->
					
				</div>
			</article>
		</header>
            <div class="nav-table">
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="#">首页</a></li>
                                <li class="qc"><a href="#">闪购</a></li>
                                <li class="qc"><a href="#">限时抢</a></li>
                                <li class="qc"><a href="#">团购</a></li>
                                <li class="qc last"><a href="#">大包装</a></li>
							</ul>
						    <div class="nav-extra">
						    	<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
						    	<i class="am-icon-angle-right" style="padding-left: 10px;"></i>
						    </div>
						</div>
			</div>
			<b class="line"></b>

		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="user-order">

						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单详情</strong> / <small>OrderDetail</small></div>
						</div>
						<hr>
						<?php $__currentLoopData = $ors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

						<div class="user-orderinfo">

						
						<!--进度条-->
						
						<div class="order-infoaside">
							<?php $__currentLoopData = $addrs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($ad->id == $v->o_address): ?>
							<div class="order-addresslist">
								<div class="order-address">
									<div class="icon-add">
									</div>
									<p class="new-tit new-p-re">
										<span class="new-txt"><?php echo e($ad->name); ?></span>
										<span class="new-txt-rd2"><?php echo e($ad->phone); ?></span>
									</p>
									<div class="new-mu_l2a new-p-re">
										<p class="new-mu_l2cw">
											<span class="title">收货地址：<?php echo e($ad->location); ?></span>
											
									</div>
								</div>
							</div>
							<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
						<div class="order-infomain">

							<div class="order-top">
								<div class="th th-item">
									商品
								</div>
								<div class="th th-price" style="width:15%;">
									单价
								</div>
								<div class="th th-number" style="width:15%;">
									数量
								</div>
								
								<div class="th th-amount" style="width:20%;">
									合计
								</div>
								
							</div>
							
							<div class="order-main">
							
								<div class="order-status3">
									<div class="order-title" style="padding-left:50px;">
										<div class="dd-num" >订单编号：<a href="javascript:;"><?php echo e($v->number); ?></a></div>
										<span>成交时间：<?php echo e(date('Y-m-d H:i:s',$v->addtime)); ?></span>
										<!--    <em>店铺：小桔灯</em>-->
									</div>
									<div class="order-content">
										<div class="order-left">
											<?php $__currentLoopData = $sp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$vv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php if($vv->id == $v->gid): ?>
											<ul class="item-list">
												<li class="td td-item" style="width:46%;">
													<div class="item-pic">
														<a href="#" class="J_MakePoint">
															<img src="<?php
								                                           $tu = DB::table('goods_img')->where('gid',$vv->id)->first();
								                                           echo $tu->gpic;
								                                        ?>" class="itempic J_ItemImg">
														</a>
													</div>
													<div class="item-info">
														<div class="item-basic-info">
															<a href="#">
																<p><?php echo e($vv->gname); ?> </p>
																<p class="info-little"><?php echo e($vv->norns); ?></p>
															</a>
														</div>
													</div>
												</li>
												<li class="td td-price" style="line-height:100px;width:15%;">
													<div class="item-price">
														<?php echo e($vv->price); ?>

													</div>
												</li>
												<?php endif; ?>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												<li class="td td-number"  style="line-height:100px;width:15%;">
													<div class="item-number">
														<span>×</span><?php echo e($v->num); ?>

													</div>
												</li>
												<li class="td td-operation"  style="line-height:100px;width:20%;">
													<div class="item-operation">
														合计:<?php echo e($v->total); ?>

													</div>
												</li>
											</ul>

										</div>
										<div class="order-right">
											<li class="td td-amount">
												<div class="item-amount">
													
												</div>
											</li>
											
										</div>
									</div>

								</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
							
						</div>
					</div>

					</div>
				</div>
				<!--底部-->
				
			</div>

			<aside class="menu">
				<ul>
					<li class="person">
						<a href="/home/personal/information">个人中心</a>
					</li>
					<li class="person">
						<a href="#">个人资料</a>
						<ul>
							<li > <a href="/home/personal/information">个人信息</a></li>
							<li> <a href="/home/personal/safety">安全设置</a></li>
							<li> <a href="/home/personal/address">收货地址</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="">我的交易</a>
						<ul>
							<li class="active"><a href="/home/order">订单管理</a></li>
							<li> <a href="/home/orderdetails">退款售后</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="#">我的资产</a>
						<ul>
							<li> <a href="coupon.html">优惠券 </a></li>
							<li> <a href="bonus.html">红包</a></li>
							<li> <a href="bill.html">账单明细</a></li>
						</ul>
					</li>

					<li class="person">
						<a href="#">我的小窝</a>
						<ul>
							<li> <a href="collection.html">收藏</a></li>
							<li> <a href="foot.html">足迹</a></li>
							<li> <a href="comment.html">评价</a></li>
							<li> <a href="news.html">消息</a></li>
						</ul>
					</li>

				</ul>

			</aside>
			
		</div>

	</body>
<?php $__env->stopSection(); ?>

	


<?php echo $__env->make('layout.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>