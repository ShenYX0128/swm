<!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title>{{$title}}</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />

		<link rel="stylesheet" href="/homes/AmazeUI-2.4.2/assets/css/amazeui.min.css" />
		<link href="/homes/css/dlstyle.css" rel="stylesheet" type="text/css">
		<script src="/homes/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/homes/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>

	</head>

	<body>

		<div class="login-boxtitle">
			<a href="home/demo.html"><img alt="" src="/homes/images/logobig.png" /></a>
		</div>

		<div class="res-banner">
			<div class="res-main">
				<div class="login-banner-bg"><span></span><img src="/homes/images/big.jpg" /></div>
				<div class="login-box">

						<div class="am-tabs" id="doc-my-tabs">
							<ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
								<!-- <li class="am-active"><a href="">邮箱注册</a></li> -->
								<li><a href="">手机号注册</a></li>
							</ul>

							 <!-- <div class="am-tabs-bd">
							 <div class="am-tab-panel am-active">
							  <form action="" method="post">
							  <div class="user-email">
							  	<label for="user"><i class="am-icon-user"></i></label>
							  	<input type="text" name="username" id="email" placeholder="请输入6-12位用户名">
							  </div>			
							 						<div class="user-email">
							  	<label for="email"><i class="am-icon-envelope-o"></i></label>
							  	<input type="email" name="email" id="email" placeholder="请输入邮箱">
							 						</div>										
							  						         
							 							<div class="user-pass">
							      <label for="password"><i class="am-icon-lock"></i></label>
							      <input type="password" name="password" id="password" placeholder="设置6-12位密码">
							 							</div>	         			
							  							               
							  {{csrf_field()}}
							  <div class="am-cf">
							  	<input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
							  </div>
							  </form>
							 </div>  -->

							<div class="am-tab-panel">
								<!-- 手机注册 -->
							<form action="/home/doregister" method="post" id="forms">
                 				<div class="user-phone">
								    <label for="phone"><i class="am-icon-mobile-phone am-icon-md"></i></label>
								    <input type="tel" name="phone" id="phone" placeholder="请输入手机号">
                 			    </div>																			
								<div class="verification">
									<label for="code"><i class="am-icon-code-fork"></i></label>
									<input type="text" name="code" id="code" placeholder="请输入验证码" style="width: 200px;">
									<input id='but' type="button" value='验证码'style="width:95px;text-align:center;padding-left:10px;" >
								</div>

                 				<div class="user-pass">
								    <label for="password"><i class="am-icon-lock"></i></label>
								    <span></span>
								    <input type="password" name="password" id="password" placeholder="设置6-12位密码">
                 				</div>	
								{{csrf_field()}}
								<a href="/home/login" class="zcnext am-fr am-btn-default">登录</a>
									<div class="am-cf">
										<input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
									</div>
							</form>
							
						</div>
							 						
	<script>
        $.ajaxSetup({
	       headers: {
	           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	       }
        });
		$(function() {
	    $('#doc-my-tabs').tabs();
	    })


		
		var PH = true;
		var CV = true;
		var PS = true;

		//手机号
		$('input[name=phone]').focus(function(){
			$(this).addClass('cur');
		})

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
			$.post('/home/checkphone',{number:phone},function(data){

				
			})

		})

		/*var but = document.getElementById('but');
			var i = 20;
			var bu = setInterval(function(){
				i--;
				but.innerHTML = ''+i+'秒';
				console.log(but.innerHTML); 
			},1000)
			setTimeout(function(){
				clearInterval(bu);
				but.disabled = '';
				but.innerHTML = '验证码';
			},20000)*/

		//获取验证码
		$('input[name=code]').focus(function(){
			$(this).addClass('cur');
		})

		$('input[name=code]').blur(function(){
			///获取验证码
			var cd = $(this).val().trim();

			if(cd == ''){
				//$(this).next().text(' *验证码不能为空').css('color','#e53e41');

				$(this).css('border','solid 1px #e53e41');

				CV = false;
				return;
			}

			var cs = $(this);
			//发送ajax
			$.get('/home/checkcode',{code:cd},function(data){

				if(data == '0'){

					cs.next().text(' *验证码不正确').css('color','#e53e41');

					cs.css('border','solid 1px #e53e41');

					CV = false;
				} else {

					cs.next().text(' *√').css('color','green');

					cs.css('border','solid 1px green');

					CV = true;
				}
			})

		})

		//密码
		$('input[name=password]').focus(function(){
			$(this).addClass('cur');
		})
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

		$('#forms').submit(function(){

			$('input[name=code]').trigger('blur');
			$('input[name=phone]').trigger('blur');
			$('input[name=password]').trigger('blur');
			

			if(PS && PH && CV){

				return true;
			} 
			
			return false;
		})
	</script>
                        	
			</div>
		   </div>
					

				</div>
			</div>
			
	</body>

</html>