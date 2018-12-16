@extends('layout.home')
@section('title',$title)
		<link rel="stylesheet" type="text/css" href="/homes/adv.css">
		<script type="text/javascript" src="/homes/js/jquery.js"></script>
		<script src="/homes/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/homes/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>
		<script type="text/javascript" src="/homes/js/jquery.SuperSlide2.js"></script>
		<style type="text/css">
			.title{width: 80%; line-height: 28px; overflow: hidden; text-overflow:ellipsis; white-space:nowrap;}
		</style>
@section('content')
			<div class="banner">
                      <!--轮播 -->
						<div class="am-slider am-slider-default scoll" data-am-flexslider id="demo-slider-0">
							<ul class="am-slides">
								@foreach($banner as $k=>$v)
								<li class="banner{{$k+1}}"><a href="introduction.html"><img src="{{$v->src}}" style="width:1010px;height:455px;"></a></li>
								@endforeach
							</ul>
						
						</div>

						<div class="clear"></div>	
			</div>
			<div class="shopNav">
				<div class="slideall">
					
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
		        				
						<!--侧边导航 -->
						<div id="nav" class="navfull">
							<div class="area clearfix">
								<div class="category-content" id="guide_2">
									
									<div class="category">
										<ul class="category-list" id="js_climit_li">
										@foreach($data as $k=>$v)
											<li class="appliance js_toggle relative first">
												<div class="category-info">
													<h3 class="category-name b-category-name"><i>
														<img src="/homes/images/cake.png"></i>
														<a class="ml-22" title="点心" href="/home/list/{{$v->id}}">{{$v->tname}}</a>
													</h3>
													<em>&gt;</em></div>
												<div class="menu-item menu-in top">
													<div class="area-in">
														<div class="area-bg">
															<div class="menu-srot">
															@foreach($v->sub as $kk=>$vv)
																<div class="sort-side" >
																	<dl class="dl-sort">
																		<dt style=""><span title=""><a href="/home/inx/{{$vv->id}}" style="color: #db3e54;">{{$vv->tname}}</a></span></dt>
																			@foreach($vv->sub as $a=>$b)
																			<dd><a title="" href="/home/list/{{$b->id}}"><span>{{$b->tname}}</span></a></dd>
																			@endforeach
																	</dl>
																</div>
															@endforeach
															</div>
														</div>
													</div>
												</div>
											<b class="arrow"></b>	
											</li>
											@endforeach
											<li class="appliance js_toggle relative">
												<div class="category-info">
													<h3 class="category-name b-category-name"><i><img src="/homes/images/meat.png"></i><a class="ml-22" title="熟食、肉类">熟食/肉类</a></h3>
													<em>&gt;</em></div>
												<div class="menu-item menu-in top">
													<div class="area-in">
														<div class="area-bg">
															<div class="menu-srot">
																<div class="sort-side">
																	<dl class="dl-sort">
																		<dt><span title="猪肉脯">猪肉脯</span></dt>
																		<dd><a title="蒸蛋糕" href="#"><span>蒸蛋糕</span></a></dd>
																		<dd><a title="脱水蛋糕" href="#"><span>脱水蛋糕</span></a></dd>
																		<dd><a title="瑞士卷" href="#"><span>瑞士卷</span></a></dd>
																		<dd><a title="软面包" href="#"><span>软面包</span></a></dd>
																		<dd><a title="马卡龙" href="#"><span>马卡龙</span></a></dd>
																	</dl>
																	<dl class="dl-sort">
																		<dt><span title="牛肉丝">牛肉丝</span></dt>
																		<dd><a title="蒸蛋糕" href="#"><span>蒸蛋糕</span></a></dd>
																		<dd><a title="脱水蛋糕" href="#"><span>脱水蛋糕</span></a></dd>
																		<dd><a title="瑞士卷" href="#"><span>瑞士卷</span></a></dd>
																		<dd><a title="软面包" href="#"><span>软面包</span></a></dd>
																		<dd><a title="马卡龙" href="#"><span>马卡龙</span></a></dd>
																	</dl>
																	<dl class="dl-sort">
																		<dt><span title="小香肠">小香肠</span></dt>
																		<dd><a title="蒸蛋糕" href="#"><span>蒸蛋糕</span></a></dd>
																		<dd><a title="脱水蛋糕" href="#"><span>脱水蛋糕</span></a></dd>
																		<dd><a title="瑞士卷" href="#"><span>瑞士卷</span></a></dd>
																		<dd><a title="软面包" href="#"><span>软面包</span></a></dd>
																		<dd><a title="铜锣烧" href="#"><span>铜锣烧</span></a></dd>
																	</dl>
																</div>
																<div class="brand-side">
																	<dl class="dl-sort"><dt><span>实力商家</span></dt>
																		<dd><a rel="nofollow" title="花颜巧语 " target="_blank" href="#" rel="nofollow"><span  class="red" >花颜巧语 </span></a></dd>
																		<dd><a rel="nofollow" title="糖衣小屋" target="_blank" href="#" rel="nofollow"><span >糖衣小屋</span></a></dd>
																		<dd><a rel="nofollow" title="卡拉迪克  " target="_blank" href="#" rel="nofollow"><span  class="red" >卡拉迪克  </span></a></dd>
																		<dd><a rel="nofollow" title="暖春童话 " target="_blank" href="#" rel="nofollow"><span >暖春童话 </span></a></dd>
																		<dd><a rel="nofollow" title="华盛童装批发行 " target="_blank" href="#" rel="nofollow"><span >华盛童装批发行 </span></a></dd>
																		<dd><a rel="nofollow" title="奈仕华童装旗舰店" target="_blank" href="#" rel="nofollow"><span >奈仕华童装旗舰店</span></a></dd>
																		<dd><a rel="nofollow" title="斑蒂尼BONDYNI" target="_blank" href="#" rel="nofollow"><span  class="red" >斑蒂尼BONDYNI</span></a></dd>
																		<dd><a rel="nofollow" title="猫儿朵朵 " target="_blank" href="#" rel="nofollow"><span >猫儿朵朵 </span></a></dd>
																		<dd><a rel="nofollow" title="童衣阁" target="_blank" href="#" rel="nofollow"><span  class="red" >童衣阁</span></a></dd>
																	</dl>
																</div>
															</div>
														</div>
													</div>
												</div>
                                            <b class="arrow"></b>
											</li>
											<li class="appliance js_toggle relative">
												<div class="category-info">
													<h3 class="category-name b-category-name"><i><img src="/homes/images/bamboo.png"></i><a class="ml-22" title="素食、卤味">素食/卤味</a></h3>
													<em>&gt;</em></div>
												<div class="menu-item menu-in top">
													<div class="area-in">
														<div class="area-bg">
															<div class="menu-srot">
																<div class="sort-side">
																	<dl class="dl-sort">
																		<dt><span title="豆干">豆干</span></dt>
																		<dd><a title="蒸蛋糕" href="#"><span>蒸蛋糕</span></a></dd>
																		<dd><a title="脱水蛋糕" href="#"><span>脱水蛋糕</span></a></dd>
																		<dd><a title="瑞士卷" href="#"><span>瑞士卷</span></a></dd>
																		<dd><a title="铜锣烧" href="#"><span>铜锣烧</span></a></dd>
																	</dl>
																	<dl class="dl-sort">
																		<dt><span title="干笋">干笋</span></dt>
																		<dd><a title="蒸蛋糕" href="#"><span>蒸蛋糕</span></a></dd>
																		<dd><a title="脱水蛋糕" href="#"><span>脱水蛋糕</span></a></dd>
																		<dd><a title="瑞士卷" href="#"><span>瑞士卷</span></a></dd>
																		<dd><a title="铜锣烧" href="#"><span>铜锣烧</span></a></dd>
																	</dl>
																	<dl class="dl-sort">
																		<dt><span title="鸭脖">鸭脖</span></dt>
																		<dd><a title="蒸蛋糕" href="#"><span>蒸蛋糕</span></a></dd>
																		<dd><a title="脱水蛋糕" href="#"><span>脱水蛋糕</span></a></dd>
																		<dd><a title="瑞士卷" href="#"><span>瑞士卷</span></a></dd>
																		<dd><a title="软面包" href="#"><span>软面包</span></a></dd>
																		<dd><a title="马卡龙" href="#"><span>马卡龙</span></a></dd>
																		<dd><a title="千层饼" href="#"><span>千层饼</span></a></dd>
																		<dd><a title="甜甜圈" href="#"><span>甜甜圈</span></a></dd>
																		<dd><a title="蒸三明治" href="#"><span>蒸三明治</span></a></dd>
																		<dd><a title="铜锣烧" href="#"><span>铜锣烧</span></a></dd>
																	</dl>
																</div>
																<div class="brand-side">
																	<dl class="dl-sort"><dt><span>实力商家</span></dt>
																		<dd><a rel="nofollow" title="歌芙品牌旗舰店" target="_blank" href="#" rel="nofollow"><span  class="red" >歌芙品牌旗舰店</span></a></dd>
																		<dd><a rel="nofollow" title="爱丝蓝内衣厂" target="_blank" href="#" rel="nofollow"><span >爱丝蓝内衣厂</span></a></dd>
																		<dd><a rel="nofollow" title="香港优蓓尔防辐射" target="_blank" href="#" rel="nofollow"><span >香港优蓓尔防辐射</span></a></dd>
																		<dd><a rel="nofollow" title="蓉莉娜内衣批发" target="_blank" href="#" rel="nofollow"><span >蓉莉娜内衣批发</span></a></dd>
																	</dl>
																</div>
															</div>
														</div>
													</div>
												</div>
                                             <b class="arrow"></b>
											</li>
											<li class="appliance js_toggle relative">
												<div class="category-info">
													<h3 class="category-name b-category-name"><i><img src="/homes/images/nut.png"></i><a class="ml-22" title="坚果、炒货">坚果/炒货</a></h3>
													<em>&gt;</em></div>
												<div class="menu-item menu-in top">
													<div class="area-in">
														<div class="area-bg">
															<div class="menu-srot">
																<div class="sort-side">
																	<dl class="dl-sort">
																		<dt><span title="蛋糕">坚果</span></dt>
																		<dd><a title="蒸蛋糕" href="#"><span>蒸蛋糕</span></a></dd>
																		<dd><a title="脱水蛋糕" href="#"><span>脱水蛋糕</span></a></dd>
																		<dd><a title="瑞士卷" href="#"><span>瑞士卷</span></a></dd>
																		<dd><a title="软面包" href="#"><span>软面包</span></a></dd>
																		<dd><a title="马卡龙" href="#"><span>马卡龙</span></a></dd>
																		<dd><a title="千层饼" href="#"><span>千层饼</span></a></dd>
																		<dd><a title="甜甜圈" href="#"><span>甜甜圈</span></a></dd>
																		<dd><a title="蒸三明治" href="#"><span>蒸三明治</span></a></dd>
																		<dd><a title="铜锣烧" href="#"><span>铜锣烧</span></a></dd>
																	</dl>
																	<dl class="dl-sort">
																		<dt><span title="蛋糕">锅巴</span></dt>
																		<dd><a title="蒸蛋糕" href="#"><span>蒸蛋糕</span></a></dd>
																		<dd><a title="脱水蛋糕" href="#"><span>脱水蛋糕</span></a></dd>
																		<dd><a title="瑞士卷" href="#"><span>瑞士卷</span></a></dd>
																		<dd><a title="软面包" href="#"><span>软面包</span></a></dd>
																		<dd><a title="马卡龙" href="#"><span>马卡龙</span></a></dd>
																		<dd><a title="千层饼" href="#"><span>千层饼</span></a></dd>
																		<dd><a title="甜甜圈" href="#"><span>甜甜圈</span></a></dd>
																		<dd><a title="蒸三明治" href="#"><span>蒸三明治</span></a></dd>
																		<dd><a title="铜锣烧" href="#"><span>铜锣烧</span></a></dd>
																	</dl>
																</div>
																<div class="brand-side">
																	<dl class="dl-sort"><dt><span>实力商家</span></dt>
																		<dd><a rel="nofollow" title="呵呵嘿官方旗舰店" target="_blank" href="#" rel="nofollow"><span  class="red" >呵呵嘿官方旗舰店</span></a></dd>
																		<dd><a rel="nofollow" title="格瑞旗舰店" target="_blank" href="#" rel="nofollow"><span >格瑞旗舰店</span></a></dd>
																		<dd><a rel="nofollow" title="飞彦大厂直供" target="_blank" href="#" rel="nofollow"><span  class="red" >飞彦大厂直供</span></a></dd>
																		<dd><a rel="nofollow" title="红e·艾菲妮" target="_blank" href="#" rel="nofollow"><span >红e·艾菲妮</span></a></dd>
																		<dd><a rel="nofollow" title="本真旗舰店" target="_blank" href="#" rel="nofollow"><span  class="red" >本真旗舰店</span></a></dd>
																		<dd><a rel="nofollow" title="杭派女装批发网" target="_blank" href="#" rel="nofollow"><span  class="red" >杭派女装批发网</span></a></dd>
																		<dd><a rel="nofollow" title="华伊阁旗舰店" target="_blank" href="#" rel="nofollow"><span >华伊阁旗舰店</span></a></dd>
																		<dd><a rel="nofollow" title="独家折扣旗舰店" target="_blank" href="#" rel="nofollow"><span >独家折扣旗舰店</span></a></dd>
																	</dl>
																</div>
															</div>
														</div>
													</div>
												</div>
												<b class="arrow"></b>
											</li>
											<li class="appliance js_toggle relative">
												<div class="category-info">
													<h3 class="category-name b-category-name"><i><img src="/homes/images/candy.png"></i><a class="ml-22" title="糖果、蜜饯">糖果/蜜饯</a></h3>
													<em>&gt;</em></div>
												<div class="menu-item menu-in top">
													<div class="area-in">
														<div class="area-bg">
															<div class="menu-srot">
																<div class="sort-side">
																	<dl class="dl-sort">
																		<dt><span title="糖果">糖果</span></dt>
																		<dd><a title="蒸蛋糕" href="#"><span>蒸蛋糕</span></a></dd>
																		<dd><a title="脱水蛋糕" href="#"><span>脱水蛋糕</span></a></dd>
																		<dd><a title="瑞士卷" href="#"><span>瑞士卷</span></a></dd>
																		<dd><a title="软面包" href="#"><span>软面包</span></a></dd>
																		<dd><a title="马卡龙" href="#"><span>马卡龙</span></a></dd>
																		<dd><a title="千层饼" href="#"><span>千层饼</span></a></dd>
																		<dd><a title="甜甜圈" href="#"><span>甜甜圈</span></a></dd>
																		<dd><a title="蒸三明治" href="#"><span>蒸三明治</span></a></dd>
																		<dd><a title="铜锣烧" href="#"><span>铜锣烧</span></a></dd>
																	</dl>
																	<dl class="dl-sort">
																		<dt><span title="蜜饯">蜜饯</span></dt>
																		<dd><a title="猕猴桃干" href="#"><span>猕猴桃干</span></a></dd>
																		<dd><a title="糖樱桃" href="#"><span>糖樱桃</span></a></dd>
																		<dd><a title="瑞士卷" href="#"><span>瑞士卷</span></a></dd>
																		<dd><a title="软面包" href="#"><span>软面包</span></a></dd>
																		<dd><a title="马卡龙" href="#"><span>马卡龙</span></a></dd>
																		<dd><a title="千层饼" href="#"><span>千层饼</span></a></dd>
																		<dd><a title="甜甜圈" href="#"><span>甜甜圈</span></a></dd>
																		<dd><a title="蒸三明治" href="#"><span>蒸三明治</span></a></dd>
																		<dd><a title="铜锣烧" href="#"><span>铜锣烧</span></a></dd>
																	</dl>
																</div>
																<div class="brand-side">
																	<dl class="dl-sort"><dt><span>实力商家</span></dt>
																		<dd><a rel="nofollow" title="YYKCLOT" target="_blank" href="#" rel="nofollow"><span  class ="red" >YYKCLOT</span></a></dd>
																		<dd><a rel="nofollow" title="池氏品牌男装" target="_blank" href="#" rel="nofollow"><span  class ="red" >池氏品牌男装</span></a></dd>
																		<dd><a rel="nofollow" title="男装日志" target="_blank" href="#" rel="nofollow"><span >男装日志</span></a></dd>
																		<dd><a rel="nofollow" title="索比诺官方旗舰店" target="_blank" href="#" rel="nofollow"><span >索比诺官方旗舰店</span></a></dd>
																		<dd><a rel="nofollow" title="onTTno傲徒" target="_blank" href="#" rel="nofollow"><span  class ="red" >onTTno傲徒</span></a></dd>
																		<dd><a rel="nofollow" title="卡斯郎世家批发城" target="_blank" href="#" rel="nofollow"><span  class ="red" >卡斯郎世家批发城</span></a></dd>
																	</dl>
																</div>
															</div>
														</div>
													</div>
												</div>
                                            <b class="arrow"></b>
											</li>
											<li class="appliance js_toggle relative">
												<div class="category-info">
													<h3 class="category-name b-category-name"><i><img src="/homes/images/chocolate.png"></i><a class="ml-22" title="巧克力">巧克力</a></h3>
													<em>&gt;</em></div>
												<div class="menu-item menu-in top">
													<div class="area-in">
														<div class="area-bg">
															<div class="menu-srot">
																<div class="sort-side">
																	<dl class="dl-sort">
																		<dt><span title="蛋糕">巧克力</span></dt>
																		<dd><a title="蒸蛋糕" href="#"><span>蒸蛋糕</span></a></dd>
																		<dd><a title="脱水蛋糕" href="#"><span>脱水蛋糕</span></a></dd>
																		<dd><a title="瑞士卷" href="#"><span>瑞士卷</span></a></dd>
																		<dd><a title="软面包" href="#"><span>软面包</span></a></dd>
																		<dd><a title="马卡龙" href="#"><span>马卡龙</span></a></dd>
																		<dd><a title="千层饼" href="#"><span>千层饼</span></a></dd>
																		<dd><a title="甜甜圈" href="#"><span>甜甜圈</span></a></dd>
																		<dd><a title="蒸三明治" href="#"><span>蒸三明治</span></a></dd>
																		<dd><a title="铜锣烧" href="#"><span>铜锣烧</span></a></dd>
																	</dl>
																	<dl class="dl-sort">
																		<dt><span title="蛋糕">果冻</span></dt>
																		<dd><a title="蒸蛋糕" href="#"><span>蒸蛋糕</span></a></dd>
																		<dd><a title="脱水蛋糕" href="#"><span>脱水蛋糕</span></a></dd>
																		<dd><a title="瑞士卷" href="#"><span>瑞士卷</span></a></dd>
																		<dd><a title="软面包" href="#"><span>软面包</span></a></dd>
																		<dd><a title="马卡龙" href="#"><span>马卡龙</span></a></dd>
																		<dd><a title="千层饼" href="#"><span>千层饼</span></a></dd>
																		<dd><a title="甜甜圈" href="#"><span>甜甜圈</span></a></dd>
																		<dd><a title="蒸三明治" href="#"><span>蒸三明治</span></a></dd>
																		<dd><a title="铜锣烧" href="#"><span>铜锣烧</span></a></dd>
																	</dl>
																</div>
																<div class="brand-side">
																	<dl class="dl-sort"><dt><span>实力商家</span></dt>
																		<dd><a rel="nofollow" title="花颜巧语 " target="_blank" href="#" rel="nofollow"><span  class="red" >花颜巧语 </span></a></dd>
																		<dd><a rel="nofollow" title="糖衣小屋" target="_blank" href="#" rel="nofollow"><span >糖衣小屋</span></a></dd>
																		<dd><a rel="nofollow" title="卡拉迪克  " target="_blank" href="#" rel="nofollow"><span  class="red" >卡拉迪克  </span></a></dd>
																		<dd><a rel="nofollow" title="暖春童话 " target="_blank" href="#" rel="nofollow"><span >暖春童话 </span></a></dd>
																		<dd><a rel="nofollow" title="华盛童装批发行 " target="_blank" href="#" rel="nofollow"><span >华盛童装批发行 </span></a></dd>
																		<dd><a rel="nofollow" title="奈仕华童装旗舰店" target="_blank" href="#" rel="nofollow"><span >奈仕华童装旗舰店</span></a></dd>
																		<dd><a rel="nofollow" title="斑蒂尼BONDYNI" target="_blank" href="#" rel="nofollow"><span  class="red" >斑蒂尼BONDYNI</span></a></dd>
																		<dd><a rel="nofollow" title="童衣阁" target="_blank" href="#" rel="nofollow"><span  class="red" >童衣阁</span></a></dd>
																	</dl>
																</div>
															</div>
														</div>
													</div>
												</div>
												<b class="arrow"></b>
											</li>
											
										
										</ul>
									</div>
								</div>

							</div>
						</div>
						
						
						<!--轮播-->
						
						<script type="text/javascript">
							(function() {
								$('.am-slider').flexslider();
							});
							$(document).ready(function() {
								$("li").hover(function() {
									$(".category-content .category-list li.first .menu-in").css("display", "none");
									$(".category-content .category-list li.first").removeClass("hover");
									$(this).addClass("hover");
									$(this).children("div.menu-in").css("display", "block")
								}, function() {
									$(this).removeClass("hover")
									$(this).children("div.menu-in").css("display", "none")
								});
							})
						</script>



					<!--小导航 -->
					<div class="am-g am-g-fixed smallnav">
						<div class="am-u-sm-3">
							<a href="sort.html"><img src="/homes/images/navsmall.jpg" />
								<div class="title">商品分类</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="/homes/images/huismall.jpg" />
								<div class="title">大聚惠</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="/homes/images/mansmall.jpg" />
								<div class="title">个人中心</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="/homes/images/moneysmall.jpg" />
								<div class="title">投资理财</div>
							</a>
						</div>
					</div>

					<!--走马灯 -->

					<div class="marqueen">
						<span class="marqueen-title">商城头条</span>
						<div class="demo">

							<ul>
								<li class="title-first"><a target="_blank" href="#">
									<img src="/homes/images/TJ2.jpg"></img>
									<span>[特惠]</span>商城爆品1分秒								
								</a></li>
								<li class="title-first"><a target="_blank" href="#">
									<span>[公告]</span>商城与广州市签署战略合作协议
								     <img src="/homes/images/TJ.jpg"></img>
								     <p>XXXXXXXXXXXXXXXXXX</p>
							    </a></li>
						@php
						$customer = DB::table('customer')->where('id',session('cid'))->first();
						@endphp

						@if(session('cid'))
						<div class="mod-vip">
							<div class="m-baseinfo">
								@if(!$customer->profile)
									<a href="#">
									<img src="/homes/images/getAvatar.do.jpg">
									</a>
								@else
									<a href="#">
										<img src="{{$customer->profile}}">
									</a>
								@endif
								<em>
									Hi,<span class="s-name">{{$customer->customername}}</span>
									<a href="#"><p>点击更多优惠活动</p></a>									
								</em>
							</div>
							<div class="member-logout">
								<a class="am-btn-warning btn" href="/home/personal/information">个人中心</a>
								<a class="am-btn-warning btn" href="/home/logout">退出登录</a>
							</div>
							<div class="member-login">
								<a href="#"><strong>0</strong>待收货</a>
								<a href="#"><strong>0</strong>待发货</a>
								<a href="#"><strong>0</strong>待付款</a>
								<a href="#"><strong>0</strong>待评价</a>
							</div>
							<div class="clear"></div>	
						</div>
						@else	    
						<div class="mod-vip">
							<div class="m-baseinfo">
								<a href="#">
									<img src="/homes/images/getAvatar.do.jpg">
								</a>
								<em>
									Hi,<span class="s-name">小叮当</span>
									<a href="#"><p>点击更多优惠活动</p></a>									
								</em>
							</div>
							<div class="member-logout">
								<a class="am-btn-warning btn" href="/home/login">登录</a>
								<a class="am-btn-warning btn" href="/home/register">注册</a>
							</div>
							<div class="member-login">
								<a href="#"><strong>0</strong>待收货</a>
								<a href="#"><strong>0</strong>待发货</a>
								<a href="#"><strong>0</strong>待付款</a>
								<a href="#"><strong>0</strong>待评价</a>
							</div>
							<div class="clear"></div>	
						</div>													
						@endif			    
							    
								<li><a target="_blank" href="#"><span>[特惠]</span>洋河年末大促，低至两件五折</a></li>
								<li><a target="_blank" href="#"><span>[公告]</span>华北、华中部分地区配送延迟</a></li>
								<li><a target="_blank" href="#"><span>[特惠]</span>家电狂欢千亿礼券 买1送1！</a></li>
								
							</ul>
                        <div class="advTip"><img src="/homes/images/advTip.jpg"/></div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<script type="text/javascript">
					if ($(window).width() < 640) {
						function autoScroll(obj) {
							$(obj).find("ul").animate({
								marginTop: "-39px"
							}, 500, function() {
								$(this).css({
									marginTop: "0px"
								}).find("li:first").appendTo(this);
							})
						}
						$(function() {
							setInterval('autoScroll(".demo")', 3000);
						})
					}
				</script>
			</div>
			<div class="shopMainbg">
				<div class="shopMain" id="shopmain">

					<!--今日推荐 -->

					<div class="am-g am-g-fixed recommendation">
						<div class="clock am-u-sm-3" ">
							<img src="/homes/images/2016.png "></img>
							<p>今日<br>推荐</p>
						</div>
						<div class="am-u-sm-4 am-u-lg-3 ">
							<div class="info ">
								<h3>真的有鱼</h3>
								<h4>开年福利篇</h4>
							</div>
							<div class="recommendationMain one">
								<a href="introduction.html"><img src="/homes/images/tj.png "></img></a>
							</div>
						</div>						
						<div class="am-u-sm-4 am-u-lg-3 ">
							<div class="info ">
								<h3>囤货过冬</h3>
								<h4>让爱早回家</h4>
							</div>
							<div class="recommendationMain two">
								<img src="/homes/images/tj1.png "></img>
							</div>
						</div>
						<div class="am-u-sm-4 am-u-lg-3 ">
							<div class="info ">
								<h3>浪漫情人节</h3>
								<h4>甜甜蜜蜜</h4>
							</div>
							<div class="recommendationMain three">
								<img src="/homes/images/tj2.png "></img>
							</div>
						</div>

					</div>
					<div class="clear "></div>
					<!--热门活动 -->

					<div class="am-container activity ">
						<div class="shopTitle ">
							<h4>活动</h4>
							<h3>每期活动 优惠享不停 </h3>
							<span class="more ">
                              <a href="# ">全部活动<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                        </span>
						</div>
						<div id="friends">
						    <div class="mr_frbox">
						        <div class="mr_frBtnL prev">
						        	<img src="/homes/images/mfrl.gif" style="width: 14px;" />
						        </div>
    							<div class="am-g am-g-fixed" id="adv1" style="overflow: hidden;">
    							<ul id="mr_fu">
						    	@foreach($adv as $k => $v)
									<li class="am-u-sm-3 adv_child" style="overflow:hidden;position:relative; left: 15px; margin-left: 3px;" >
										<!-- <div class="icon-sale one "></div>	
											<h4>秒杀</h4>	 -->						
										<div class="activityMain ">
											<img src="{{$v->src}}" width="100%"></img>
										</div>
										<div class="info ">
											<h3>{{$v->content}}</h3>
										</div>
									</li>							
								@endforeach
								</ul>	
								</div>	
						        
						        <div class="mr_frBtnR next">
						        	<img src="/homes/images/mfrr.gif" style="width: 14px;" />
						        </div>
						    </div>
						</div>
							  
                    </div>
					<div class="clear "></div>
					<script type="text/javascript">
						$(document).ready(function () {
	
							/* 图片滚动效果 */
							$(".mr_frbox").slide({
								titCell: "",
								mainCell: "#adv1 ul",
								autoPage: true,
								effect: "leftLoop",
								autoPlay: true,
								vis: 4
							});
						});
					</script>
					@foreach($type as $k => $v)
					@foreach($array as $n)
					@if($v->id == $n)
                    <div id="f{{$v->id}}">
					<!--甜点-->
					
					<div class="am-container ">
						<div class="shopTitle ">
							<h4>{{$v->tname}}</h4>
							<div class="today-brands ">
								@foreach($arr as $ke =>$va )
									@if($v->id == $va->pid)
										<a href="# ">{{$va->tname}}</a>
									@endif
								@endforeach
							</div>
							<span class="more ">
                    <a href="# ">更多美味<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                        </span>
						</div>
					</div>
					
					<div class="am-g am-g-fixed floodFour">

						<div class="am-u-sm-5 am-u-md-4 text-one list ">
							<div class="word">
								@foreach($arr as $ke =>$va )
									@if($v->id == $va->pid)
									<a class="outer" href="#"><span class="inner"><b class="text">{{$va->tname}}</b></span></a>	
									@endif
								@endforeach					
							</div>
						
							<div class="triangle-topright"></div>						
						</div> 
						@foreach($gods[$n] as $key => $val)
						@if($v->id == $val->pid)
						@if($key == 0)
						<div class="am-u-sm-7 am-u-md-4 text-two sug">
						@foreach($img as $vlu)
								@if($vlu->gid == $val->id)
								<a href="http://g-mall.cn/home/detail/{{$val->id}}"><img src="{{$vlu->gpic}}" width="180" height="180" /></a>
								@endif						
						@endforeach
								<div class="outer-con ">
									<div class="title " title="{{$val->gname}}">
										{{$val->gname}}
									</div>									
									<div class="sub-title ">
										{{$val->price}}
									</div>
									<a href="http://g-mall.cn/home/detail/{{$val->id}}"><i class="am-icon-shopping-basket am-icon-md  seprate"></i></a>
								</div>
							</div>
						@elseif($key == 1)
						<div class="am-u-sm-7 am-u-md-4 text-two">
						@foreach($img as $vlu)
								@if($vlu->gid == $val->id)
								<a href="http://g-mall.cn/home/detail/{{$val->id}}"><img src="{{$vlu->gpic}}" width="180" height="180" /></a>
								@endif						
						@endforeach
								<div class="outer-con ">
									<div class="title " title="{{$val->gname}}">
										{{$val->gname}}
									</div>
									<div class="sub-title ">
										{{$val->price}}
									</div>
									<a href="http://g-mall.cn/home/detail/{{$val->id}}"><i class="am-icon-shopping-basket am-icon-md  seprate"></i></a>
								</div>
							</div>
						@elseif($key == 2)
						<div class="am-u-sm-3 am-u-md-2 text-three big">
						@foreach($img as $vlu)
							@if($vlu->gid == $val->id)
								<a href="http://g-mall.cn/home/detail/{{$val->id}}"><img src="{{$vlu->gpic}}" width="180" height="180" /></a>
								@endif						
						@endforeach
							<div class="outer-con ">
								<div class="title " title="{{$val->gname}}">
									{{$val->gname}}
								</div>
								<div class="sub-title ">
									{{$val->price}}
								</div>
								<a href="http://g-mall.cn/home/detail/{{$val->id}}"><i class="am-icon-shopping-basket am-icon-md  seprate"></i></a>
							</div>
						</div>		
						@elseif($key == 3)	
						<div class="am-u-sm-3 am-u-md-2 text-three sug">
						@foreach($img as $vlu)
							@if($vlu->gid == $val->id)
								<a href="http://g-mall.cn/home/detail/{{$val->id}}"><img src="{{$vlu->gpic}}" width="180" height="180" /></a>
								@endif						
						@endforeach
							<div class="outer-con ">
								<div class="title " title="{{$val->gname}}">
									{{$val->gname}}
								</div>
								<div class="sub-title ">
									{{$val->price}}
								</div>
								<a href="http://g-mall.cn/home/detail/{{$val->id}}"><i class="am-icon-shopping-basket am-icon-md  seprate"></i></a>
							</div>
						</div>	
						@elseif($key == 4)
						<div class="am-u-sm-3 am-u-md-2 text-three ">
						@foreach($img as $vlu)
							@if($vlu->gid == $val->id)
								<a href="http://g-mall.cn/home/detail/{{$val->id}}"><img src="{{$vlu->gpic}}" width="180" height="180" /></a>
								@endif						
						@endforeach
							<div class="outer-con ">
								<div class="title " title="{{$val->gname}}">
									{{$val->gname}}
								</div>
								<div class="sub-title ">
									{{$val->price}}
								</div>
								<a href="http://g-mall.cn/home/detail/{{$val->id}}"><i class="am-icon-shopping-basket am-icon-md  seprate"></i></a>
							</div>
						</div>	
						@elseif($key == 5)
						<div class="am-u-sm-3 am-u-md-2 text-three last big ">
							<div class="outer-con ">
								<div class="title " title="{{$val->gname}}">
									{{$val->gname}}
								</div>
								<div class="sub-title ">
									{{$val->price}}
								</div>
								<a href="http://g-mall.cn/home/detail/{{$val->id}}"><i class="am-icon-shopping-basket am-icon-md  seprate"></i></a>
							</div>
						@foreach($img as $vlu)
							@if($vlu->gid == $val->id)
								<a href="http://g-mall.cn/home/detail/{{$val->id}}"><img src="{{$vlu->gpic}}" width="180" height="180" /></a>
								@endif						
						@endforeach
						</div>	
						@endif
						@endif
					@endforeach
                 <div class="clear "></div>  
                 </div>
                 @endif
				 @endforeach
                 @endforeach
@stop
@section('js')
<script type="text/javascript">
	
</script>
@stop
