@extends('layout.home')
@section('title',$title)
@section('content')
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>修改密码</title>

		<link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/homes/css/stepstyle.css" rel="stylesheet" type="text/css">

		<script type="text/javascript" src="/homes/js/jquery-1.7.2.min.js"></script>
		<script src="/homes/AmazeUI-2.4.2/assets/js/amazeui.js"></script>

	</head>

	<body>
		<!--头 -->
            <div class="nav-table">
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="/">首页</a></li>
							</ul>
						</div>
			</div>
			<b class="line"></b>
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">修改密码</strong> / <small>Password</small></div>
					</div>
					<hr/>
					<!--进度条-->
					<div class="m-progress">
						<div class="m-progress-list">
							<span class="step-1 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                <p class="stage-name">重置密码</p>
                            </span>
							<span class="step-2 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">2<em class="bg"></em></i>
                                <p class="stage-name">完成</p>
                            </span>
							<span class="u-progress-placeholder"></span>
						</div>
						<div class="u-progress-bar total-steps-2">
							<div class="u-progress-bar-inner"></div>
						</div>
					</div>
					@php
					$customer = DB::table('customer')->where('id',session('cid'))->first();
					
					@endphp
					<form action="/home/changepassword/{{$customer->id}}" method="post" class="am-form am-form-horizontal" id="forms">
						<div class="am-form-group" style="width: 386px;">
							<label for="user-old-password" class="am-form-label">手机号</label>
							<div class="am-form-content">
								<input type="text" name="phone" id="user-phone"><span> *请输入手机号</span>
							</div>
						</div>
						<div class="am-form-group" style="width: 312px;margin-bottom: 0px;">
							<label for="user-old-password" class="am-form-label">验证码</label>
							<div class="am-form-content">
								<input type="text" name="code" id="user-phone" >
							</div>
							<input type="button" id='but' value="获取验证码" style="position: relative; left:303px;top:-32px;height: 32px; background:#dd514c; color:#fff;    border-color: #dd514c;font-size:12px;padding-left:10px;padding-right:10px;">
							<span class="sp"> *请输入验证码</span>
						</div>
							<script type="text/javascript">
								$('#but').click(function(){
									var t = 60;
									var into = null;
									var but = $(this);
									into = setInterval(function(){
										but.attr('disabled',true);
										but.val(t);
										but.css('cursor','not-allowed');
										t--;
										if (t==0) {
											but.val('验证码');
											but.attr('disabled',false);
											but.css('cursor','pointer');
											clearInterval(into);
										};
									},1000)
								})
				        	</script>
						<div class="am-form-group" style="width: 386px;">
							<label for="user-new-password" class="am-form-label">新密码</label>
							<div class="am-form-content">
								<input type="password" name="password" id="user-new-password" ><span> *请输入6~12位密码</span>
							</div>
						</div>
						<div class="am-form-group" style="width: 386px;">
							<label for="user-confirm-password" class="am-form-label">确认密码</label>
							<div class="am-form-content">
								<input type="password" name="repassword" id="user-confirm-password" ><span> *再次输入密码</span>
							</div>
						</div>
						<!-- <input type="hidden" value="{{$customer->id}}" name="id"> -->
						{{csrf_field()}}
						<div class="info-btn">
							<button class="am-btn am-btn-danger">保存修改</button>
						</div>

					</form>

				</div>
				<!--底部-->
			</div>
	<script>
		$.ajaxSetup({
       		headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       	}
    	});
		
		var PS = true;
		var RPS = true;
		var PH = true;
		var CV = true;
	    
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

		//获取验证码
		$('#but').click(function(){
			//获取手机号
			var phone = $('input[name=phone]').val().trim();

			//发送ajax
			$.post('/home/getphone',{number:phone},function(data){

				console.log(data);
			})

		})


		//获取验证码
		$('input[name=code]').focus(function(){
			$(this).addClass('cur');
		})

		$('input[name=code]').blur(function(){
			///获取验证码
			var cd = $(this).val().trim();

			if(cd == ''){
				$(this).parents('.am-form-group').find('.sp').text(' *验证码不能为空').css('color','#e53e41');

				$(this).css('border','solid 1px #e53e41');

				CV = false;
				return;
			}

			var cs = $(this);
			//发送ajax
			$.get('/home/getcode',{code:cd},function(data){

				if(data == 0){

					cs.parents('.am-form-group').find('.sp').text(' *验证码不正确').css('color','#e53e41');

					cs.css('border','solid 1px #e53e41');

					CV = false;
				} else {

					cs.parents('.am-form-group').find('.sp').text(' *√').css('color','green');

					cs.css('border','solid 1px green');

					CV = true;
				}
			})

		})

		//密码
		//失去焦点
		$('input[name=password]').blur(function(){
			var pv = $(this).val();

			if(pv == ''){

				$(this).next().text(' *密码不能为空').css('color','#e53e41');
				$(this).css('border','solid 1px #e53e41');

				PS = false;

				return;
			}

			var reg = /^\S{6,12}$/;

			if(!reg.test(pv)){

				$(this).next().text(' *密码格式不正确').css('color','#e53e41');
				$(this).css('border','solid 1px #e53e41');

				PS = false;
			} else {

				$(this).next().text(' *√').css('color','green');
				$(this).css('border','solid 1px green');
				PS = true;
			}
		})

		//确认密码
		//失去焦点
		$('input[name=repassword]').blur(function(){
			
			//获取密码
			var pvs = $('input[name=password]').val().trim();

			//获取确认密码
			var rpv = $(this).val().trim();

			if(rpv == ''){

				$(this).next().text(' *确认密码不能为空').css('color','#e53e41');
				$(this).css('border','solid 1px #e53e41');

				RPS = false;

				return;
			}

			if(pvs != rpv){

				$(this).next().text(' *两次密码不一致').css('color','#e53e41');
				$(this).css('border','solid 1px #e53e41');

				RPS = false;
			} else {

				$(this).next().text(' *√').css('color','green');
				$(this).css('border','solid 1px green');
				RPS = true;
			}
		})

		$('#forms').submit(function(){

			$('input[name=code]').trigger('blur');
			$('input[name=phone]').trigger('blur');
			$('input[name=repassword]').trigger('blur');
			$('input[name=password]').trigger('blur');
			

			if(PS && RPS && PH && CV){

				return true;
			} 
			//var flag = 1   var flag = 0
			return false;
		})
	</script>

			
		</div>

	</body>
@endsection