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
		<script src="/homes/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
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
										<span class="street" style="word-wrap:break-word;">{{$v->location}}</span></p>
								</div>

								<div class="new-addr-btn ">
									{{csrf_field()}}
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
						<a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">添加新地址</a>
						<!--例子-->
						<div class="am-modal am-modal-no-btn" id="doc-modal-1">

							<div class="add-dress">

								<!--标题 -->
								<div class="am-cf am-padding">
									<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> / <small>Add&nbsp;address</small></div>
								</div>
								<hr/>
								
								<div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
									<form action="/home/create" method="post" class="am-form am-form-horizontal" id="forms">
									@php
									$customer = DB::table('customer')->where('id',session('cid'))->first();
									
									@endphp
									
										<div class="am-form-group">
											<label for="user-name" class="am-form-label">收货人</label>
											<div class="am-form-content">
												<input type="text" id="user-name" placeholder="" name="name"><span> *请填写收货人</span>
											</div>
										</div>

										<div class="am-form-group">
											<label for="user-phone" class="am-form-label">手机号码</label>
											<div class="am-form-content">
												<input id="user-phone" placeholder="" type="tel" name="phone">
												<span> *请输入手机号</span>
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
												<textarea class="" rows="3" id="user-intro" placeholder="" name="location"></textarea>
												<span>*50字以内写出你的详细地址...</span>
											</div>
										</div>
										<input type="hidden" value="{{$customer->id}}" name="cid">

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

		var US = true;
		var PH = true;
		var LT = true;
		
		//收货人 
		$('input[name=name]').blur(function(){
			//获取输入的值
			var uv = $(this).val().trim();
			if(uv == ''){
				$(this).next().text(' *收货人不能为空').css('color','#e53e41');

				$(this).css('border','solid 1px #e53e41');

				US = false;

				return;
			}

			//正则
			var reg = /^[A-Za-z_\u4e00-\u9fa5]{2,6}$/;
			var tu = $(this);
			//检测
			if(!reg.test(uv)){
				$(this).next().text(' *收货人名称格式不正确').css('color','#e53e41');

				$(this).css('border','solid 1px #e53e41');

				US = false;
			} else {

				$(this).next().text(' *√').css('color','green');

				$(this).css('border','solid 1px green');

				US = true;
			}
				
			
		})
			
		//手机号

		$('input[name=phone]').blur(function(){

			var phv = $(this).val().trim();

			if(phv == ''){

				$(this).next().text(' *手机号不能为空').css('color','#e53e41');
				$(this).css('border','solid 1px #e53e41');

				PH = false;

				return;
			}

			var reg = /^1[3456789]\d{9}$/;

			if(!reg.test(phv)){

				$(this).next().text(' *手机号格式不正确').css('color','#e53e41');
				$(this).css('border','solid 1px #e53e41');

				PH = false;
			} else {

				$(this).next().text(' *√').css('color','green');
				$(this).css('border','solid 1px green');

				PH = true;
			}
		})

		//详细地址 
		$('textarea[name=location]').blur(function(){
			//获取输入的值
			var uv = $(this).val().trim();
			if(uv == ''){
				$(this).next().text(' *地址不能为空').css('color','#e53e41');

				$(this).css('border','solid 1px #e53e41');

				LT = false;

				return;
			}

			//正则
			var reg = /^[A-Za-z_\u4e00-\u9fa5]{5,50}$/;
			var tu = $(this);
			//检测
			if(!reg.test(uv)){
				$(this).next().text(' *地址格式不正确').css('color','#e53e41');

				$(this).css('border','solid 1px #e53e41');

				LT= false;
			} else {

				$(this).next().text(' *√').css('color','green');

				$(this).css('border','solid 1px green');

				LT= true;
			}
				
			
		})

		$('#forms').submit(function(){

			$('input[name=name]').trigger('blur');
			$('input[name=phone]').trigger('blur');
			$('textarea[name=location]').trigger('blur');
			

			if(US && PH && LT){

				return true;
			} 
			
			return false;
		})	
	
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
							<li> <a href="/home/personal/safety">安全设置</a></li>
							<li class="active"> <a href="#">收货地址</a></li>
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