@extends('layout.home1')
@section('title',$title)
		<link href="/homes/css/jsstyle.css" rel="stylesheet" type="text/css" />
		<link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/homes/css/addstyle.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="/homes/js/address.js"></script>
		<link href="/homes/css/sustyle.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="/homes/basic/js/jquery-1.7.min.js"></script>

@section('content')
		
>>>>>>> 94eb53332f1b7e608985e4d91ec3437f5ceb3235
			<div class="take-delivery">
			 <div class="status">
			   <h2>订单成功</h2>
			   <div class="successInfo">
			     <ul>
			     @foreach($res as $k => $v)
			       <li>付款金额<em>¥{{$v->total}}</em></li>
			      
			       <div class="user-info">
				         <p>收货人：{{$v->oname}}</p>
				         <p>联系电话：{{$v->o_phone}}</p>
				         <p>收货地址：{{$v->o_address}}</p>
			      
			       
			       </div>
			       @endforeach
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
