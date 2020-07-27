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
						<li class="f-item">品优购欢迎您！</li>
						<li class="f-item">请<a href="login.html" target="_blank">登录</a>　<span><a href="register.html" target="_blank">免费注册</a></span></li>
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
								
									<li class="f-item"><a href="" style="color:black; text-decoration:none;">{{$v->brand_name}}</a></li>
									
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
									<i class="shopnum">0</i>
								</a>
								<div class="clearfix shopcarlist" id="shopcarlist" style="display:none">
									<p>"啊哦，你的购物车还没有商品哦！"</p>
									<p>"啊哦，你的购物车还没有商品哦！"</p>
								</div>
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
							<li class="f-item"><a href="seckill-index.html" target="_blank" style=" text-decoration:none;">秒杀</a></li>
						</ul>
					</div>
					<div class="yui3-u Right"></div>
				</div>
			</div>
		</div>
	</div>