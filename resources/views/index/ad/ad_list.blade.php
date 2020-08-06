<title>Atido广告</title>
<link rel="stylesheet" type="text/css" href="/static/index/css/webbase.css" />
<link rel="stylesheet" type="text/css" href="/static/index/css/pages-cart.css" />
<script type="text/javascript" src="/static/index/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/static/index/js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="/static/index/js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="/static/index/js/widget/nav.js"></script>
<!--head-->
{{--导航--}}
<div class="top">
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
		<div class="yui3-u Left logoArea">
			<a class="logo-bd" title="品优购" href="{{url('/')}}" target="_blank"></a>
		</div>
		<div class="fr search">
			<form class="sui-form form-inline">
				<div class="input-append">
					<input type="text" class="input-error input-xxlarge"
						   style="height:30px" placeholder="艾蒂妲快报" name="goods_name" value="" />
					<input type="submit" class="sui-btn btn-xlarge btn-danger" value="搜索">
				</div>
			</form>
		</div>
	</div>
</div>
{{--内容--}}
<div style="margin-top:20px;">
      <p style="color:#000; margin-left:115px; font-size:22px; font-weight:bold; padding-left:15px;">
		  艾蒂妲快报 &nbsp;:&nbsp;
		  <b style="color:#b1191a; font-size:15px;">{{$reg->g_name}}</b>
	  </p>
      <div style="border:1px solid #ccc; width:1200px; height:450px; background:#fff;margin:0 auto;">
          <h2 style="text-align:center; margin-top:30px;">{{$reg->g_name}}</h2>
         <div align="center"> <p style="text-align:left; margin-top:20px; width:600px;   font-size: 13px; text-indent:2em;">{{$reg->g_desc}}</p></div>
		  {{--图片--}}
		  <div class="like" style="margin-top:25px;" align="center">
			  <div class="like-list" >
				  <ul class="yui3-g" >
					  @foreach($gInfo as $k=>$v)
						  <li class="yui3-u-1-6" style="margin-left:125px;">
							  <div class="list-wrap">
								  <div class="p-img" style="margin-top: 25px;">
									  <img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}"  style="height: 110px;width: 110px;"/>
								  </div>
								  <div class="attr">
									  <em>{{$v->goods_name}}</em>
								  </div>
								  <div class="price"  style="margin-top:20px;">
									  <strong>
										  <em>¥</em>
										  <i>{{$v->goods_price}}</i>
									  </strong>
								  </div>
								  <div class="commit">
									  <a href="/index/goods_desc/{{$v->goods_id}}"
										 class="sui-btn btn-bordered btn-danger">查看详情</a>
								  </div>
							  </div>
						  </li>
					  @endforeach
				  </ul>
			  </div>
		  </div>
</div>
</div>
</div>
