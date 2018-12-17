<!DOCTYPE html>
<html>
<head>
	<title></title>
		<link rel="stylesheet" type="text/css" href="/homes/css/page.css">
</head>
<body>
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
</body>
</html>