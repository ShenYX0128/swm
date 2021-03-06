
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<?php
	$config = DB::table('config')->where('id',1)->first();
	?>
	<?php if($config->status ==1): ?>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title><?php echo $__env->yieldContent('title'); ?></title>

		<link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />

		<link href="/homes/basic/css/demo.css" rel="stylesheet" type="text/css" />

		<link href="/homes/css/hmstyle.css" rel="stylesheet" type="text/css"/>
		<link href="/homes/css/skin.css" rel="stylesheet" type="text/css" />
		<link href="/homes/css/cartstyle.css" rel="stylesheet" type="text/css" />
		<link href="/homes/css/optstyle.css" rel="stylesheet" type="text/css" />
	</head>

	<body>
		<div class="hmtop">
			<!--顶部导航条 -->
			<div class="am-container header">
				<ul class="message-l">
				<?php
				$customer = DB::table('customer')->where('id',session('cid'))->first();
				?>
					<div class="topMessage">
						<?php if(session('cid')): ?>
						<div class="menu-hd">
							<?php if(!$customer->customername): ?>
								<a href="#" target="_top" class="h">欢迎回来,<?php echo e($customer->phone); ?></a>
							<?php else: ?>
								<a href="#" target="_top" class="h">欢迎回来,<?php echo e($customer->customername); ?></a>
							<?php endif; ?>
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
						$count=count(session('shop'));
						?>
						<div class="menu-hd"><a id="mc-menu-hd" href="http://g-mall.cn/shopcar" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">(<?php echo e($count); ?>)</strong></a></div>
					</div>
					<div class="topMessage favorite">
						<div class="menu-hd"><a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
				</ul>
				</div>
				
				<!--悬浮搜索框-->

				<div class="nav white">
					<div class="logo"><img src="<?php echo e($config->logo); ?>" /></div>
					<div class="logoBig">
						<li><img src="<?php echo e($config->logo); ?>"style="max-width:150px;max-height:100px;" /></li>
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
			</div>
				<?php $__env->startSection('content'); ?>
				<?php echo $__env->yieldSection(); ?>	
		    	
		    	
					<div class="footer ">
						<div class="footer-hd ">
							<p>
								<?php
						           $friend = DB::table('friend')->get();
						        ?>
								<?php $__currentLoopData = $friend; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<a href="<?php echo e($v->url); ?>" ><?php echo e($v->fname); ?></a>
								<b>|</b>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</p>
						</div>
					</div>

		</div>
		</div>
		<!--引导 -->
		<div class="navCir">
			<li class="active"><a href="home.html"><i class="am-icon-home "></i>首页</a></li>
			<li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
			<li><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>	
			<li><a href="../person/index.html"><i class="am-icon-user"></i>我的</a></li>					
		</div>
		

		<!--菜单 -->
		<div class=tip>
			<div id="sidebar">
				<div id="wrap">
					<div id="prof" class="item ">
						<a href="# ">
							<span class="setting "></span>
						</a>

				<?php if(session('cid')): ?>
					<div class="ibar_login_box status_login ">
				<?php
				$customer = DB::table('customer')->where('id',session('cid'))->first();
						
				?>

						<div class="avatar_box ">
							<?php if(!$customer->profile): ?>
							<p class="avatar_imgbox"><img src="/homes/images/no-img_mid_.jpg" / style="width:100px;height:100px;margin-right:30px;"></p>
							<?php else: ?>
							<p class="avatar_imgbox"><img src="<?php echo e($customer->profile); ?>" / style="width:100px;height:100px;margin-right:30px;"></p>
							<?php endif; ?>
							<ul class="user_info ">
								<?php if(!$customer->customername): ?>
								<li><?php echo e($customer->phone); ?></li>
								<?php else: ?>
								<li><?php echo e($customer->customername); ?></li>
								<?php endif; ?>
								<li><a href="/home/logout" style="align:center;width:110px; padding-left:26px;">退出登录</a></li>
							</ul>
						</div>
						<div class="login_btnbox ">
							<a href="# " class="login_order ">我的订单</a>
							<a href="# " class="login_favorite ">我的收藏</a>
						</div>
						<i class="icon_arrow_white "></i>
					</div>
				<?php else: ?>
					<div class="ibar_login_box status_login ">
						<div class="avatar_box ">
							<p class="avatar_imgbox "><img src="/homes/images/no-img_mid_.jpg " /></p>
							<ul class="user_info ">
								<li>亲，请先登录</li>
							</ul>
						</div>
						<div class="login_btnbox ">
							<a href="# " class="login_order ">我的订单</a>
							<a href="# " class="login_favorite ">我的收藏</a>
						</div>
						<i class="icon_arrow_white "></i>
					</div>
				<?php endif; ?>
					</div>
					<div id="shopCart " class="item ">
						<a href="# ">
							<span class="message "></span>
						</a>
						<p>
							购物车
						</p>
						<p class="cart_num "><?php echo e($count); ?></p>
					</div>
					<div id="asset " class="item ">
						<a href="# ">
							<span class="view "></span>
						</a>
						<div class="mp_tooltip ">
							我的资产
							<i class="icon_arrow_right_black "></i>
						</div>
					</div>

					<div id="foot " class="item ">
						<a href="# ">
							<span class="zuji "></span>
						</a>
						<div class="mp_tooltip ">
							我的足迹
							<i class="icon_arrow_right_black "></i>
						</div>
					</div>

					<div id="brand " class="item ">
						<a href="#">
							<span class="wdsc "><img src="/homes/images/wdsc.png " /></span>
						</a>
						<div class="mp_tooltip ">
							我的收藏
							<i class="icon_arrow_right_black "></i>
						</div>
					</div>

					<div id="broadcast " class="item ">
						<a href="# ">
							<span class="chongzhi "><img src="/homes/images/chongzhi.png " /></span>
						</a>
						<div class="mp_tooltip ">
							我要充值
							<i class="icon_arrow_right_black "></i>
						</div>
					</div>

					<div class="quick_toggle ">
						<li class="qtitem ">
							<a href="# "><span class="kfzx "></span></a>
							<div class="mp_tooltip ">客服中心<i class="icon_arrow_right_black "></i></div>
						</li>
						<!--二维码 -->
						<li class="qtitem ">
							<a href="#none "><span class="mpbtn_qrcode "></span></a>
							<div class="mp_qrcode " style="display:none; "><img src="/homes/images/weixin_code_145.png " /><i class="icon_arrow_white "></i></div>
						</li>
						<li class="qtitem ">
							<a href="#top " class="return_top "><span class="top "></span></a>
						</li>
					</div>

					<!--回到顶部 -->
					<div id="quick_links_pop " class="quick_links_pop hide "></div>

				</div>

			</div>
			<?php $__env->startSection('rightcelan'); ?>
			<div id="prof-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					我
				</div>
			</div>
			<div id="shopCart-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					购物车
				</div>
			</div>
			<div id="asset-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					资产
				</div>

				<div class="ia-head-list ">
					<a href="# " target="_blank " class="pl ">
						<div class="num ">0</div>
						<div class="text ">优惠券</div>
					</a>
					<a href="# " target="_blank " class="pl ">
						<div class="num ">0</div>
						<div class="text ">红包</div>
					</a>
					<a href="# " target="_blank " class="pl money ">
						<div class="num ">￥0</div>
						<div class="text ">余额</div>
					</a>
				</div>

			</div>
			<div id="foot-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					足迹
				</div>
			</div>
			<div id="brand-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					收藏
				</div>
			</div>
			<div id="broadcast-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					充值
				</div>
			</div>
			<?php echo $__env->yieldSection(); ?>
		</div>
		<script>
			window.jQuery || document.write('<script src="/homes/basic/js/jquery.min.js "><\/script>');
		</script>
		<script type="text/javascript " src="/homes/basic/js/quick_links.js "></script>
		<?php $__env->startSection('js'); ?>
		<?php echo $__env->yieldSection(); ?>

		<?php else: ?>
			<h1>网站正在维护中......</h1>
		<?php endif; ?>
	</body>

</html>