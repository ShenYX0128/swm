<?php $__env->startSection('title',$title); ?>
<?php $__env->startSection('content'); ?>
		
		<link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />
		<link href="/homes/basic/css/demo.css" rel="stylesheet" type="text/css"/>
		<link href="/homes/css/seastyle.css" rel="stylesheet" type="text/css" />
		<link href="/homes/css/page.css" rel="stylesheet" type="text/css" />
		
		<script type="text/javascript" src="/homes/js/jquery.js"></script>
		<link rel="stylesheet" href="/admins/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">




		<!-- <script type="text/javascript" src="/homes/basic/js/jquery-1.7.min.js"></script> -->
		<script type="text/javascript" src="/homes/js/script.js"></script>
			<div class="clear"></div>
			<b class="line"></b>
           <div class="search">
			<div class="search-list">
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
			
				
					<div class="am-g am-g-fixed">
						<div class="am-u-sm-12 am-u-md-12">
	                  	<div class="">														
							<div class="searchAbout">
								<span class="font-pale">相关搜索：</span>
								<a title="坚果" href="#">坚果</a>
								<a title="瓜子" href="#">瓜子</a>
								<a title="鸡腿" href="#">豆干</a>

							</div>
							<ul class="select">
								<p class="title font-normal">
									<span class="fl">松子</span>
									<span class="total fl">搜索到<strong class="num">997</strong>件相关商品</span>
								</p>
								<div class="clear"></div>
								<li class="select-result">
									<dl>
										<dt>已选</dt>
										<dd class="select-no"></dd>
										<p class="eliminateCriteria">清除</p>
									</dl>
								</li>
								<div class="clear"></div>
								
								<li class="select-list">
									<dl id="select2">
										<dt class="am-badge am-round">种类</dt>
										<div class="dd-conent">
											<dd class="select-all selected"><a href="#">全部</a></dd>
											
											<dd><a href="#"></a></dd>
											
										</div>
									</dl>
								</li>
					        
							</ul>
							<div class="clear"></div>
                        </div>

							<div class="search-content">
								<div class="sort">
									<li class="first"><a title="综合">综合排序</a></li>
									<li><a title="销量">销量排序</a></li>
									<li><a title="价格">价格优先</a></li>
									<li class="big"><a title="评价" href="#">评价为主</a></li>
								</div>
								<div class="clear"></div>
							
								<ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
									<?php $__currentLoopData = $goods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<li>
										<div class="i-pic limit">
											
											<a href="/home/detail/<?php echo e($v->id); ?>">
												<?php $__currentLoopData = $gimg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ke => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php if($v->id == $val->gid): ?>
												<img src="<?php echo e($val->gpic); ?>" width="218" height="218" />
												<?php endif; ?>	
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>					
											<p class="title fl"><?php echo e($v->gname); ?></p>
											<p class="price fl">
												<b>¥</b>
												<strong><?php echo e($v->price); ?></strong>
											</p>
											<p class="number fl">
												销量<span><?php echo e($v->num); ?></span>
											</p></a>
										</div>
									</li>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
								</ul>
							</div>
							<div class="search-side">
							
								<div class="side-title">
									经典搭配
								</div>
							
								<li>
									<div class="i-pic check">
										<img src="/homes/images/cp.jpg" />
										<p class="check-title">萨拉米 1+1小鸡腿</p>
										<p class="price fl">
											<b>¥</b>
											<strong>29.90</strong>
										</p>
										<p class="number fl">
											销量<span>1110</span>
										</p>
									</div>
								</li>
								<li>
									<div class="i-pic check">
										<img src="/homes/images/cp2.jpg" />
										<p class="check-title">ZEK 原味海苔</p>
										<p class="price fl">
											<b>¥</b>
											<strong>8.90</strong>
										</p>
										<p class="number fl">
											销量<span>1110</span>
										</p>
									</div>
								</li>
								<li>
									<div class="i-pic check">
										<img src="/homes/images/cp.jpg" />
										<p class="check-title">萨拉米 1+1小鸡腿</p>
										<p class="price fl">
											<b>¥</b>
											<strong>29.90</strong>
										</p>
										<p class="number fl">
											销量<span>1110</span>
										</p>
									</div>
								</li>
							
							</div>
							<div class="clear"></div>
							<ul class="am-paginations am-paginations-right">
								<?php echo e($goods->links()); ?>

							</ul>
				
						</div>
					</div>
					

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>