<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0 ,minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>结算页面</title>

		<link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />

		<link href="/homes/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="/homes/css/cartstyle.css" rel="stylesheet" type="text/css" />

		<link href="/homes/css/jsstyle.css" rel="stylesheet" type="text/css" />
		<link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/homes/css/addstyle.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="/homes/js/address.js"></script>

	</head>

	<body>
		
		<div class="hmtop" style="background:#fff">
			<!--顶部导航条 -->
			<div class="am-container header">
				<ul class="message-l">
				<?php
				$customer = DB::table('customer')->where('id',session('cid'))->first();
				?>
					<div class="topMessage">
						<?php if(session('cid')): ?>
						<div class="menu-hd">
							<a href="#" target="_top" class="h">欢迎回来,<?php echo e($customer->customername); ?></a>
							<a href="/home/logout" target="_top">退出登录</a>
						</div>
						<?php else: ?>
						<div class="menu-hd">
							<a href="/home/login" target="_top" class="h">亲，请登录</a>
							<a href="/home/register" target="_top">免费注册</a>
						</div>
						<?php endif; ?>
					</div>
				</ul>
				<ul class="message-r">
					<div class="topMessage home">
						<div class="menu-hd"><a href="/" target="_top" class="h">商城首页</a></div>
					</div>
					<div class="topMessage my-shangcheng">
						<div class="menu-hd MyShangcheng"><a href="/home/personal/information" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
					</div>
					<div class="topMessage mini-cart">
						<?php
						$count = count(session('shop'));
						?>
						<div class="menu-hd"><a id="mc-menu-hd" href="http://g-mall.cn/home/shopcar" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">(<?php echo e($count); ?>)</strong></a></div>
					</div>
					<div class="topMessage favorite">
						<div class="menu-hd"><a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
				</ul>
				</div>
			<!--悬浮搜索框-->

			<div class="nav white">
				<div class="logo"><img src="/homes/images/logo.png" /></div>
				<div class="logoBig">
					<li><img src="/homes/images/logobig.png" /></li>
				</div>

				<div class="search-bar pr">
					<a name="index_none_header_sysc" href="#"></a>
					<form>
						<input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
						<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
					</form>
				</div>
			</div>

			<div class="clear"></div>
			<div class="concent">
				<!--地址 -->
				<div class="paycont">
					<div class="address">
						<h3>确认收货地址 </h3>
						<div class="control">
							<div class="tc-btn createAddr  am-btn am-btn-danger"><a href="/home/personal/address">使用新地址</a></div>
						</div>
						<div class="clear"></div>
						<ul>
							<div class="per-border"></div>

							<?php

							$address = DB::table('address')->where('cid',session('cid'))->get();
							
							?>

							<?php $__currentLoopData = $address; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k =>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							
							
								<?php if($v->status == '0'): ?>
								<li class="user-addresslist defaultAddr lis"  aid="<?php echo e($v->id); ?>" >
								<span class="new-option-r" id="dz_<?php echo e($v->id); ?>"><i class="am-icon-check-circle"></i>默认地址</span>
								<?php else: ?>
								<li class="user-addresslist lis"   aid="<?php echo e($v->id); ?>" >
								<span class="new-option-r" id="dz_<?php echo e($v->id); ?>"><i class="am-icon-check-circle"></i>设为默认</span>
								<?php endif; ?>
								<p class="new-tit new-p-re">
									<span class="new-txt"><?php echo e($v->name); ?></span>
									<span class="new-txt-rd2"><?php echo e($v->phone); ?></span>
								</p>
								<div class="new-mu_l2a new-p-re">
									<p class="new-mu_l2cw">
										<span class="title">地址：</span>
										<span class="street"><?php echo e($v->location); ?></span></p>
								</div>

								<div class="new-addr-btn ">
									<?php echo e(csrf_field()); ?>

									<a href="/home/personal/addedit/<?php echo e($v->id); ?>"><i class="am-icon-edit"></i>编辑</a>
									<span class="new-addr-bar">|</span>
									<a class="al" aid="<?php echo e($v->id); ?>" href="javascript:void(0);" ><i class="am-icon-trash"></i>删除</a>
								</div>
							</li>

							
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						<div class="clear"></div>
					</div>
					<!--物流 -->
					
					<!--支付方式-->
					
					<div class="clear"></div>

					<!--订单 -->
					<form action="/jiesuan"  method="post" id="orders">
				    <?php 
				     $tot = 0;
				    ?>
					<div class="concent">
						<div id="payTable">
							<h3>确认订单信息</h3>
							<div class="cart-table-th">
								<div class="wp">

									<div class="th th-item">
										<div class="td-inner">商品信息</div>
									</div>
									<div class="th th-price">
										<div class="td-inner">单价</div>
									</div>
									<div class="th th-amount">
										<div class="td-inner">数量</div>
									</div>
									<div class="th th-sum">
										<div class="td-inner">金额</div>
									</div>
									

								</div>
							</div>
							<div class="clear"></div>
							<?php $__currentLoopData = $newArr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr class="item-list">
								<div class="bundle  bundle-last">
									<div class="bundle-main">
										<ul class="item-content clearfix">
											<div class="pay-phone">
												<li class="td td-item">
													<div class="item-pic">
														<a href="#" class="J_MakePoint">
															<img src="<?php
					                                               $tu = DB::table('goods_img')->where('gid',$v['id'])->first();
					                                               echo $tu->gpic
					                                               ?>" class="itempic J_ItemImg"></a>
													</div>
													<div class="item-info">
														<div class="item-basic-info" style="text-align:center">
															<a href="#" class="item-title J_MakePoint" data-point="tbcart.8.11"><?php echo e($v['goodsinfo']->gname); ?></a>
														</div>
													</div>
												</li>
												<li class="td td-info">
													<div class="item-props">
														<span class="sku-line"></span>
														<!-- <span class="sku-line">包装：裸装</span> -->
													</div>
												</li>
												<li class="td td-price">
													<div class="item-price price-promo-promo">
														<div class="price-content">
															<em class="J_Price price-now"><?php echo e($v['goodsinfo']->price); ?></em>
														</div>
													</div>
												</li>
											</div>
											<li class="td td-amount">
												<div class="amount-wrapper ">
													<div class="item-amount ">
														<span class="phone-title">购买数量</span>
														<div class="sl">
															<input class="mins am-btn" name="" type="button" value="-" />
															<input class="text_box" name="" type="text" value="<?php echo e($v['num']); ?>" style="width:30px;" />
															<input class="add am-btn" name="" type="button" value="+" />
														</div>
													</div>
												</div>
											</li>
											<li class="td td-sum">
												<div class="td-inner">
													<?php
			                                         $money = $v['num']*$v['goodsinfo']->price;
			                                         $tot+=$money
			                                        ?>
													<em tabindex="0" class="J_ItemSum number"><?php echo e($v['goodsinfo']->price*$v['num']); ?></em>
												</div>
											</li>
											
										</ul>
										<div class="clear"></div>

									</div>
							</tr>
                            <input type="hidden" name="shopid[]" value="<?php echo e($v['id']); ?>">
                            <input type="hidden" name="num[]" value="<?php echo e($v['num']); ?>">
                            <input type="hidden" name="price[]" value="<?php echo e($v['goodsinfo']->price); ?>">
							<div class="clear"></div>
							</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			
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
							<!--优惠券 -->
							
							<div class="clear"></div>
							</div>
							<!--含运费小计 -->
							

							<!--信息 -->
							<div class="order-go clearfix">
								<div class="pay-confirm clearfix">
									
									<div class="box">
										<div tabindex="0" id="holyshit267" class="realPay"><em class="t">实付款：</em>
											<span class="price g_price ">
                                    <span>¥</span> <em class="style-large-bold-red " id="J_ActualFee" name="pricesum"><?php echo e($tot); ?></em>
											</span>
										</div>
                                           <input type="hidden" value="<?php echo e($tot); ?>" name="pricesum" /> 
										<div id="holyshit268" class="pay-address">

										<!-- 	<p class="buy-footer-address">
												<span class="buy-line-title buy-line-title-type">寄送至：</span>
												<span class="buy--address-detail">
								   
												<span class="street"></span>
												</span>
												</span>
											</p>
											<p class="buy-footer-address">
												<span class="buy-line-title">收货人：</span>
												<span class="buy-address-detail">   
                                         <span class="buy-user"> </span>
												<span class="buy-phone"></span>
												</span>
											</p> -->
										</div>
									</div>
								
									<div id="holyshit269" class="submitOrder">
										<div class="go-btn-wrap">
											
											<input type="submit"  id="J_Go" class="btn-go" value="提交订单" style="
    float: right;
"/>
										</div>
									</div>
									<div class="clear"></div>
								</div>
							</div>
						</div>

						<div class="clear"></div>
					</div>
					 <?php echo e(csrf_field()); ?>

					</form>
				</div>
				<div class="footer">
					
					<div class="footer-hd">
						
						<p>
							<?php $__currentLoopData = $fri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<a href="<?php echo e($v->url); ?>"><?php echo e($v->fname); ?></a>
							<b>|</b>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</p>
						
					</div>
					
					<div class="footer-bd">
						<p>
							<a href="#">关于恒望</a>
							<a href="#">合作伙伴</a>
							<a href="#">联系我们</a>
							<a href="#">网站地图</a>
							<em>© 2015-2025 Hengwang.com 版权所有. 更多模板 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></em>
						</p>
					</div>
				</div>
			</div>
			<div class="theme-popover-mask"></div>
			<div class="theme-popover">

				<!--标题 -->
				<div class="am-cf am-padding">
					<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> / <small>Add address</small></div>
				</div>
				<hr/>

				<div class="am-u-md-12">
					<form class="am-form am-form-horizontal">

						<div class="am-form-group">
							<label for="user-name" class="am-form-label">收货人</label>
							<div class="am-form-content">
								<input type="text" id="user-name" placeholder="收货人">
							</div>
						</div>

						<div class="am-form-group">
							<label for="user-phone" class="am-form-label">手机号码</label>
							<div class="am-form-content">
								<input id="user-phone" placeholder="手机号必填" type="email">
							</div>
						</div>

						<div class="am-form-group">
							<label for="user-phone" class="am-form-label">所在地</label>
							<div class="am-form-content address">
								<select data-am-selected>
									<option value="a">浙江省</option>
									<option value="b">湖北省</option>
								</select>
								<select data-am-selected>
									<option value="a">温州市</option>
									<option value="b">武汉市</option>
								</select>
								<select data-am-selected>
									<option value="a">瑞安区</option>
									<option value="b">洪山区</option>
								</select>
							</div>
						</div>

						<div class="am-form-group">
							<label for="user-intro" class="am-form-label">详细地址</label>
							<div class="am-form-content">
								<textarea class="" rows="3" id="user-intro" placeholder="输入详细地址"></textarea>
								<small>100字以内写出你的详细地址...</small>
							</div>
						</div>

						<div class="am-form-group theme-poptit">
							<div class="am-u-sm-9 am-u-sm-push-3">
								<div class="am-btn am-btn-danger">保存</div>
								<div class="am-btn am-btn-danger close">取消</div>
							</div>
						</div>
					</form>
				</div>

			</div>

			<div class="clear"></div>

			<script>
				//加
				$('.add').click(function(){

					//获取数量的值
					var pv = $(this).prev().val();
					$(this).prev().val(pv);
					pv++;
					//库存问题
					
					//获取单价
					var prc=$(this).parents('ul').find('.J_Price').text().trim();
					console.log(prc);
						function accMul(arg1, arg2) {

				        var m = 0, s1 = arg1.toString(), s2 = arg2.toString();

				        try { m += s1.split(".")[1].length } catch (e) { }

				        try { m += s2.split(".")[1].length } catch (e) { }

				        return Number(s1.replace(".", "")) * Number(s2.replace(".", "")) / Math.pow(10, m)

						}

					//小计  单价 * pv
					$(this).parents('ul').find('.J_ItemSum').text(accMul(pv, prc));	

					totals()
				})

				//减
				$('.mins').click(function(){
					//获取数量的值
					var pv=$(this).next().val();
					// console.log(pv);
					pv--;
					if(pv <= 1){

						pv =1;
					}
					$(this).next().val(pv);
					// console.log(pv);
					//获取单价
					var prc = $(this).parents('ul').find('.J_Price').text().trim();
					// console.log(prc);
						function accMul(arg1, arg2) {

				        var m = 0, s1 = arg1.toString(), s2 = arg2.toString();

				        try { m += s1.split(".")[1].length } catch (e) { }

				        try { m += s2.split(".")[1].length } catch (e) { }

				        return Number(s1.replace(".", "")) * Number(s2.replace(".", "")) / Math.pow(10, m)

						}
						//小计  单价 * pv
						$(this).parents('ul').find('.J_ItemSum').text(accMul(pv, prc));	


						totals()
				})

					totals()
					function totals()
					{
						function accAdd(arg1,arg2){  
						    var r1,r2,m;  
						    try{r1=arg1.toString().split(".")[1].length}catch(e){r1=0}  
						    try{r2=arg2.toString().split(".")[1].length}catch(e){r2=0}  
						    m=Math.pow(10,Math.max(r1,r2))  
						    return (arg1*m+arg2*m)/m  
						}

						var pcr = 0;

						var sum = 0;
						//遍历
						$('.J_ItemSum').each(function(){

							//获取小计
							pcr = parseFloat($(this).parents('ul').find('.J_ItemSum').text());
						
							sum = accAdd(sum, pcr);
						
						})

						//让总计发生改变
						$('#J_ActualFee').text(sum);
					}
			</script>
	</body>

</html>