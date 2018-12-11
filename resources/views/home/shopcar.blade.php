<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">


		<title>{{$title}}</title>

		<link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/homes/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="/homes/css/cartstyle.css" rel="stylesheet" type="text/css" />
		<link href="/homes/css/optstyle.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="/homes/js/jquery.js"></script>
		<style type="text/css">
			.cart-empty{
			height: 98px;
		    padding: 80px 0 120px;
		    color: #333;

		}

		.cart-empty .message{
			height: 98px;
		    padding-left: 341px;
		    background: url(/homes/gwc/no-login-icon.png) 250px 22px no-repeat;
		}

		.cart-empty .message .txt {
		    font-size: 14px;
		}
		.cart-empty .message li {
		    line-height: 38px;
		}
		.ftx-05{
			color:#017bd6; 
		}
		</style>

	</head>

	<body>

		<!--顶部导航条 -->
		<div class="am-container header">
			<ul class="message-l">
				@php
				$customer = DB::table('customer')->where('id',session('cid'))->first();
				@endphp
					<div class="topMessage">
						@if(session('cid'))
						<div class="menu-hd">
							<a href="#" target="_top" class="h">欢迎回来,{{$customer->customername}}</a>
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
						$count = DB::table('shopcar')->where('uid',session('cid'))->count();
						@endphp
						<div class="menu-hd"><a id="mc-menu-hd" href="http://g-mall.cn/home/shopcar" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">({{$count}})</strong></a></div>
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

			<!--购物车 -->
			<div class="concent">
				<div class="shop">
					<div id="cartTable">
					<div class="cart-table-th">
						<div class="wp">
							<div class="th th-chk">
								<div id="J_SelectAll1" class="select-all J_SelectAll">

								</div>
							</div>
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
							<div class="th th-op">
								<div class="td-inner">操作</div>
							</div>
						</div>
					</div>
					<div class="clear"></div>
					<tr class="item-list">
						<div class="bundle  bundle-last ">
							<div class="bundle-hd">
								<div class="bd-promos">
									<div class="bd-has-promo">已享优惠:<span class="bd-has-promo-content">省￥19.50</span>&nbsp;&nbsp;</div>
									<div class="act-promo">
										<a href="#" target="_blank">第二支半价，第三支免费<span class="gt">&gt;&gt;</span></a>
									</div>
									<span class="list-change theme-login">编辑</span>
								</div>
							</div>
							<div class="clear"></div>

							@foreach($res as $k => $v)
							@if($v->uid == session('cid'))
							@foreach($gods as $ke => $val)
							@if($val->id == $v->gid)
							<div class="bundle-main">
								<ul class="item-content clearfix">
									<li class="td td-chk">
										<div class="cart-checkbox ">
											<input class="check" gid="{{$v->id}}" name="items[]" value="170769542747" type="checkbox">
											<label for="J_CheckBox_170769542747"></label>
										</div>
									</li>
									<li class="td td-item">
										<div class="item-pic">
											<a href="#" target="_blank" data-title="{{$v->name}}" class="J_MakePoint" data-point="tbcart.8.12">
												<img src="{{$v->shop_img}}" class="itempic J_ItemImg" width="80px"></a>
										</div>
										<div class="item-info">
											<div class="item-basic-info">
												<a href="#" target="_blank" title="{{$v->name}}" class="item-title J_MakePoint" data-point="tbcart.8.11">{{$v->name}}</a>
											</div>
										</div>
									</li>
									<li class="td td-info">
										<div class="item-props item-props-can">
											<span class="sku-line">{{$v->norns}}</span>
											<span class="sku-line"></span>
											<span tabindex="0" class="btn-edit-sku theme-login">修改</span>
											<i class="theme-login am-icon-sort-desc"></i>
										</div>
									</li>
									<li class="td td-price">
										<div class="item-price price-promo-promo">
											<div class="price-content">
												<div class="price-line">
													<em class="price-original">{{$val->discount}}</em>
												</div>
												<div class="price-line">
													<em class="J_Price price-now" tabindex="0">{{$val->price}}</em>
												</div>
											</div>
										</div>
									</li>
									<li class="td td-amount">
										<div class="amount-wrapper ">
											<div class="item-amount ">
												<div class="sl">
													<input class="mins am-btn" name="" type="button" value="-" />
													<input class="text_box" name="" type="text" value="{{$v->num}}" style="width:30px;" />
													<input class="add am-btn" name="" type="button" value="+" />
												</div>
											</div>
										</div>
									</li>
									<li class="td td-sum">
										<div class="td-inner">
											<em tabindex="0" class="J_ItemSum number">{{$v->prime}}</em>
										</div>
									</li>
									<li class="td td-op">
										<div class="td-inner">
											<a title="移入收藏夹" class="btn-fav" href="#">
                  移入收藏夹</a>
											<a href="javascript:void(0)" data-point-url="#" class="delete">
                  删除</a>
										</div>
									</li>
								</ul>
							</div>
							@endif
							@endforeach
							@endif
							@endforeach
						</div>
					</tr>
				</div>
				<div class="clear"></div>

				<div class="float-bar-wrapper">
					<div id="J_SelectAll2" class="select-all J_SelectAll">
						<div class="cart-checkbox">
							<!-- <input class="check-all" id="J_SelectAllCbx2" name="select-all" value="true" type="checkbox">
							<label for="J_SelectAllCbx2"></label> -->
						</div>
						<!-- <span>全选</span> -->
						<a href="javascript:void(0)" class="quan">全选</a>
					</div>
					<div class="operations">
						<a href="javascript:void(0)" hidefocus="true" class="deleteAll">删除</a>
						<a href="#" hidefocus="true" class="J_BatchFav">移入收藏夹</a>
					</div>
					<div class="float-bar-right">
						<div class="amount-sum">
							<span class="txt">已选商品</span>
							<em id="nums">0</em><span class="txt">件</span>
							<div class="arrow-box">
								<span class="selected-items-arrow"></span>
								<span class="arrow"></span>
							</div>
						</div>
						<div class="price-sum">
							<span class="txt">合计:</span>
							<strong class="price">¥<em id="J_Total">0.00</em></strong>
						</div>
						<div class="btn-area">
							<a href="pay.html" id="J_Go" class="submit-btn submit-btn-disabled" aria-label="请注意如果没有选择宝贝，将无法结算">
								<span>结&nbsp;算</span></a>
						</div>
					</div>

				</div>
			</div>
			<div class="cart-empty" style='display:none'>
			    <div class="message">
			        <ul>
			            <li class="txt">
			                购物车空空的哦~，去看看心仪的商品吧~
			            </li>
			            <li class="mt10">
			                <a href="/" class="ftx-05">
			                    去购物&gt;
			                </a>
			            </li>
			            
			        </ul>
			    </div>
				</div>
				

				<div class="footer">
					<div class="footer-hd">
						<p>
							<a href="#">恒望科技</a>
							<b>|</b>
							<a href="#">商城首页</a>
							<b>|</b>
							<a href="#">支付宝</a>
							<b>|</b>
							<a href="#">物流</a>
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


			<!--操作页面-->

			<div class="theme-popover-mask"></div>

			<div class="theme-popover">
				<div class="theme-span"></div>
				<div class="theme-poptit h-title">
					<a href="javascript:;" title="关闭" class="close">×</a>
				</div>
				<div class="theme-popbod dform">
					<form class="theme-signin" name="loginform" action="" method="post">

						<div class="theme-signin-left">

							<li class="theme-options">
								<div class="cart-title">颜色：</div>
								<ul>
									<li class="sku-line selected">12#川南玛瑙<i></i></li>
									<li class="sku-line">10#蜜橘色+17#樱花粉<i></i></li>
								</ul>
							</li>
							<li class="theme-options">
								<div class="cart-title">包装：</div>
								<ul>
									<li class="sku-line selected">包装：裸装<i></i></li>
									<li class="sku-line">两支手袋装（送彩带）<i></i></li>
								</ul>
							</li>
							<div class="theme-options">
								<div class="cart-title number">数量</div>
								<dd>
									<input class="min am-btn am-btn-default" name="" type="button" value="-" />
									<input class="text_box" name="" type="text" value="1" style="width:30px;" />
									<input class="add am-btn am-btn-default" name="" type="button" value="+" />
									<span  class="tb-hidden">库存<span class="stock">1000</span>件</span>
								</dd>

							</div>
							<div class="clear"></div>
							<div class="btn-op">
								<div class="btn am-btn am-btn-warning">确认</div>
								<div class="btn close am-btn am-btn-warning">取消</div>
							</div>

						</div>
						<div class="theme-signin-right">
							<div class="img-info">
								<img src="/homes/images/kouhong.jpg_80x80.jpg" />
							</div>
							<div class="text-info">
								<span class="J_Price price-now">¥39.00</span>
								<span id="Stock" class="tb-hidden">库存<span class="stock">1000</span>件</span>
							</div>
						</div>

					</form>
				</div>
			</div>
		<!--引导 -->
		<div class="navCir">
			<li><a href="home.html"><i class="am-icon-home "></i>首页</a></li>
			<li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
			<li class="active"><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>	
			<li><a href="../person/index.html"><i class="am-icon-user"></i>我的</a></li>					
		</div>
	</body>
	<script type="text/javascript">
		function accMul(arg1,arg2) {
				var m = 0,s1 = arg1.toString(),s2 = arg2.toString();
				try {
					m += s1.split('.')[1].length
				} catch (e) { }
				try {
					m += s2.split('.')[1].length
				} catch (e) { }
				return Number(s1.replace(".",""))*Number(s2.replace(".",""))/Math.pow(10,m)
			}
		// 加
		$('.add').click(function(){
			// 获取数量的值
			var tb = $(this).prev().val();
			tb++;
			// 获取单价
			var prc = $(this).parents('ul').find('.price-now').text().trim();
			// console.log(tb);
			$(this).parents('ul').find('.number').text(accMul(tb,prc));
			totals()
		})
		// 减
		$('.mins').click(function(){
			// 获取值
			var tb = $(this).next().val();
			// console.log(tb);
			tb--;
			if(tb <= 1){
				tb = 1;
			}
			$(this).next().val(tb);
			// 获取单价
			var prc = $(this).parents('ul').find('.price-now').text().trim();
			// 让小计发生改变
			$(this).parents('ul').find('.number').text(accMul(prc,tb));
			totals()
		})
		// 选择
		$('.check').click(function(){
			totals()
			/*$("input[type=checkbox]:checked").each(function() {

			  i++;
			console.log(i);

			});*/

		})

		function totals()
		{
			function accAdd(arg1,arg2){  
			    var r1,r2,m;  
			    try{r1=arg1.toString().split(".")[1].length}catch(e){r1=0}  
			    try{r2=arg2.toString().split(".")[1].length}catch(e){r2=0}  
			    m=Math.pow(10,Math.max(r1,r2))  
			    return (arg1*m+arg2*m)/m  
			}

			// 遍历
			var pcr = 0;
			var sum = 0;
			$(':checkbox:checked').each(function(){
				// 获取小计
				pcr = parseFloat($(this).parents('ul').find('.number').text());
				console.log(pcr);
			sum = accAdd(sum,pcr);

			})
			// 选中商品件数
			var nums = $("input[type=checkbox]:checked").length;
				
			$('#J_Total').text(sum);
			// console.log(nums);
			$('#nums').text(nums);
		}
		// 全选
		var i = 0;
		$('.quan').click(function(){
			if(i%2 == 0){
				$('.check').attr('checked',true);
				totals()
				var sums = $('.bundle-main').length;
				// console.log(sums);
				$('#nums').text(sums);
			} else {
				$('.check').attr('checked',false);
				totals()
			}
			
			i++;
		})
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
	
		// 删除数据
		$('.delete').click(function(){
			// 提示信息
			var res = confirm('真的决定要删除宝贝吗？');
			if(!res) return;
			// 将参数发送到控制器中 
			// 获取id
			var gid = $(this).parents('ul').find('.check').attr('gid');
			var rem = $(this);
			// console.log(gid);
			$.post('/home/shopdata',{gid:gid},function(data){
				if(data == 1){
					rem.parents('.bundle-main').remove();
					// 刷新
					nums()
				}
				// console.log(data);
			})
		})
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		// 全部删除
		$('.deleteAll').click(function(){
			// 提示信息
			var res = confirm('真的决定要删除宝贝吗？');
			if(!res) return;
			// 将参数发送到控制器中 
			// 获取id
			var arr = new Array();
			$(':checkbox:checked').each(function(){
				arr.push($(this).parents('ul').find('.check').attr('gid'));
			})
			// var rem = $(this);
				// console.log(rem);
			$.post('/home/shopalldel',{arr:arr},function(data){
				// console.log(data);
				if(data == 1){
					// console.log(12);
					$(':checkbox:checked').parents('.bundle-main').remove();
					// 刷新
					nums()
					}
				})
			
			// $("input[type=checkbox]:checked")
		})
		function nums(){
			// 求购物车中商品的数量
			var rs = $('.bundle-main').length;
			if(rs == 0){
				$('.cart-empty').show();
				$('.shop').hide();
			}
		}
		nums()
	</script>
</html>