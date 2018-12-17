@extends('layout.home')
@section('title',$title)
		<meta name="_token" content="{!! csrf_token() !!}">
		<link type="text/css" href="/homes/css/style.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="/homes/js-plug/css/zcity.css">
		<link rel="stylesheet" type="text/css" href="/homes/css/page.css">
		<script type="text/javascript" src="/homes/basic/js/jquery-1.7.min.js"></script>
		<script type="text/javascript" src="/homes/basic/js/quick_links.js"></script>
		<script type="text/javascript" src="/homes/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
		<script type="text/javascript" src="/homes/js/jquery.imagezoom.min.js"></script>
		<script type="text/javascript" src="/homes/js/jquery.flexslider.js"></script>
		<script type="text/javascript" src="/homes/js/list.js"></script>
		<script type="text/javascript" src="/homes/js-plug/js/zcity.js"></script>
@section('content')
 <b class="line"></b>
<div class="listMain">

				<!--分类-->
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
				<ol class="am-breadcrumb am-breadcrumb-slash">
					<li><a href="#">首页</a></li>
					<li><a href="#">分类</a></li>
					<li class="am-active">内容</li>
				</ol>
				<script type="text/javascript">
					$(function() {});
					$(window).load(function() {
						$('.flexslider').flexslider({
							animation: "slide",
							start: function(slider) {
								$('body').removeClass('loading');
							}
						});
					});
				</script>
				<div class="scoll">
					<section class="slider">
						<div class="flexslider">
							<ul class="slides">
								@foreach($imgs as $k => $v)
								<li>
									<img src="{{$v->gpic}}" title="pic" />
								</li>
								@endforeach
							</ul>
						</div>
					</section>
				</div>

				<!--放大镜-->

				<div class="item-inform">
					<div class="clearfixLeft" id="clearcontent">
						<div class="box">
							<script type="text/javascript">
								$(document).ready(function() {
									$(".jqzoom").imagezoom();
									$("#thumblist li a").mousemove(function() {
										$(this).parents("li").addClass("tb-selected").siblings().removeClass("tb-selected");
										$(".jqzoom").attr('src', $(this).find("img").attr("mid"));
										$(".jqzoom").attr('rel', $(this).find("img").attr("big"));
									});
								});
							</script>

							<div class="tb-booth tb-pic tb-s310">
								<a href="{{$img->gpic}}"><img src="{{$img->gpic}}" alt="细节展示放大镜特效" rel="{{$img->gpic}}" class="jqzoom" /></a>
							</div>
							<ul class="tb-thumb" id="thumblist">
								@foreach($imgs as $k => $v)
								@if($k == 0)
								<li class="tb-selected">
									<div class="tb-pic tb-s40">
										<a href="#"><img src="{{$v->gpic}}" mid="{{$v->gpic}}" big="{{$v->gpic}}"></a>
									</div>
								</li>
								@else
								<li>
									<div class="tb-pic tb-s40">
										<a href="#"><img src="{{$v->gpic}}" mid="{{$v->gpic}}" big="{{$v->gpic}}"></a>
									</div>
								</li>
								@endif
								@endforeach
							</ul>
						</div>

						<div class="clear"></div>
					</div>

					<div class="clearfixRight">

						<!--规格属性-->
						<!--名称-->
						@foreach($good as $k => $v)
						<div class="tb-detail-hd">
							<h1>	
				 				{{$v->gname}}
	         				</h1>
						</div>
						<div class="tb-detail-list">
							<!--价格-->
							<div class="tb-detail-price">

								<li class="price iteminfo_price">
									<dt>单价</dt>
									<dd><em>¥</em><b class="sys_item_price">{{$v->price}}</b>  </dd>                                 
								</li>
								<!-- <li class="price iteminfo_mktprice">
									<dt>原价</dt>
									<dd><em>¥</em><b class="sys_item_mktprice">{{$v->price}}</b></dd>									
								</li> -->
								
								<div class="clear"></div>
							</div>

							<!--地址-->
							<dl class="iteminfo_parameter freight">
								<dt>配送至</dt>
								<div class="iteminfo_freprice" >
									<div class="am-form-content address" style="position: relative;">
										<div class="zcityGroup" city-range="{'level_start':1,'level_end':3}" city-ini="广东,深圳市,龙华新区"></div>
									</div>
									<div class="postage" style="position: absolute; left: 50%; top:115px; z-index:999;">
										快递<b class="sys_item_freprice">10</b>元
									</div>
								</div>
							</dl>
							<div class="clear"></div>

							<!--销量-->
							<ul class="tm-ind-panel">

								<li class="tm-ind-item tm-ind-sellCount canClick">
									<div class="tm-indcon"><span class="tm-label">月销量</span><span class="tm-count">1015</span></div>
								</li>
								<li class="tm-ind-item tm-ind-sumCount canClick">
									<div class="tm-indcon"><span class="tm-label">累计销量</span><span class="tm-count">{{$v->num}}</span></div>
								</li>
								<li class="tm-ind-item tm-ind-reviewCount canClick tm-line3">
									<div class="tm-indcon"><span class="tm-label">累计评价</span><span class="tm-count">640</span></div>
								</li>
							</ul>
							<div class="clear"></div>

							<!--各种规格-->
							<dl class="iteminfo_parameter sys_item_specpara" style="padding-left: 0">
								<dt class="theme-login"><div class="cart-title">可选规格<span class="am-icon-angle-right"></span></div></dt>
								<dd>
									<!--操作页面-->

									<div class="theme-popover-mask"></div>
									<div class="norns" >
										<div class="theme-span"></div>
										<div class="theme-popbod" >
											<form class="theme-signin" id="close" action="" method="post">
												{{ csrf_field() }}
												<input type="hidden" gid="{{$v->id}}" id="hidden" value="@if($v->discount)
															{{$v->discount}}
														 @else
														 {{$v->price}}
														 @endif">
												<input type="hidden" name="gid" value="{{$v->id}}">
												<div class="theme-signin-left" style="width: 100%;">

													<div class="theme-options">
														<div class="cart-title">口味</div>
														<ul class="taste">
															@foreach($arr as $ke => $val)
															<li class="sku-line @if($ke == 0)selected @endif">{{$val}}<i></i></li>
															@endforeach

														</ul>
														<input type="hidden" name="norns" id="nor" value="">
													</div>
													<div class="theme-options">
														<div class="cart-title number" style="margin-left: 5px">数量</div>
														<dd>
															<input id="nmin" class="am-btn am-btn-default" name="" type="button" value="-" />
															<input id="text_box" name="d_num" type="text" value="1" style="width:30px;" />
															<input id="nadd" class="am-btn am-btn-default" name="" type="button" value="+" />
															<span id="Stock" class="tb-hidden">库存<span id="Stoc" class="stock">{{$v->stock}}</span>件</span>
														</dd>

													</div>
													<div class="clear"></div>
												</div>
											</form>
										</div>
									</div>
									<div class="theme-popover" style="min-width: 200px;" >
										<div class="theme-span"></div>
										<div class="theme-poptit">
											<a href="javascript:;" title="关闭" class="close">×</a>
										</div>
										<div class="theme-popbod" >
											<form class="theme-signin" name="loginform" action="" method="" id="forms">
												<input type="hidden" name="hid" value="PUT">

												<div class="theme-signin-left">

													<div class="theme-options" style="min-width: 250px">
														<div class="cart-title">口味</div>
														<ul id="testes">
															@foreach($arr as $ke => $val)
															<li class="sku-line @if($ke == 0)selected @endif">{{$val}}<i></i></li>
															@endforeach
														</ul>
													</div>
												<!-- 	<div class="theme-options">
														<div class="cart-title">包装</div>
														<ul>
															<li class="sku-line selected">手袋单人份<i></i></li>
														</ul>
													</div> -->
													<div class="theme-options">
														<div class="cart-title number">数量</div>
														<dd>
															<input id="tmin" class="am-btn am-btn-default" name="" type="button" value="-" />
															<input id="text_boxs" name="num" type="text" value="1" style="width:30px;" />
															<input id="tadd" class="am-btn am-btn-default" name="" type="button" value="+" />
															<span id="Stocks" class="tb-hidden">库存<span class="stock">{{$v->stock}}</span>件</span>
														</dd>

													</div>
													<div class="clear"></div>

													<div class="btn-op">

														<div class="btn am-btn am-btn-warning" id="form_sub" >确认</div>
														<div class="btn close am-btn am-btn-warning" id="indent_close">取消</div>
													</div>
												</div>
												<div class="theme-signin-right">
													<div class="img-info">
														<img src="{{$img->gpic}}" />
													</div>
													<div class="text-info">
														<span class="J_Price price-now">¥@if($v->discount)
															{{$v->discount}}
														 @else
														 {{$v->price}}
														 @endif
														</span>
														<span id="Stock" class="tb-hidden">库存<span class="stock">{{$v->stock}}</span>件</span>
													</div>
												</div>

											</form>
										</div>
									</div>

								</dd>
							</dl>
							<div class="clear"></div>
							<!--活动	-->
							<div class="shopPromotion gold">
								<div class="hot">
									<dt class="tb-metatit">店铺优惠</dt>
									<div class="gold-list">
										<p>购物满2件打8折，满3件7折<span>点击领券<i class="am-icon-sort-down"></i></span></p>
									</div>
								</div>
								<div class="clear"></div>
								<div class="coupon">
									<dt class="tb-metatit">优惠券</dt>
									<div class="gold-list">
										<ul>
											<li>125减5</li>
											<li>198减10</li>
											<li>298减20</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="pay">
							<div class="pay-opt">
							<a href="home.html"><span class="am-icon-home am-icon-fw">首页</span></a>
							<a><span class="am-icon-heart am-icon-fw">收藏</span></a>
							
							</div>
							<li>
								<div class="clearfix tb-btn tb-btn-buy theme-login">
									<a id="LikBuy" title="点此按钮到下一步确认购买信息" href="javascript:void(0)">立即购买</a>
								</div>
							</li>
							<li>
								<div class="clearfix tb-btn tb-btn-basket theme-login">
									<a id="LikBasket" title="加入购物车" href="javascript:void(0)" gid="{{$v->id}}"><i></i>加入购物车</a>
								</div>
							</li>
						</div>

					</div>
					@endforeach
					<div class="clear"></div>

				</div>

				<!--优惠套装-->
				<div class="match">
					<div class="match-title">优惠套装</div>
					<div class="match-comment">
						<ul class="like_list">
							<li>
								<div class="s_picBox">
									<a class="s_pic" href="#"><img src="/homes/images/cp.jpg"></a>
								</div> <a class="txt" target="_blank" href="#">萨拉米 1+1小鸡腿</a>
								<div class="info-box"> <span class="info-box-price">¥ 29.90</span> <span class="info-original-price">￥ 199.00</span> </div>
							</li>
							<li class="plus_icon"><i>+</i></li>
							<li>
								<div class="s_picBox">
									<a class="s_pic" href="#"><img src="/homes/images/cp2.jpg"></a>
								</div> <a class="txt" target="_blank" href="#">ZEK 原味海苔</a>
								<div class="info-box"> <span class="info-box-price">¥ 8.90</span> <span class="info-original-price">￥ 299.00</span> </div>
							</li>
							<li class="plus_icon"><i>=</i></li>
							<li class="total_price">
								<p class="combo_price"><span class="c-title">套餐价:</span><span>￥35.00</span> </p>
								<p class="save_all">共省:<span>￥463.00</span></p> <a href="#" class="buy_now">立即购买</a> </li>
							<li class="plus_icon"><i class="am-icon-angle-right"></i></li>
						</ul>
					</div>
				</div>
				<div class="clear"></div>
				
							
				<!-- introduce-->

				<div class="introduce">
					<div class="browse">
					    <div class="mc"> 
						     <ul>					    
						     	<div class="mt">            
						            <h2>看了又看</h2>        
					            </div>
						     	
							      <li class="first">
							      	<div class="p-img">                    
							      		<a  href="#"> <img class="" src="/homes/images/browse1.jpg"> </a>               
							      	</div>
							      	<div class="p-name"><a href="#">
							      		【三只松鼠_开口松子】零食坚果特产炒货东北红松子原味
							      	</a>
							      	</div>
							      	<div class="p-price"><strong>￥35.90</strong></div>
							      </li>
							      <li>
							      	<div class="p-img">                    
							      		<a  href="#"> <img class="" src="/homes/images/browse1.jpg"> </a>               
							      	</div>
							      	<div class="p-name"><a href="#">
							      		【三只松鼠_开口松子】零食坚果特产炒货东北红松子原味
							      	</a>
							      	</div>
							      	<div class="p-price"><strong>￥35.90</strong></div>
							      </li>
							      <li>
							      	<div class="p-img">                    
							      		<a  href="#"> <img class="" src="/homes/images/browse1.jpg"> </a>               
							      	</div>
							      	<div class="p-name"><a href="#">
							      		【三只松鼠_开口松子】零食坚果特产炒货东北红松子原味
							      	</a>
							      	</div>
							      	<div class="p-price"><strong>￥35.90</strong></div>
							      </li>							      
							      <li>
							      	<div class="p-img">                    
							      		<a  href="#"> <img class="" src="/homes/images/browse1.jpg"> </a>               
							      	</div>
							      	<div class="p-name"><a href="#">
							      		【三只松鼠_开口松子】零食坚果特产炒货东北红松子原味
							      	</a>
							      	</div>
							      	<div class="p-price"><strong>￥35.90</strong></div>
							      </li>							      
							      <li>
							      	<div class="p-img">                    
							      		<a  href="#"> <img class="" src="/homes/images/browse1.jpg"> </a>               
							      	</div>
							      	<div class="p-name"><a href="#">
							      		【三只松鼠_开口松子218g】零食坚果特产炒货东北红松子原味
							      	</a>
							      	</div>
							      	<div class="p-price"><strong>￥35.90</strong></div>
							      </li>							      
					      
						     </ul>					
					    </div>
					</div>
					<div class="introduceMain">
						<div class="am-tabs" data-am-tabs>
							<ul class="am-avg-sm-3 am-tabs-nav am-nav am-nav-tabs">
								<li class="am-active">
									<a href="#">

										<span class="index-needs-dt-txt">宝贝详情</span></a>

								</li>

								<li>
									<a href="#">

										<span class="index-needs-dt-txt">全部评价</span></a>

								</li>

								<li>
									<a href="#">

										<span class="index-needs-dt-txt">猜你喜欢</span></a>
								</li>
							</ul>

							<div class="am-tabs-bd">

								<div class="am-tab-panel am-fade am-in am-active">
									<div class="J_Brand">

										<div class="attr-list-hd tm-clear">
											<h4>产品参数：</h4></div>
										<div class="clear"></div>
										<ul id="J_AttrUL">
											<li title="">产品类型:&nbsp;烘炒类</li>
											<li title="">原料产地:&nbsp;巴基斯坦</li>
											<li title="">产地:&nbsp;湖北省武汉市</li>
											<li title="">配料表:&nbsp;进口松子、食用盐</li>
											<li title="">产品规格:&nbsp;210g</li>
											<li title="">保质期:&nbsp;180天</li>
											<li title="">产品标准号:&nbsp;GB/T 22165</li>
											<li title="">生产许可证编号：&nbsp;QS4201 1801 0226</li>
											<li title="">储存方法：&nbsp;请放置于常温、阴凉、通风、干燥处保存 </li>
											<li title="">食用方法：&nbsp;开袋去壳即食</li>
										</ul>
										<div class="clear"></div>
									</div>

									<div class="details">
										<div class="attr-list-hd after-market-hd">
											<h4>商品细节</h4>
										</div>
										<div class="twlistNews">
											{!!$v->descr!!}
										</div>
									</div>
									<div class="clear"></div>

								</div>

								<div class="am-tab-panel am-fade">
									
                                    <div class="actor-new">
                                    	<div class="rate">                
                                    		<strong>100<span>%</span></strong><br> <span>好评度</span>            
                                    	</div>
                                        <dl>                    
                                            <dt>买家印象</dt>                    
                                            <dd class="p-bfc">
                                            			<q class="comm-tags"><span>味道不错</span><em>(2177)</em></q>
                                            			<q class="comm-tags"><span>颗粒饱满</span><em>(1860)</em></q>
                                            			<q class="comm-tags"><span>口感好</span><em>(1823)</em></q>
                                            			<q class="comm-tags"><span>商品不错</span><em>(1689)</em></q>
                                            			<q class="comm-tags"><span>香脆可口</span><em>(1488)</em></q>
                                            			<q class="comm-tags"><span>个个开口</span><em>(1392)</em></q>
                                            			<q class="comm-tags"><span>价格便宜</span><em>(1119)</em></q>
                                            			<q class="comm-tags"><span>特价买的</span><em>(865)</em></q>
                                            			<q class="comm-tags"><span>皮很薄</span><em>(831)</em></q> 
                                            </dd>                                           
                                         </dl> 
                                    </div>	
                                    <div class="clear"></div>
									<div class="tb-r-filter-bar">
										<ul class=" tb-taglist am-avg-sm-4">
											<li class="tb-taglist-li tb-taglist-li-current">
												<div class="comment-info">
													<span>全部评价</span>
													<span class="tb-tbcr-num">({{$count}})</span>
												</div>
											</li>

											<li class="tb-taglist-li tb-taglist-li-1">
												<div class="comment-info">
													<span>好评</span>
													<span class="tb-tbcr-num">({{$hao}})</span>
												</div>
											</li>

											<li class="tb-taglist-li tb-taglist-li-0">
												<div class="comment-info">
													<span>中评</span>
													<span class="tb-tbcr-num">({{$zhong}})</span>
												</div>
											</li>

											<li class="tb-taglist-li tb-taglist-li--1">
												<div class="comment-info">
													<span>差评</span>
													<span class="tb-tbcr-num">({{$cha}})</span>
												</div>
											</li>
										</ul>
									</div>
									<div class="clear"></div>
								<div id="box">
										@if($count == 0)
										<p style="margin-top: 20px;">该商品没有评论</p>
										@else
									<ul class="am-comments-list am-comments-list-flip">
										<!-- 第二部分 -->
										@foreach($data as $val)
										@foreach($user as $v)
										@if($v->id == $val->uid)
										<li class="am-comment">
											<a href="">
												<img class="am-comment-avatar" src="{{$v->profile}}" />
											</a>

											<div class="am-comment-main">
												<!-- 评论内容容器 -->
												<header class="am-comment-hd">
													<!--<h3 class="am-comment-title">评论标题</h3>-->
													<div class="am-comment-meta">
														<!-- 评论元数据 -->
														<a href="#link-to-user" class="am-comment-author">{{$v->customername}}</a>
														<!-- 评论者 -->
														评论于
														<time datetime="">{{date('Y-m-d',$val->addtime)}}</time>
													</div>
												</header>

												<div class="am-comment-bd">
													<div class="tb-rev-item " data-id="255776406962">
														<div class="J_TbcRate_ReviewContent tb-tbcr-content ">
															{{$val->content}}
														</div>

													</div>

												</div>
												<!-- 评论内容 -->
											</div>
										</li>
										@endif
										@endforeach
										@endforeach
									</ul>

									<div class="clear"></div>

									<!--分页 -->
									
									<ul class="paginations paginations-right">
										
										<li><a href="javascript:void(0)" onclick="page(<?php echo $prev ?>)">&laquo;</a></li>
										@foreach($pp as $key=>$val)
										@if($val == $page)
										<li class="active"><a href="javascript:void(0)" onclick="page({{$val}})">{{$val}}</a></li>
										@else
										<li><a href="javascript:void(0)" onclick="page({{$val}})">{{$val}}</a></li>
										
										@endif
										@endforeach
										<li><a href="javascript:void(0)" onclick="page(<?php echo $next ?>)">&raquo;</a></li>
									</ul>
									@endif
								</div>
									<div class="clear"></div>

									<div class="tb-reviewsft">
										<div class="tb-rate-alert type-attention">购买前请查看该商品的 <a href="#" target="_blank">购物保障</a>，明确您的售后保障权益。</div>
									</div>

								</div>

								<div class="am-tab-panel am-fade">
									<div class="like">
										<ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
											<li>
												<div class="i-pic limit">
													<img src="/homes/images/imgsearch1.jpg" />
													<p>【良品铺子_开口松子】零食坚果特产炒货
														<span>东北红松子奶油味</span></p>
													<p class="price fl">
														<b>¥</b>
														<strong>298.00</strong>
													</p>
												</div>
											</li>
											<li>
												<div class="i-pic limit">
													<img src="/homes/images/imgsearch1.jpg" />
													<p>【良品铺子_开口松子】零食坚果特产炒货
														<span>东北红松子奶油味</span></p>
													<p class="price fl">
														<b>¥</b>
														<strong>298.00</strong>
													</p>
												</div>
											</li>
											<li>
												<div class="i-pic limit">
													<img src="/homes/images/imgsearch1.jpg" />
													<p>【良品铺子_开口松子】零食坚果特产炒货
														<span>东北红松子奶油味</span></p>
													<p class="price fl">
														<b>¥</b>
														<strong>298.00</strong>
													</p>
												</div>
											</li>
											<li>
												<div class="i-pic limit">
													<img src="/homes/images/imgsearch1.jpg" />
													<p>【良品铺子_开口松子】零食坚果特产炒货
														<span>东北红松子奶油味</span></p>
													<p class="price fl">
														<b>¥</b>
														<strong>298.00</strong>
													</p>
												</div>
											</li>
											<li>
												<div class="i-pic limit">
													<img src="/homes/images/imgsearch1.jpg" />
													<p>【良品铺子_开口松子】零食坚果特产炒货
														<span>东北红松子奶油味</span></p>
													<p class="price fl">
														<b>¥</b>
														<strong>298.00</strong>
													</p>
												</div>
											</li>
											<li>
												<div class="i-pic limit">
													<img src="/homes/images/imgsearch1.jpg" />
													<p>【良品铺子_开口松子】零食坚果特产炒货
														<span>东北红松子奶油味</span></p>
													<p class="price fl">
														<b>¥</b>
														<strong>298.00</strong>
													</p>
												</div>
											</li>
											<li>
												<div class="i-pic limit">
													<img src="/homes/images/imgsearch1.jpg" />
													<p>【良品铺子_开口松子】零食坚果特产炒货
														<span>东北红松子奶油味</span></p>
													<p class="price fl">
														<b>¥</b>
														<strong>298.00</strong>
													</p>
												</div>
											</li>
											<li>
												<div class="i-pic limit">
													<img src="/homes/images/imgsearch1.jpg" />
													<p>【良品铺子_开口松子】零食坚果特产炒货
														<span>东北红松子奶油味</span></p>
													<p class="price fl">
														<b>¥</b>
														<strong>298.00</strong>
													</p>
												</div>
											</li>
											<li>
												<div class="i-pic limit">
													<img src="/homes/images/imgsearch1.jpg" />
													<p>【良品铺子_开口松子】零食坚果特产炒货
														<span>东北红松子奶油味</span></p>
													<p class="price fl">
														<b>¥</b>
														<strong>298.00</strong>
													</p>
												</div>
											</li>
											<li>
												<div class="i-pic limit">
													<img src="/homes/images/imgsearch1.jpg" />
													<p>【良品铺子_开口松子】零食坚果特产炒货
														<span>东北红松子奶油味</span></p>
													<p class="price fl">
														<b>¥</b>
														<strong>298.00</strong>
													</p>
												</div>
											</li>
											<li>
												<div class="i-pic limit">
													<img src="/homes/images/imgsearch1.jpg" />
													<p>【良品铺子_开口松子】零食坚果特产炒货
														<span>东北红松子奶油味</span></p>
													<p class="price fl">
														<b>¥</b>
														<strong>298.00</strong>
													</p>
												</div>
											</li>
											<li>
												<div class="i-pic limit">
													<img src="/homes/images/imgsearch1.jpg" />
													<p>【良品铺子_开口松子】零食坚果特产炒货
														<span>东北红松子奶油味</span></p>
													<p class="price fl">
														<b>¥</b>
														<strong>298.00</strong>
													</p>
												</div>
											</li>
										</ul>
									</div>
									<div class="clear"></div>

									<!--分页 -->
									<ul class="am-pagination am-pagination-right">
										<li class="am-disabled"><a href="#">&laquo;</a></li>
										<li class="am-active"><a href="#">1</a></li>
										<li><a href="#">2</a></li>
										<li><a href="#">3</a></li>
										<li><a href="#">4</a></li>
										<li><a href="#">5</a></li>
										<li><a href="#">&raquo;</a></li>
									</ul>
									<div class="clear"></div>

								</div>

							</div>

						</div>

						<div class="clear"></div>

@stop
@section('js')
<!-- <script type="text/javascript" src="/homes/js-plug/js/jquery-1.9.1.min.js"></script> -->


<script type="text/javascript">
zcityrun('.zcityGroup');
</script>
<script type="text/javascript">
	// 单价与商品数量相乘的函数
	function accMul(arg1, arg2) {
	        var m = 0, s1 = arg1.toString(), s2 = arg2.toString();

	        try { m += s1.split(".")[1].length } catch (e) { }

	        try { m += s2.split(".")[1].length } catch (e) { }

	        return Number(s1.replace(".", "")) * Number(s2.replace(".", "")) / Math.pow(10, m)

		}
		
	// 点击显示
	// 购买
	$('#LikBuy').click(function(){
		/*var close = [];
		 close['gid'] = $('#hidden').attr('gid');
		 close['norns'] = $('#testes').children('.selected').text().trim();
		 close['d_num'] = $('#text_box').val().trim();
		 close['d_price'] = $('#hidden').val().trim();*/
		 var a = $('#testes').children('.selected').text().trim();
		 $('#nor').val(a);
		 $('#close').attr('action','/home/addpay');
		 $('#close').submit();

	})
	// 加入购物车
	$('#LikBasket').click(function(){
		$('.theme-popover-mask,.theme-popover,.btn-op,.theme-poptit').css('display','block');
		// 将选中的值传送到确认页面
		var data = $('#text_box').val().trim();
		$('#text_boxs').val(data);
		var tst = $('.taste').children('.selected').text().trim();
		var pri = $('#hidden').val().trim();
		// console.log(pri);
		$('.J_Price').text('￥'+accMul(data,pri));

		// var tsts = $('#testes').children().text();
		$('#testes').children('.selected').removeClass('selected');
		var len = $('#testes').children().length;
		for(i=1; i<=len; i++){
		 	var tsts = $('#testes li:nth-child('+i+')').text();
			// console.log(tsts);
			if( tsts == tst){
				$('#testes li:nth-child('+i+')').addClass('selected');
			}
		}
		
	})
	// 点击关闭
	$('#indent_close').click(function(){
		$('.theme-popover-mask,.theme-popover,.btn-op,.theme-poptit').css('display','none');
	})
	$('.close').click(function(){
		$('.theme-popover-mask,.theme-popover,.btn-op,.theme-poptit').css('display','none');
	})
	// 提交
	$.ajaxSetup({
   		headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
	});

		var data1 = [];
		// data1['address'] = [];
		for(i = 0; i < $('.zcityGroup').children().length; i++){
			 data1 += $('.zcityGroup').find('.currentValue').eq(i).val().trim();
		}
		data1 += ','+$('#testes').children('.selected').text().trim();
		data1 += ','+$('#text_boxs').val().trim();
		data1 += ','+$('.tb-detail-hd').text().trim();
		data1 += ','+$('#hidden').attr('gid');
		data1 += ','+$('.img-info').children().attr('src');
		data1 += ','+$('.J_Price').text().trim().substring(1);
		// var da = data1.join(',');
		// console.log(data1);
		

		$('#form_sub').click(function(){
		var gid = $('#hidden').attr('gid');

		var num = $('#text_boxs').val().trim();
		
		window.location.href="/detailadd?id="+gid+"&num="+num;
	    })
	// 获取商品数量// 加
	$('#nadd').click(function(){
		var td = $(this).prev().val();
		var stock = $('#Stoc').text().trim();
		td++;
		$.post('/home/shopnum',{num:td,stock:stock},function(data){
			$('#nadd').prev().val(data);
		})
		
		 // $('#nadd').prev().val(td);
		// console.log(a);
	})
	// 减
	$('#nmin').click(function(){
		var td = $(this).next().val();
		// console.log(td);
		td--;
		if(td <= 1){
			td = 1;
		}
		$(this).next().val(td);
		
		
	})

	// 加
	$('#tadd').click(function(){
		var td = $(this).prev().val();
		var stock = $('#Stoc').text().trim();
		td++;
		$(this).prev().val(td);
		// 获取单价
		var pri = $('#hidden').val().trim();
		// console.log(pri);
		$('.J_Price').text('￥'+accMul(td,pri));
		
	})
	// 减
	$('#tmin').click(function(){
		var td = $(this).next().val();
		// console.log(td);
		td--;
		if(td <= 1){
			td = 1;
		}
		$(this).next().val(td);
		// 获取单价
		var pri = $('#hidden').val().trim();
		// console.log(pri);
		$('.J_Price').text('￥'+accMul(td,pri));
		
	})
</script> 
<!-- 评论 -->

<script>
/*
@分页
*/
function page(page){
$.ajax({
type:"get",
url:"/home/page",
data:{
page:page
},
success:function(msg){
if(msg){
$("#box").html(msg)
}
}
})
}
</script>
@stop