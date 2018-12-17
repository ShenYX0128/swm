<!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title><?php echo e($title); ?></title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />

		<link rel="stylesheet" href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" />
		<link href="/homes/css/dlstyle.css" rel="stylesheet" type="text/css">
	</head>

	<body>
	<?php if(session('error')): ?>
		<script>
			alert("<?php echo e(session('error')); ?>")
		</script>
	<?php endif; ?>
		<div class="login-boxtitle">
			<a href="home.html"><img alt="logo" src="/homes/images/logobig.png" /></a>
		</div>

		<div class="login-banner">
			<div class="login-main">
				<div class="login-banner-bg"><span></span><img src="/homes/images/big.jpg" /></div>
				<div class="login-box">

							<h3 class="title">登录商城</h3>

							<div class="clear"></div>
						
						<div class="login-form">
						  	<form action="/home/dologin" method="post">
							    <div class="user-name">
								    <label for="user"><i class="am-icon-user"></i></label>
								    <input type="text" name="phone" id="user" placeholder="手机/用户名">
                 				</div>
                 				<div class="user-pass">
								    <label for="password"><i class="am-icon-lock"></i></label>
								    <input type="password" name="password" id="password" placeholder="请输入密码">
                 				</div>
              				
           				</div>
            
            <div class="login-links">
                <label for="remember-me"><input id="remember-me" type="checkbox">记住密码</label>
								<a href="#" class="am-fr">忘记密码</a>
								<a href="/home/register" class="zcnext am-fr am-btn-default">注册</a>
								<br />
            </div>
            					<?php echo e(csrf_field()); ?>

								<div class="am-cf">
									<input type="submit" name="" value="登录" class="am-btn am-btn-primary am-btn-sm">
								</div>
					</form>
						<div class="partner">		
								<h3>合作账号</h3>
							<div class="am-btn-group">
								<li><a href="#"><i class="am-icon-qq am-icon-sm"></i><span>QQ登录</span></a></li>
								<li><a href="#"><i class="am-icon-weibo am-icon-sm"></i><span>微博登录</span> </a></li>
								<li><a href="#"><i class="am-icon-weixin am-icon-sm"></i><span>微信登录</span> </a></li>
							</div>
						</div>	

				</div>
			</div>
		</div>
	</body>

</html>