
<title>Atido购物车</title>
<link rel="stylesheet" type="text/css" href="/static/index/css/webbase.css" />
<link rel="stylesheet" type="text/css" href="/static/index/css/pages-cart.css" />
<script type="text/javascript" src="/static/index/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/static/index/js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="/static/index/js/plugins/sui/sui.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/static/index/css/pages-paysuccess.css" />
<script type="text/javascript" src="/static/index/js/widget/nav.js"></script><div class="top">
	<div class="py-container">
		<div class="shortcut">
			<ul class="fl">

				@if(session('reg')=='')
					<li class="f-item">艾蒂妲欢迎您！</li>
					<li class="f-item">请&nbsp;<a href="/index/login" target="_blank">登录</a>　<span><a href="/index/reg" target="_blank">免费注册</a></span></li>

				@else
					<li class="f-item">欢迎</li>
					<li class="f-item" style="margin-left:10px;"><a >@php echo session('reg')->user_name@endphp</a>　<span><a href="/index/quit" target="_blank">退出</a></span></li>
				@endif
			</ul>
			<ul class="fr">
				<li class="f-item"><a href="/"style="text-decoration: none; color:black;" >网站首页</a></li>
				<li class="f-item space"></li>
				<li class="f-item"><a href="http://www.1909a3.com/index/user_index" style="text-decoration: none; color:black;">我的订单</a></li>
				<li class="f-item space"></li>
				<li class="f-item"><a href="/index/user_index" target="_blank">个人中心</a></li>

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
				<li class="f-item"><a href="/user/answer" target="_blank">网站留言</a></li>
			</ul>
		</div>
	</div>
</div>

		<div class="cart py-container">
			<!--logoArea-->
			<div class="logoArea">
				<div class="fl logo"><span class="title">支付页</span></div>
			</div>
			<!--主内容-->
			<div class="paysuccess">
				<div class="success">
					<h3><img src="/static/index/img/_/right.png" width="48" height="48">　恭喜您，支付成功啦！</h3>
					<div class="paydetail">
					<p style="color: red;">支付方式：{{$money['pay_status']=="1"?"支付宝":"其他"}}</p>
					<p style="color: red;   font-size: 20px;"   >  支付金额：￥{{$money['order_amount']}}.00元</p>
					<p class="button"><a href="/index/user_index" class="sui-btn btn-xlarge btn-danger">查看订单</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/" class="sui-btn btn-xlarge ">继续购物</a></p>
				    </div>
				</div>
				
			</div>
		</div>
@include("index.layout.foot")
