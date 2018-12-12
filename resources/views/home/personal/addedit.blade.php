@extends('layout.home')
@section('title',$title)
@section('content')
  <head>
		<meta charset="utf-8">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>地址管理</title>
		<link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/homes/css/addstyle.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="/homes/js/jquery.js"></script>
	</head>

	<body>
		<!--头 -->
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
					
					<div class="user-address">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">地址管理</strong> / <small>Address&nbsp;list</small></div>
						</div>
						<hr/>
						<ul class="am-avg-sm-1 am-avg-md-3 am-thumbnails">
							@php

							$address = DB::table('address')->where('cid',session('cid'))->get();
							
							@endphp

							@foreach($address as $k =>$v)
							
							
								@if($v->status == '0')
								<li class="user-addresslist defaultAddr lis"  aid="{{$v->id}}" >
								<span class="new-option-r" id="dz_{{$v->id}}"><i class="am-icon-check-circle"></i>默认地址</span>
								@else
								<li class="user-addresslist lis"   aid="{{$v->id}}" >
								<span class="new-option-r" id="dz_{{$v->id}}"><i class="am-icon-check-circle"></i>设为默认</span>
								@endif
								<p class="new-tit new-p-re">
									<span class="new-txt">{{$v->name}}</span>
									<span class="new-txt-rd2">{{$v->phone}}</span>
								</p>
								<div class="new-mu_l2a new-p-re">
									<p class="new-mu_l2cw">
										<span class="title">地址：</span>
										<span class="street">{{$v->location}}</span></p>
								</div>

								<div class="new-addr-btn ">
									<a href="/home/personal/addedit/{{$v->id}}"><i class="am-icon-edit"></i>编辑</a>
									<span class="new-addr-bar">|</span>
									<a class="al" aid="{{$v->id}}" href="javascript:void(0);" ><i class="am-icon-trash"></i>删除</a>
								</div>
							</li>

							
							@endforeach

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
						<a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">修改地址</a>
						<!--例子-->
						<div class="am-modal am-modal-no-btn" id="doc-modal-1">

							<div class="add-dress">

								<!--标题 -->
								<div class="am-cf am-padding">
									<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">修改地址</strong> / <small>Update&nbsp;address</small></div>
								</div>
								<hr/>
								
								<div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
									<form action="/home/addupdate/{{$add->id}}" method="post" class="am-form am-form-horizontal">

									    
										<div class="am-form-group">
											<label for="user-name" class="am-form-label">收货人</label>
											<div class="am-form-content">
												<input type="text" id="user-name" placeholder="收货人" name="name"
												value="{{$add->name}}">
											</div>
										</div>

										<div class="am-form-group">
											<label for="user-phone" class="am-form-label">手机号码</label>
											<div class="am-form-content">
												<input id="user-phone" placeholder="手机号必填" type="tel" name="phone" value="{{$add->phone}}">
											</div>
										</div>
										<!-- <div class="am-form-group">
											<label for="user-address" class="am-form-label">所在地</label>
											<div class="am-form-content address">
												<select data-am-selected>
													<option value="a">浙江省</option>
													<option value="b" selected>湖北省</option>
												</select>
												<select data-am-selected>
													<option value="a">温州市</option>
													<option value="b" selected>武汉市</option>
												</select>
												<select data-am-selected>
													<option value="a">瑞安区</option>
													<option value="b" selected>洪山区</option>
												</select>
											</div>
										</div> -->
										 {{csrf_field()}}
										<div class="am-form-group">
											<label for="user-intro" class="am-form-label">详细地址</label>
											<div class="am-form-content">
												<textarea class="" rows="3" id="user-intro" placeholder="输入详细地址" name="location" >{{$add->location}}</textarea>
												<small>100字以内写出你的详细地址...</small>
											</div>
										</div>
										<input type="hidden" value="{{$add->cid}}" name="cid">
										<div class="am-form-group">
											<div class="am-u-sm-9 am-u-sm-push-3">
												
												<button type="submit" class="am-btn am-btn-danger">保存</button>
												
											</div>
										</div>
									</form>
								</div>

							</div>

						</div>

					</div>

					<script type="text/javascript">

					    $.ajaxSetup({
					         headers: {
					             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					         }
					     });
						$(document).ready(function() {

							$(".new-option-r").click(function() {
								$(this).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
                                 
                                
                                 // 获取到当前点击的id
								 var id = $(this).parent().attr('aid');
								 // 进行ajax提交
								 $.post('/home/dostatus',{id:id},function(data){
								 	  
								 	  if(data == id){ 
								 	  	 // 获取标签里面的文本
								 	  	 var ts = $(this).text();
								 	  	 // 将里面的文本重新赋值
								 	  	 var ts = $(this).text('默认地址'); 
								 	  }
								 	  window.location.reload(); 
								 })
							});
							
							var $ww = $(window).width();
							if($ww>640) {
								$("#doc-modal-1").removeClass("am-modal am-modal-no-btn")
							}
							
						});
						
					</script>

					<div class="clear"></div>

				</div>
				<!--底部-->
				
			</div>

			<aside class="menu">
				<ul>
					<li class="person">
						<a href="index.html">个人中心</a>
					</li>
					<li class="person">
						<a href="#">个人资料</a>
						<ul>
							<li> <a href="/home/personal/information">个人信息</a></li>
							<li> <a href="/home/personal/satefy">安全设置</a></li>
							<li class="active"> <a href="/home/personal/address">收货地址</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="#">我的交易</a>
						<ul>
							<li><a href="order.html">订单管理</a></li>
							<li> <a href="change.html">退款售后</a></li>
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