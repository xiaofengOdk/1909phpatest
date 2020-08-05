<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<title>结算页</title>
	<link rel="stylesheet" type="text/css" href="/static/index/css/webbase.css" />
<link rel="stylesheet" type="text/css" href="/static/index/css/pages-cart.css" />
<script type="text/javascript" src="/static/index/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/static/index/js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="/static/index/js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="/static/index/js/widget/nav.js"></script>
    <link rel="stylesheet" type="text/css" href="/static/index/css/pages-getOrderInfo.css" />
</head>

<body>
<div class="top">
	<div class="py-container">
		<div class="shortcut">
			<ul class="fl">

				@if(session('reg')=='')
					<li class="f-item">品优购欢迎您！</li>
					<li class="f-item">请<a href="/index/login" target="_blank">登录</a>　<span><a href="/index/reg" target="_blank">免费注册</a></span></li>

				@else
					<li class="f-item">欢迎</li>
					<li class="f-item" style="margin-left:10px;"><a >@php echo session('reg')->user_name@endphp</a>　<span><a href="/index/quit" target="_blank">退出</a></span></li>
				@endif
			</ul>
			<ul class="fr">
				<li class="f-item"><a href="http://www.1909a3.com/index/user_index" style="text-decoration: none; color:black;">我的订单</a></li>
				<li class="f-item space"></li>
				<li class="f-item"><a href="home.html" target="_blank">我的品优购</a></li>
				<li class="f-item space"></li>
				<li class="f-item">品优购会员</li>
				<li class="f-item space"></li>
				<li class="f-item">企业采购</li>
				<li class="f-item space"></li>
				<li class="f-item">关注品优购</li>
				<li class="f-item space"></li>
				<li class="f-item" id="service">
					<span>客户服务</span>
					<ul class="service">
						<li><a href="cooperation.html" target="_blank">合作招商</a></li>
						<li><a href="shoplogin.html" target="_blank">商家后台</a></li>
						<li><a href="cooperation.html" target="_blank">合作招商</a></li>
						<li><a href="#">商家后台</a></li>
					</ul>
				</li>
				<li class="f-item space"></li>
				<li class="f-item"><a href="/"style="text-decoration: none; color:black;" >网站导航</a></li>
			</ul>
		</div>
	</div>
</div>
	<!--head-->
    @extends("index.layout.public")

	<!-- <div class="cart py-container"> -->
		<!--logoArea-->
	
		<!--主内容-->
		<div class="checkout py-container">
			<div class="checkout-tit">
				<h4 class="tit-txt">填写并核对订单信息</h4>
			</div>
			<div class="checkout-steps">
				<!--收件人信息-->
				<div class="step-tit">
					<h5>收件人信息<span><a href="{{url('user/user_address')}}"  class="newadd">新增收货地址</a></span></h5>
				</div>
				<div class="step-cont">
					<div class="addressInfo">
						<ul class="addr-detail">
							<li class="addr-item">
								
								@foreach($address as $k=>$v)
							  <div>
								<div class="con address">{{$v->user_name}}&nbsp;&nbsp;&nbsp;&nbsp; {{$v->deta_address}}<span>&nbsp;&nbsp;&nbsp;{{$v->tel}}</span>
								     @if($v->is_moren==2)
									<span class="base"><a style="color:red;">默认地址</a></span>
									 @else
									 <span class="base"><a href="/order/moren/{{$v->id}}">设置默认地址</a></span>
									 @endif
									<span class="edittext" ><a   href="/order/del/{{$v->id}}">删除</a></span>
								</div>
								<div class="clearfix"></div>
							  </div>
							  @endforeach
							</li>
							
							
						</ul>
						<!--添加地址-->
                          <div  tabindex="-1" role="dialog" data-hasfoot="false" class="sui-modal hide fade edit">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" data-dismiss="modal" aria-hidden="true" class="sui-close">×</button>
						        <h4 id="myModalLabel" class="modal-title">添加收货地址</h4>
						      </div>
						      <div class="modal-body">
						      	<form action="" class="sui-form form-horizontal">
						      		 <div class="control-group">
									    <label class="control-label">收货人：</label>
									    <div class="controls">
									      <input type="text" class="input-medium">
									    </div>
									  </div>
									   
									   <div class="control-group">
									    <label class="control-label">详细地址：</label>
									    <div class="controls">
									      <input type="text" class="input-large">
									    </div>
									  </div>
									   <div class="control-group">
									    <label class="control-label">联系电话：</label>
									    <div class="controls">
									      <input type="text" class="input-medium">
									    </div>
									  </div>
									   <div class="control-group">
									    <label class="control-label">邮箱：</label>
									    <div class="controls">
									      <input type="text" class="input-medium">
									    </div>
									  </div>
									   <div class="control-group">
									    <label class="control-label">地址别名：</label>
									    <div class="controls">
									      <input type="text" class="input-medium">
									    </div>
									    <div class="othername">
									    	建议填写常用地址：<a href="#" class="sui-btn btn-default">家里</a>　<a href="#" class="sui-btn btn-default">父母家</a>　<a href="#" class="sui-btn btn-default">公司</a>
									    </div>
									  </div>
									  
						      	</form>
						      	
						      	
						      </div>
						      <div class="modal-footer">
						        <button type="button" data-ok="modal" class="sui-btn btn-primary btn-large">确定</button>
						        <button type="button" data-dismiss="modal" class="sui-btn btn-default btn-large">取消</button>
						      </div>
						    </div>
						  </div>
						</div>
						 <!--确认地址-->
					</div>
					<div class="hr"></div>
					
				</div>
				<div class="hr"></div>
				<!--支付和送货-->
				<div class="payshipInfo">
					<div class="step-tit">
						<h5>支付方式</h5>
					</div>
					<div class="step-cont">
						<ul class="payType">
							<li class="selected">支付宝</li>
							
						</ul>
					</div>
					<div class="hr"></div>
					<div class="step-tit">
						<h5>送货清单</h5>
					</div>
					<div class="step-cont">
						<ul class="send-detail">
							<li>
								<input type="hidden" value="{{$goodsss_id}}" class="goodsss_id">
								@foreach($order as $k=>$v) 
								<div class="sendGoods"  >
									
									<ul class="yui3-g">
                               
									<li class="yui3-u-1-6" goods_id="{{$v->goods_id}}">
											<span><img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" width="100;"  height="150;"></span>
										</li>
										<li class="yui3-u-7-12">
                                            <div class="name" style="color:red;" >{{$v->goods_name}}</div>
											<div class="desc">{{$v->goods_dese}}</div>
											<div class="desc"style="color:#cc0000;"><h4>7天无理由退货</h4> </div>
										</li>
										<li class="yui3-u-1-12">
											<div class="price">{{$v->order_price}}￥</div>
										</li>
										<li class="yui3-u-1-12">
											<div class="num">X{{$v->buy_number}}</div>
										</li>
										<li class="yui3-u-1-12">
											<div class="exit">有货</div>
										</li>
                                      
									</ul>
								</div>
                                @endforeach
							</li>
							<li></li>
							<li></li>
						</ul>
					</div>
					<div class="hr"></div>
				</div>
				<div class="linkInfo">
					<div class="step-tit">
						<h5>发票信息</h5>
					</div>
					<div class="step-cont">
						<span>普通发票（电子）</span>
						<span>个人</span>
						<span>明细</span>
					</div>
				</div>
				<div class="cardInfo">
					<div class="step-tit">
						<h5>使用优惠/抵用</h5>
					</div>
				</div>
			</div>
		</div>
		<div class="order-summary">
			<div class="static fr">
				<div class="list">
					<span><i class="number"></i>商品总金额</span>
					<em class="allprice">¥{{$shop}}</em>
				</div>
				<div class="list">
					<span>积分优惠：</span>
					<em class="money">￥{{$score3}}</em>
				</div>
				<div class="list">
					<span>运费：</span>
					<em class="transport">0.00</em>
				</div>
			</div>
		</div>
		<div class="clearfix trade">
			<div class="fc-price">应付金额:　<span class="price goods_price" price="{{$num}}">¥{{$num}}</span></div>
			<div class="fc-receiverInfo">寄送至:{{$dz['deta_address']}} 收货人：{{$dz['user_name']}} 电话：{{$dz['tel']}}</div>
		</div>
		<div class="submit">
			<a class="sui-btn btn-danger btn-xlarge tijiao" href="JavaScript:;">提交订单</a>
		</div>
	<!-- </div> -->
	<!-- 底部栏位 -->
    <!--页面底部-->
<!--页面底部END-->

<script type="text/javascript" src="/static/index/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/static/index/js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="/static/index/js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="/static/index/js/pages/getOrderInfo.js"></script>
</body>

</html>

<script>
	$(document).on("click",".tijiao",function(){
		var url = "{{url('/order/order_sub')}}";
		
    		var goods_id = $(".goodsss_id").val();
			var price = $(".goods_price").attr("price");
			var data = {};
			data.goods_id = goods_id;
			data.price = price;
		$.ajax({
				type:"post",
				url:url,
				data:data,
				dataType:"json",
				success:function(res){
					console.log(res)
					if(res.success==true){
						alert(res.message);
						var order_id=res.result
						location.href="/payMoney1/"+order_id
					}
				}
			})
	
	})

	
</script>

@include("index.layout.foot")