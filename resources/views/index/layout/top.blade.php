	<!--顶部-->
	<style>
	
a{
		text-decoration:none;
}
	</style>
	<div class="nav-top">
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

		<!--头部-->
		<div class="header">
			<div class="py-container">
				<div class="yui3-g Logo">
					<div class="yui3-u Left logoArea">
						<a class="logo-bd" title="品优购" href="JD-index.html" target="_blank"></a>
					</div>



					<div class="yui3-u Center searchArea">
						<div class="search">
							<form action="" class="sui-form form-inline">
								<!--searchAutoComplete-->
								<div class="input-append">
									<input type="text" id="autocomplete" type="text" class="input-error input-xxlarge"  style="height:32px;" />
									<button class="sui-btn btn-xlarge btn-danger"  type="button">搜索</button>
								</div>
							</form>
						</div>
						<div class="hotwords">
							<ul>
								@foreach($brand as $k=>$v)
								
									<li class="f-item"><a href="{{url('/index/nav_hot/'.$v->brand_id)}}" style="color:black; text-decoration:none;">{{$v->brand_name}}</a></li>
									
								@endforeach
							</ul>
						</div>
					</div>

					<div class="yui3-u Right shopArea">
						<div class="fr shopcar">
							<div class="show-shopcar" id="shopcar">
								<span class="car"></span>
								<a class="sui-btn btn-default btn-xlarge" href="/index/cart_list" target="_blank">
									<span>我的购物车</span>
									<i class="shopnum">{{$cart}}</i>
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="yui3-g NavList">
					<div class="yui3-u Left all-sort">
						<h4>全部商品分类</h4>
					</div>
					<div class="yui3-u Center navArea">
						<ul class="nav">
							@foreach($nav as $v=>$k)
							<li class="f-item">	<a href="{{url('/index/nav_list/'.$k->nav_id)}}" style="color:black; text-decoration:none;">{{$k->nav_name}}</a></li>
							@endforeach
							<li class="f-item"><a href="#"  style=" text-decoration:none;">秒杀</a></li>
							<li class="f-item"><a href="#"  style=" text-decoration:none;">优惠券</a></li>
						</ul>
					</div>
					<div class="yui3-u Right"></div>
				</div>
			</div>
		</div>
	</div>