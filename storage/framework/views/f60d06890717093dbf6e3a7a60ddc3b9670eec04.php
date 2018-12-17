<?php $__env->startSection('title',$title); ?>
		<meta name="_token" content="<?php echo csrf_token(); ?>">
		<link href="/homes/css/jsstyle.css" rel="stylesheet" type="text/css" />
		<link href="/homes/css/cartstyle.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="/homes/js/address.js"></script>
<?php $__env->startSection('content'); ?>
<!--地址 -->
				<div class="paycont">
					<div class="address">
						<h3>确认收货地址 </h3>
						<div class="control">
							<div class="tc-btn createAddr theme-login am-btn am-btn-danger"><a href="/home/personal/address"></a>使用新地址</div>
						</div>
						<div class="clear"></div>
						<ul>
							<?php $__currentLoopData = $add; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="per-border"></div>
							<li class="user-addresslist <?php if($v->status == 0): ?> defaultAddr <?php endif; ?>">

								<div class="address-left">
									<div class="user DefaultAddr">

										<span class="buy-address-detail">   
                   						<span class="buy-user"><?php echo e($v->name); ?></span>
										<span class="buy-phone"><?php echo e($v->phone); ?></span>
										</span>
									</div>
									<div class="default-address DefaultAddr">
										<span class="buy-line-title buy-line-title-type">收货地址：</span>
										<span class="buy--address-detail">
								   				<?php echo e($v->location); ?>

										</span>
									</div>
									<?php if($v->status == 0): ?>
									<ins class="deftip">默认地址</ins>
									<?php endif; ?>
								</div>
								<div class="address-right">
									<a href="../person/address.html">
										<span class="am-icon-angle-right am-icon-lg"></span></a>
								</div>
								<div class="clear"></div>

								<div class="new-addr-btn">
									<?php if($v->status != 0): ?>
									<a href="#" class="hidden">设为默认</a>
									<?php endif; ?>
									<span class="new-addr-bar hidden">|</span>
									<a href="/home/personal/addedit/<?php echo e($v->id); ?>">编辑</a>
									<span class="new-addr-bar">|</span>
									<a class="al" aid="<?php echo e($v->id); ?>" href="javascript:void(0);" ><i class="am-icon-trash"></i>删除</a>
								</div>

							</li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<script>

								$('.al').click(function(){
									var addid = $(this).attr('aid');
									var al = $(this);
									$.get('/home/destory',{id:addid},function(data){
										if (data) {
											//alert('删除成功');
											al.parents('.lis').css('display','none')
										} else {
											alert('删除失败，请检查后再次删除！！！')
										}
									})
								})
							</script>
						</ul>

						<div class="clear"></div>
					</div>

					<!--订单 -->
					<div class="concent">
						<div id="payTable">
							<h3>确认订单信息</h3>
							<div class="cart-table-th">
								<div class="wp">

									<div class="th th-item">
										<div class="td-inner">商品信息</div>
									</div>
									<div class="th th-price" style="width: 17%;">
										<div class="td-inner">单价</div>
									</div>
									<div class="th th-amount">
										<div class="td-inner">数量</div>
									</div>
									<div class="th th-sum" style="width: 19%;">
										<div class="td-inner">金额</div>
									</div>
								</div>
							</div>
							<div class="clear"></div>
							<?php $__currentLoopData = $img; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php $__currentLoopData = $gods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($order->gid == $val->id): ?>
							<?php if($v->gid == $val->id): ?>
							<?php if($order->id == $val->oid): ?>
							<tr class="item-list">
								<div class="bundle  bundle-last">
									<div class="bundle-main">
										<ul class="item-content clearfix">
											<div class="pay-phone">
												<li class="td td-item">
													<div class="item-pic">
														<a href="#" class="J_MakePoint">
															<img src="<?php echo e($v->gpic); ?>" width="80" class="itempic J_ItemImg"></a>
													</div>
													<div class="item-info">
														<div class="item-basic-info">
															<a href="#" class="item-title J_MakePoint" data-point="tbcart.8.11"><?php echo e($val->gname); ?></a>
														</div>
													</div>
												</li>
												<li class="td td-info">
													<div class="item-props">
														<span class="sku-line">口味：<?php echo e($val->norns); ?></span>
													</div>
												</li>
												<li class="td td-price">
													<div class="item-price price-promo-promo">
														<div class="price-content">
															<em class="J_Price price-now"><?php echo e($val->price); ?></em>
														</div>
													</div>
												</li>
											</div>
											<li class="td td-amount" style="width: 23%;">
												<div class="amount-wrapper ">
													<div class="item-amount ">
														<span class="phone-title">购买数量</span>
														<div class="sl">
															<input class="min am-btn" name="" type="button" value="-" />
															<input class="text_box" name="" type="text" value="<?php echo e($val->d_num); ?>" style="width:30px;" />
															<input class="add am-btn" name="" type="button" value="+" />
														</div>
													</div>
												</div>
											</li>
											<li class="td td-sum">
												<div class="td-inner">
													<em tabindex="0" class="J_ItemSum number"><?php echo e($val->d_num*$val->price); ?></em>
												</div>
											</li>
										</ul>
										<div class="clear"></div>

									</div>
							</tr>
							<?php endif; ?>
							<?php endif; ?>
							<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<div class="clear"></div>
							</div>
							</div>
							<div class="clear"></div>
							<div class="pay-total">
						<!--留言-->
							<div class="order-extra">
								<div class="order-user-info">
									<div id="holyshit257" class="memo">
										<label>买家留言：</label>
										<input type="text" title="选填,对本次交易的说明（建议填写已经和卖家达成一致的说明）" placeholder="选填,建议填写和卖家达成一致的说明" class="memo-input J_MakePoint c2c-text-default memo-close">
										<div class="msg hidden J-msg">
											<p class="error">最多输入500个字符</p>
										</div>
									</div>
								</div>

							</div>
							
							<div class="clear"></div>
							</div>
							<!--含运费小计 -->
							<div class="buy-point-discharge ">
								<p class="price g_price ">
									合计（含运费） <span>¥</span><em class="pay-sum">244.00</em>
								</p>
							</div>

							<!--信息 -->
							<div class="order-go clearfix">
								<div class="pay-confirm clearfix">
									<div class="box">
										<div tabindex="0" id="holyshit267" class="realPay"><em class="t">实付款：</em>
											<span class="price g_price ">
                                    <span>¥</span> <em class="style-large-bold-red " id="J_ActualFee">244.00</em>
											</span>
										</div>

										<div id="holyshit268" class="pay-address">

											<p class="buy-footer-address buy-sub-add">
												<span class="buy-line-title buy-line-title-type">寄送至：</span>
												<span class="buy--address-detail">
								   					
												</span>
												</span>
											</p>
											<p class="buy-footer-address buy-sub">
												<span class="buy-line-title">收货人：</span>
												<span class="buy-address-detail">   
                                         <span class="buy-user">艾迪 </span>
												<span class="buy-phone">15871145629</span>
												</span>
											</p>
										</div>
									</div>
									<input type="hidden" name="" id="ord_id" value="<?php echo e($order->id); ?>">
									<div id="holyshit269" class="submitOrder">
										<div class="go-btn-wrap">
											<a id="J_Go" href="javascript:void(0)" class="btn-go" tabindex="0" title="点击此按钮，提交订单">提交订单</a>
										</div>
									</div>
									<div class="clear"></div>
								</div>
							</div>
						</div>

						<div class="clear"></div>
					</div>
				</div>
				
			</div>
			<div class="theme-popover-mask"></div>
			
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script type="text/javascript">
	var tota = $('.J_ItemSum').text().trim();
	$('.pay-sum').text(tota);
	$('#J_ActualFee').text(tota);
	var n = $('.defaultAddr').children().children().find('.buy-user').text();
	var p = $('.defaultAddr').children().children().find('.buy-phone').text();
	var a = $('.defaultAddr').children().children().find('.buy--address-detail').text();
	var oid = $('#ord_id').val().trim();
	// console.log(a);
	 $('.buy-sub').children().children('.buy-user').text(n);
	$('.buy-sub').children().children('.buy-phone').text(p);
	$('.buy-sub-add').find('.buy--address-detail').text(a);
	// console.log(d);
	$.ajaxSetup({
   		headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
	});
	$('#J_Go').click(function(){

		$.post('/home/paycreate',{oname:n,o_address:a,o_phone:p,oid:<?php echo e($order->id); ?>,total:<?php echo e($val->d_num*$val->price); ?>,o_status:1},function(data){
			location.href='/home/success/<?php echo e($order->id); ?>';
		})
	})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.home1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>