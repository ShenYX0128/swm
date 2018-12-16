@extends('layout.home1')
@section('title',$title)
		<link href="/homes/css/jsstyle.css" rel="stylesheet" type="text/css" />
		<link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/homes/css/addstyle.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="/homes/js/address.js"></script>
		<link href="/homes/css/sustyle.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="/homes/basic/js/jquery-1.7.min.js"></script>

@section('content')
		
			<div class="take-delivery" style="margin-top:100px;margin-bottom:100px;">
			 <div class="status">
			   <h2>订单成功</h2>
			   <div class="successInfo">
			     <ul>
			       <li>付款金额<em></em></li>
			      
			       <div class="user-info">
				        
			      
			       
			       </div>
			      
			             请认真核对您的收货信息，如有错误请联系客服
			                               
			     </ul>
			     <div class="option">
			       <span class="info">您可以</span>
			        <a href="/home/order" class="J_MakePoint">查看<span>已买到的宝贝</span></a>
			        <a href="/home/orderdetails" class="J_MakePoint">查看<span>交易详情</span></a>
			     </div>
			    </div>
			  </div>
			</div>

@stop
