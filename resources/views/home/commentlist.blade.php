@extends('layout.home1')
@section('title',$title)
		<meta name="_token" content="{!! csrf_token() !!}">
		<link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/homes/css/appstyle.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="/homes/js/jquery-1.7.2.min.js"></script>
	
@section('content')
			
	<body>
		
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

					<div class="user-comment">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">发表评论</strong> / <small>Make&nbsp;Comments</small></div>
						</div>
						<hr>

						<div class="comment-main">
							@foreach($ord as $v)
							@foreach($gods as $va)
							@foreach($img as $val)
							@if($va->id == $val->gid)
							<div class="comment-list">
								<div class="item-pic">
									<a href="#" class="J_MakePoint">
										<img src="{{$val->gpic}}" class="itempic">
									</a>
								</div>

								<div class="item-title">

									<div class="item-name">
										<a href="#">
											<p class="item-basic-info" title="{{$va->gname}}">{{$va->gname}}</p>
										</a>
									</div>
									<div class="item-info">
										
										<div class="item-price">
											价格：<strong>{{$va->price}}元</strong>
										</div>										
									</div>
								</div>
								<div class="clear"></div>
								<div class="item-comment">
									<textarea class="txt" placeholder="请写下对宝贝的感受吧，对他人帮助很大哦！"></textarea>
									<input type="hidden" name="" id="hid" value="{{$v->gid}}">
									<input type="hidden" name="" id="hids" value="{{$v->id}}">
								</div>
								<!-- <div class="filePic">
									<input type="file" class="inputPic" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*">
									<span>晒照片(0/5)</span>
									<img src="/homes/images/image.jpg" alt="">
								</div> -->
								<div class="item-opinion">
									<li><i class="op1"></i>好评</li>
									<li><i class="op2"></i>中评</li>
									<li><i class="op3"></i>差评</li>
								</div>
							</div>
							@endif
							@endforeach						
							@endforeach						
							@endforeach						
								<div class="info-btn">
									<div class="am-btn am-btn-danger">发表评论</div>
								</div>							
					<script type="text/javascript">
						$(document).ready(function() {
							$(".comment-list .item-opinion li").click(function() {	
								$(this).prevAll().children('i').removeClass("active");
								$(this).nextAll().children('i').removeClass("active");
								$(this).children('i').addClass("active");
								
							});
				     })
					</script>					
					
												
							
					</div>

				</div>
				</div>
				
			</div>
			<aside class="menu" style="margin-left: -100%">
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
								<li> <a href="/home/comment">评价</a></li>
								<li> <a href="news.html">消息</a></li>
							</ul>
						</li>

					</ul>

				</aside>
		</div>
</body>
@endsection
@section('js')
<script type="text/javascript">
	$.ajaxSetup({
   		headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
	});
	$('.am-btn').click(function(){
		var txt = $('.txt').val().trim();
		var ping = $('.item-opinion').find('.active').parent().text().trim();
		if(ping == '差评'){
			ping = 0;
		}else if(ping == '中评'){
			ping = 1;
		}else if(ping == '好评'){
			ping = 2;
		}else{
			ping = 3;
		}
		var gid = $('#hid').val();
		var oid = $('#hids').val();
		if(txt){
			// console.log(ping);
			$.post('/home/commentadd',{content:txt,star:ping,gid:gid,oid:oid},function(data){
				alert('评论成功');window.location.href='/home/order';
			})
		}else{
			alert('评论不能为空');
		}
	})
	
</script>
@stop