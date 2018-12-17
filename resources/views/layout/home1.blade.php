<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	@php
	$config = DB::table('config')->where('id',1)->first();
	@endphp
	@if($config->status ==1)
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>@yield('title')</title>

		<link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />

		<link href="/homes/basic/css/demo.css" rel="stylesheet" type="text/css" />

		<link href="/homes/css/hmstyle.css" rel="stylesheet" type="text/css"/>
		<link href="/homes/css/skin.css" rel="stylesheet" type="text/css" />
		<link href="/homes/css/optstyle.css" rel="stylesheet" type="text/css" />
	</head>

	<body>
		<div class="hmtop">
			<!--顶部导航条 -->
			<div class="am-container header">
				<ul class="message-l">
				@php
				$customer = DB::table('customer')->where('id',session('cid'))->first();
				@endphp
					<div class="topMessage">
						@if(session('cid'))
						<div class="menu-hd">
							@if(!$customer->customername)
								<a href="#" target="_top" class="h">欢迎回来,{{$customer->phone}}</a>
							@else
								<a href="#" target="_top" class="h">欢迎回来,{{$customer->customername}}</a>
							@endif
							<a href="/home/logout" target="_top">退出登录</a>
						</div>
						@else
						<div class="menu-hd">
							<a href="/home/login" target="_top" class="h">亲，请登录</a>
							<a href="/home/register" target="_top">免费注册</a>
						</div>
						@endif
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
						@php
						$count=count(session('shop'));
						@endphp
						<div class="menu-hd"><a id="mc-menu-hd" href="http://g-mall.cn/shopcar" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">({{$count}})</strong></a></div>
					</div>
					<div class="topMessage favorite">
						<div class="menu-hd"><a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
				</ul>
				</div>
				
				<!--悬浮搜索框-->

				<div class="nav white">
					<div class="logo"><img src="{{$config->logo}}" /></div>
					<div class="logoBig">
						<li><img src="{{$config->logo}}"style="max-width:150px;max-height:100px;" /></li>
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
				@section('content')
				@show	
		    	
		    	
					<div class="footer ">
						<div class="footer-hd ">
							<p>
								@php
						           $friend = DB::table('friend')->get();
						        @endphp
								@foreach($friend as $k=>$v)
								<a href="{{$v->url}}" >{{$v->fname}}</a>
								<b>|</b>
								@endforeach
							</p>
						</div>
						<div class="footer-bd ">
							<p>
								<a href="# ">关于恒望</a>
								<a href="# ">合作伙伴</a>
								<a href="# ">联系我们</a>
								<a href="# ">网站地图</a>
								<em>© 2015-2025 Hengwang.com 版权所有. 更多模板 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></em>
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
	
		
		<script type="text/javascript " src="/homes/basic/js/quick_links.js "></script>
		@section('js')
		@show
		@else
			<h1>网站正在维护中......</h1>
		@endif
	</body>

</html>