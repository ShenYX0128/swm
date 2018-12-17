<?php $__env->startSection('title',$title); ?>
	
<?php $__env->startSection('content'); ?>
	 
	 <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>订单管理</title>

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
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单管理</strong> / <small>Order</small></div>
						</div>
						<hr>

						<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs="">

							<ul class="am-avg-sm-5 am-tabs-nav am-nav am-nav-tabs">
								<li class="am-active"><a href="#tab1">所有订单</a></li>
								<li><a href="#tab3">待收货</a></li>
								<li><a href="#tab4">待评价</a></li>
								<li><a href="#tab5">已完成</a></li>
							</ul>

							<div class="am-tabs-bd" style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
								<div class="am-tab-panel am-fade am-in am-active" id="tab1">
									<div class="order-top">
										<div class="th th-item" style="width:35%;">
											商品
										</div>
										<div class="th th-price">
											单价
										</div>
										<div class="th th-number">
											数量
										</div>
										<div class="th th-operation">
											商品操作
										</div>
										<div class="th th-amount">
											合计
										</div>
										<div class="th th-status">
											交易状态
										</div>
										<div class="th th-change">
											交易操作
										</div>
									</div>
                                   <style>
                                   	 .td-item .item-basic-info{
                                   	 	margin-top:0px;

                                   	 }
									.item-info{

									}

                                   </style>
									<div class="order-main">
										<div class="order-list">
											
											<!--交易成功-->
											<?php $__currentLoopData = $or; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<div class="order-status5">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;"><?php echo e($v->number); ?></a></div>
													<span>成交时间：<?php echo e(date('Y-m-d H:i:s',$v->addtime)); ?></span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">
														<ul class="item-list">
															<?php $__currentLoopData = $sp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$vv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<?php if($vv->id == $v->gid): ?>
															<li class="td td-item" style="width:33%;">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="
																		<?php
								                                           $tu = DB::table('goods_img')->where('gid',$v->gid)->first();
								                                           echo $tu->gpic;
								                                        ?>">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p><?php echo e($vv->gname); ?></p>
																			<p class="info-little"><?php echo e($vv->norns); ?>

																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	<?php echo e($vv->price); ?>

																</div>
															</li>
															<?php endif; ?>
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span><?php echo e($v->num); ?>

																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	
																</div>
															</li>
														</ul>
													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：<?php echo e($v->total); ?>

															
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">交易成功</p>
																	<p class="order-info"><a href="/home/orderinfo?id=<?php echo e($v->id); ?>">订单详情</a></p>
																	<p class="order-info"><a href="logistics.html">查看物流</a></p>
																</div>
															</li>
															<?php switch($v->o_status):
                                                               
															    case (0): ?>
															    <p class="p-button">
															        <a class="button-operate-pay" href="/payment/order-11272519456"><span>立即支付</span></a>
															    </p>
															    <p class="p-link">
															        <a href='javascript:cancel("<?php echo e($v->number); ?>");'>取消订单</a>
															    </p>
															    <?php break; ?>

															    <?php case (1): ?>
															    <li class="td td-change col-state">
																<div class="am-btn am-btn-danger anniu" id="order_<?php echo e($v->id); ?>">
																	<a href='javascript:okgoods("<?php echo e($v->id); ?>");'>确认收货</a></div>
															    </li>
															    
															    <?php break; ?>

															    <?php case (2): ?>
															    <div class="col-state am-btn am-btn-danger anniu">
															        已完成
															    </div>
															    <?php break; ?>

															    <?php case (3): ?>
															    <div class="col-state am-btn am-btn-danger anniu">
															        <a href="/jiesuan/order_evaluate/<?php echo e($v->id); ?>">待评价</a>
															    </div>
															    <?php break; ?>
															<?php endswitch; ?>
															
														</div>
													</div>
												</div>
											</div>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											
										</div>

									</div>

								</div>
								
								
								<div class="am-tab-panel am-fade" id="tab3">
									<div class="order-top">
										<div class="th th-item">
											商品
										</div>
										<div class="th th-price">
											单价
										</div>
										<div class="th th-number">
											数量
										</div>
										<div class="th th-operation">
											商品操作
										</div>
										<div class="th th-amount">
											合计
										</div>
										<div class="th th-status">
											交易状态
										</div>
										<div class="th th-change">
											交易操作
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
											<?php $__currentLoopData = $ds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<div class="order-status5">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;"><?php echo e($d->number); ?></a></div>
													<span>成交时间：<?php echo e(date('Y-m-d H:i:s',$d->addtime)); ?></span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">
														<ul class="item-list">
															<?php $__currentLoopData = $sp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$vv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<?php if($vv->id == $d->gid): ?>
															<li class="td td-item" style="width:33%;">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="
																		<?php
								                                           $tu = DB::table('goods_img')->where('gid',$d->gid)->first();
								                                           echo $tu->gpic;
								                                        ?>">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p><?php echo e($vv->gname); ?></p>
																			<p class="info-little"><?php echo e($vv->norns); ?>

																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	<?php echo e($vv->price); ?>

																</div>
															</li>
															<?php endif; ?>
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span><?php echo e($d->num); ?>

																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	
																</div>
															</li>
														</ul>
													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：<?php echo e($d->total); ?>

															
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">交易成功</p>
																	<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
																	<p class="order-info"><a href="logistics.html">查看物流</a></p>
																</div>
															</li>
															<?php switch($d->o_status):
                                                               
															    case (0): ?>
															    <p class="p-button">
															        <a class="button-operate-pay" href="/payment/order-11272519456"><span>立即支付</span></a>
															    </p>
															    <p class="p-link">
															        <a href='javascript:cancel("<?php echo e($d->number); ?>");'>取消订单</a>
															    </p>
															    <?php break; ?>

															    <?php case (1): ?>
															    <li class="td td-change col-state">
																<div class="am-btn am-btn-danger anniu" id="order_<?php echo e($d->id); ?>">
																	<a href='javascript:okgoods("<?php echo e($d->id); ?>");'>确认收货</a></div>
															    </li>
															    
															    <?php break; ?>

															    <?php case (2): ?>
															    <div class="col-state am-btn am-btn-danger anniu">
															        已完成
															    </div>
															    <?php break; ?>

															    <?php case (3): ?>
															    <div class="col-state am-btn am-btn-danger anniu">
															        <a href="/jiesuan/order_evaluate/<?php echo e($d->id); ?>">待评价</a>
															    </div>
															    <?php break; ?>
															<?php endswitch; ?>
															
														</div>
													</div>
												</div>
											</div>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</div>
									</div>
								</div>
                               
								<div class="am-tab-panel am-fade" id="tab4">
									<div class="order-top">
										<div class="th th-item">
											商品
										</div>
										<div class="th th-price">
											单价
										</div>
										<div class="th th-number">
											数量
										</div>
										<div class="th th-operation">
											商品操作
										</div>
										<div class="th th-amount">
											合计
										</div>
										<div class="th th-status">
											交易状态
										</div>
										<div class="th th-change">
											交易操作
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
											<?php $__currentLoopData = $dp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $vvv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<div class="order-status5">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;"><?php echo e($vvv->number); ?></a></div>
													<span>成交时间：<?php echo e(date('Y-m-d H:i:s',$vvv->addtime)); ?></span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">
														<ul class="item-list">
															<?php $__currentLoopData = $sp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$vv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<?php if($vv->id == $vvv->gid): ?>
															<li class="td td-item" style="width:33%;">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="
																		<?php
								                                           $tu = DB::table('goods_img')->where('gid',$vvv->gid)->first();
								                                           echo $tu->gpic;
								                                        ?>">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p><?php echo e($vv->gname); ?></p>
																			<p class="info-little"><?php echo e($vv->norns); ?>

																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	<?php echo e($vv->price); ?>

																</div>
															</li>
															<?php endif; ?>
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span><?php echo e($vvv->num); ?>

																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	
																</div>
															</li>
														</ul>
													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：<?php echo e($vvv->total); ?>

															
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">交易成功</p>
																	<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
																	<p class="order-info"><a href="logistics.html">查看物流</a></p>
																</div>
															</li>
															<?php switch($vvv->o_status):
                                                               
															    case (0): ?>
															    <p class="p-button">
															        <a class="button-operate-pay" href="/payment/order-11272519456"><span>立即支付</span></a>
															    </p>
															    <p class="p-link">
															        <a href='javascript:cancel("<?php echo e($vvv->number); ?>");'>取消订单</a>
															    </p>
															    <?php break; ?>

															    <?php case (1): ?>
															    <li class="td td-change col-state">
																<div class="am-btn am-btn-danger anniu" id="order_<?php echo e($vvv->id); ?>">
																	<a href='javascript:okgoods("<?php echo e($vvv->id); ?>");'>确认收货</a></div>
															    </li>
															    
															    <?php break; ?>

															    <?php case (2): ?>
															    <div class="col-state am-btn am-btn-danger anniu">
															        已完成
															    </div>
															    <?php break; ?>

															    <?php case (3): ?>
															    <div class="col-state am-btn am-btn-danger anniu">
															        <a href="/jiesuan/order_evaluate/<?php echo e($vvv->id); ?>">待评价</a>
															    </div>
															    <?php break; ?>
															<?php endswitch; ?>
															
														</div>
													</div>
												</div>
											</div>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</div>
									</div>
								</div>
								<div class="am-tab-panel am-fade" id="tab5">
									<div class="order-top">
										<div class="th th-item">
											商品
										</div>
										<div class="th th-price">
											单价
										</div>
										<div class="th th-number">
											数量
										</div>
										<div class="th th-operation">
											商品操作
										</div>
										<div class="th th-amount">
											合计
										</div>
										<div class="th th-status">
											交易状态
										</div>
										<div class="th th-change">
											交易操作
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">

										<?php $__currentLoopData = $wg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$dd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<div class="order-status5">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;"><?php echo e($dd->number); ?></a></div>
													<span>成交时间：<?php echo e(date('Y-m-d H:i:s',$dd->addtime)); ?></span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">
														<ul class="item-list">
															<?php $__currentLoopData = $sp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$vv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<?php if($vv->id == $dd->gid): ?>
															<li class="td td-item" style="width:33%;">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="
																		<?php
								                                           $tu = DB::table('goods_img')->where('gid',$v->gid)->first();
								                                           echo $tu->gpic;
								                                        ?>">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p><?php echo e($vv->gname); ?></p>
																			<p class="info-little"><?php echo e($vv->norns); ?>

																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	<?php echo e($vv->price); ?>

																</div>
															</li>
															<?php endif; ?>
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span><?php echo e($dd->num); ?>

																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	
																</div>
															</li>
														</ul>
													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：<?php echo e($dd->total); ?>

															
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">交易成功</p>
																	<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
																	<p class="order-info"><a href="logistics.html">查看物流</a></p>
																</div>
															</li>
															<?php switch($dd->o_status):
                                                               
															    case (0): ?>
															    <p class="p-button">
															        <a class="button-operate-pay" href="/payment/order-11272519456"><span>立即支付</span></a>
															    </p>
															    <p class="p-link">
															        <a href='javascript:cancel("<?php echo e($dd->number); ?>");'>取消订单</a>
															    </p>
															    <?php break; ?>

															    <?php case (1): ?>
															    <li class="td td-change col-state">
																<div class="am-btn am-btn-danger anniu" id="order_<?php echo e($dd->id); ?>">
																	<a href='javascript:okgoods("<?php echo e($dd->id); ?>");'>确认收货</a></div>
															    </li>
															    
															    <?php break; ?>

															    <?php case (2): ?>
															    <div class="col-state am-btn am-btn-danger anniu">
															        已完成
															    </div>
															    <?php break; ?>

															    <?php case (3): ?>
															    <div class="col-state am-btn am-btn-danger anniu">
															        <a href="/jiesuan/order_evaluate/<?php echo e($dd->id); ?>">待评价</a>
															    </div>
															    <?php break; ?>
															<?php endswitch; ?>
															
														</div>
													</div>
												</div>
											</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											
										</div>
									</div>
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

	
<?php $__env->startSection('js'); ?>
   <script>
   	$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
   </script>
   <script>
   	 function okgoods(val)
    {
        var tips=confirm("是否确认收货？");
        if(tips==true)
        {
            $.ajax({
                type:'get',    
                data:{
                'id':val
                },
                url:"/jiesuan/order_okgoods",
            }).done(function(res){
            	
               if(res.zhuangt == 0){
                    // console.log(res);
                    alert(res.tishi);
                    $("#order_"+res.goodsid).html('<a href="/jiesuan/order_evaluate/'+res.goodsid+'">待评价</a>');
                     location.reload();
                }else {
                    alert(res.tishi);
                }
            }).fail(function(){
                console.log("error")
            })
        }
    }
   </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>