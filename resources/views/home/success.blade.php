<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0 ,minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>订单成功</title>

		<link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />

		<link href="/homes/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="/homes/css/cartstyle.css" rel="stylesheet" type="text/css" />

		<link href="/homes/css/jsstyle.css" rel="stylesheet" type="text/css" />
		<link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/homes/css/addstyle.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="/homes/js/address.js"></script>



		<link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
	

		<link href="/homes/css/sustyle.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="/homes/basic/js/jquery-1.7.min.js"></script>

	</head>

	<body>
		
		<div class="hmtop" style="background:#fff">
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

			<div class="take-delivery">
			 <div class="status">
			   <h2>订单成功</h2>
			   <div class="successInfo">
			     <ul>
			     	
			      <!--  <li>付款金额<em>¥</em></li> -->
			      
			       <div class="user-info">
			      
			      
			       
			       </div>
			             请认真核对您的收货信息，如有错误请联系客服
			                               
			     </ul>
			     <div class="option">
			       <span class="info">您可以</span>
			        <a href="/home/order" class="J_MakePoint">查看<span>已买到的宝贝</span></a>
			        <a href="/home/orderdetails" class="J_MakePoint">查看<span>交易详情</span></a>
			     </div>
			    </div>
			  </div>
			</div>
				
				<div class="footer">
					
					<div class="footer-hd">
						
						<p>
							@foreach($fri as $k=>$v)
							<a href="{{$v->url}}">{{$v->fname}}</a>
							<b>|</b>
							@endforeach
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
		</div>
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