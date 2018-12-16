@extends('layout.home1')
@section('title',$title)
		<meta name="_token" content="{!! csrf_token() !!}">
		<link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/homes/css/cmstyle.css" rel="stylesheet" type="text/css">

		<script src="/homes/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/homes/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
	
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
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">评价管理</strong> / <small>Manage&nbsp;Comment</small></div>
						</div>
						<hr>

						<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs="">

							<ul class="am-avg-sm-2 am-tabs-nav am-nav am-nav-tabs">
								<li class="am-active"><a href="#tab1">所有评价</a></li>
								<li class=""><a href="#tab2">有图评价</a></li>

							</ul>

							<div class="am-tabs-bd" style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
								<div class="am-tab-panel am-fade am-active am-in" id="tab1">

									<div class="comment-main">
										<div class="comment-list">
												
												<div class="comment-top">
													<div class="th th-price">
														评价
													</div>
													<div class="th th-item">
														商品
													</div>													
												</div>
											@foreach($com as $v)
											@foreach($img as $val)
											@if($val->gid == $v->gid)
											<ul class="item-list">
												<div class="comment-top"></div>
												<li class="td td-item">
													<div class="item-pic">
														<a href="#" class="J_MakePoint">
															<img src="{{$val->gpic}}" class="itempic">
														</a>
													</div>
												</li>

												<li class="td td-comment">
													<div class="item-title" style="width: 40%; margin-right: 5%">
														<div class="item-opinion"></div>
														<div class="item-name">
															<a href="#">
																<p class="item-basic-info">{{$val->gname}}</p>
															</a>
														</div>
													</div>
													<div class="item-comment">
														{{$v->content}}
													</div>

													<div class="item-info">
														<div>
															<p class="info-time">{{date('Y-m-d H:i:s',$v->addtime)}}</p>

														</div>
													</div>
												</li>

											</ul>
											@endif
											@endforeach
											@endforeach
										</div>
									</div>

								</div>
								<div class="am-tab-panel am-fade" id="tab2">
									
									<div class="comment-main">
										<div class="comment-list">
											<ul class="item-list">
												
												
												<div class="comment-top">
													<div class="th th-price">
														评价
													</div>
													<div class="th th-item">
														商品
													</div>													
												</div>
												<li class="td td-item">
													<div class="item-pic">
														<a href="#" class="J_MakePoint">
															<img src="../images/kouhong.jpg_80x80.jpg" class="itempic">
														</a>
													</div>
												</li>											
												
												<li class="td td-comment">
													<div class="item-title">
														<div class="item-opinion">好评</div>
														<div class="item-name">
															<a href="#">
																<p class="item-basic-info">美康粉黛醉美唇膏 持久保湿滋润防水不掉色</p>
															</a>
														</div>
													</div>
													<div class="item-comment">
														宝贝非常漂亮，超级喜欢！！！ 口红颜色很正呐，还有第两支半价，买三支免单一支的活动，下次还要来买。就是物流太慢了，还要我自己去取快递，店家不考虑换个物流么？
													<div class="filePic"><img src="../images/image.jpg" alt=""></div>	
													</div>

													<div class="item-info">
														<div>
															<p class="info-little"><span>颜色：12#玛瑙</span> <span>包装：裸装</span> </p>
															<p class="info-time">2015-12-24</p>

														</div>
													</div>
												</li>

											</ul>

										</div>
									</div>									
									
								</div>
							</div>
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
								<li> <a href="comment.html">评价</a></li>
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