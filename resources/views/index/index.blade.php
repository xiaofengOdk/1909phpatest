@extends("index.layout.public")
@section("content")
@include("index.layout.top")
	<!--列表-->
	<div class="sort">
		<div class="py-container">
			<div class="yui3-g SortList ">
				<div class="yui3-u Left all-sort-list">
					<div class="all-sort-list2">
						@foreach($cate_info as $k=>$v)
						<div class="item bo">
							<h3><a href="/index/goods_list/{{$v->cate_id}}
" value="{{$v->cate_id}}">{{$v->cate_name}}</a></h3>
							<div class="item-list clearfix">
								@foreach($v->child as $kk=>$vv)
								<div class="subitem">
									<dl class="fore1">				
										<dt><a href="/index/goods_list/{{$vv->cate_id}}
" value="{{$v->cate_id}}">{{$vv->cate_name}}</a></dt>
										<dd>@foreach($vv->child as $kkk=>$vvv)<em><a href="/index/goods_list/{{$vvv->cate_id}}
" value="{{$v->cate_id}}">{{$vvv->cate_name}}</a></em>@endforeach</dd>		
									</dl>
								</div>
								@endforeach
							</div>
						</div>
								@endforeach
					</div>
				</div>
				<div class="yui3-u Center banerArea">
					<!--banner轮播-->
					<div id="myCarousel" data-ride="carousel" data-interval="4000" class="sui-carousel slide">
					  <ol class="carousel-indicators">
					    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					    <li data-target="#myCarousel" data-slide-to="1"></li>
					    <li data-target="#myCarousel" data-slide-to="2"></li>
					  </ol>
					  <div class="carousel-inner">
					  	@foreach($goods_info as $k=>$v)
					  		@if($k==0)
		    			<div class="active item">
						 <a href="/index/goods_desc/{{$v->goods_id}}">
						<img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}"  style="width: 740px;height: 460px;" width="740px;"  height="460px;" />
					     </a>
					    </div>
						    @else
					    <div class="item">
						 <a href="/index/goods_desc/{{$v->goods_id}}">
						<img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}"style="width: 740px;height: 460px;"  width="740px;"  height="460px;" />
					     </a>
					    </div>
					    	@endif
					 	@endforeach
					  </div><a href="#myCarousel" data-slide="prev" class="carousel-control left">‹</a><a href="#myCarousel" data-slide="next" class="carousel-control right">›</a>
					</div>
				</div>
				<div class="yui3-u Right">
					<div class="news">
						<h4><em class="fl">品优购快报</em><span class="fr tip"></span></h4>
						<div class="clearix"></div>
						<ul class="news-list unstyled">
							@foreach($adtr_info as $k=>$v)
							<li>
								<span class="bold" style="color:black;" >[{{$v->is_type==1?"广告":"热卖"}}]</span><a href="/index/adv_list/{{$v->g_id}}" style="color:black;">{{{$v->g_name}}}</a>
							</li>
							@endforeach
						</ul>
					</div>
					<ul class="yui3-g Lifeservice">
						<li class="yui3-u-1-4 life-item tab-item">
							<i class="list-item list-item-1"></i>
							<span class="service-intro">话费</span>
						</li>
						<li class="yui3-u-1-4 life-item tab-item">
							<i class="list-item list-item-2"></i>
							<span class="service-intro">机票</span>
						</li>
						<li class="yui3-u-1-4 life-item tab-item">
							<i class="list-item list-item-3"></i>
							<span class="service-intro">电影票</span>
						</li>
						<li class="yui3-u-1-4 life-item tab-item">
							<i class="list-item list-item-4"></i>
							<span class="service-intro">游戏</span>
						</li>
						<li class="yui3-u-1-4 life-item notab-item">
							<i class="list-item list-item-5"></i>
							<span class="service-intro">彩票</span>
						</li>
						<li class="yui3-u-1-4 life-item notab-item">
							<i class="list-item list-item-6"></i>
							<span class="service-intro">加油站</span>
						</li>
						<li class="yui3-u-1-4 life-item notab-item">
							<i class="list-item list-item-7"></i>
							<span class="service-intro">酒店</span>
						</li>
						<li class="yui3-u-1-4 life-item notab-item">
							<i class="list-item list-item-8"></i>
							<span class="service-intro">火车票</span>
						</li>
						<li class="yui3-u-1-4 life-item  notab-item">
							<i class="list-item list-item-9"></i>
							<span class="service-intro">众筹</span>
						</li>
						<li class="yui3-u-1-4 life-item notab-item">
							<i class="list-item list-item-10"></i>
							<span class="service-intro">理财</span>
						</li>
						<li class="yui3-u-1-4 life-item notab-item">
							<i class="list-item list-item-11"></i>
							<span class="service-intro">礼品卡</span>
						</li>
						<li class="yui3-u-1-4 life-item notab-item">
							<i class="list-item list-item-12"></i>
							<span class="service-intro">白条</span>
						</li>
					</ul>
					<div class="life-item-content">
						<div class="life-detail">
							<i class="close">关闭</i>
							<p>话费充值</p>
							<form action="" class="sui-form form-horizontal">
								号码：<input type="text" id="inputphoneNumber" placeholder="输入你的号码" />
							</form>
							<button class="sui-btn btn-danger">快速充值</button>
						</div>
						<div class="life-detail">
							<i class="close">关闭</i> 机票
						</div>
						<div class="life-detail">
							<i class="close">关闭</i> 电影票
						</div>
						<div class="life-detail">
							<i class="close">关闭</i> 游戏
						</div>
					</div>
					<div class="ads">
						<img src="http://lqcp.lyfn.top/uploads/nxmlglbFBU22dye3aUzNflizJJJbDSMpwnQkCDML.jpeg" />
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--推荐-->
	<div class="show">
		<div class="py-container">
			<ul class="yui3-g Recommend">
				<li class="yui3-u-1-6  clock">
					<div class="time">
						<img src="/static/index/img/clock.png" />
						<h3>今日推荐</h3>
					</div>
				</li>
				@foreach($goods_info as $k=>$v)
					@if($k<=3)
				<li class="yui3-u-5-24">
					<a href="/index/goods_desc/{{$v->goods_id}}" target="_blank"><img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}"  style="width: 250;height: 160;"/></a>
				</li>
					@endif
				@endforeach
			</ul>
		</div>
	</div>
	<!--喜欢-->
	<div class="like">
		<div class="py-container">
			<div class="title">
				<h3 class="fl">猜你喜欢</h3>
				<b class="border"></b>
				<a href="javascript:;" class="fr tip changeBnt" id="xxlChg"><i></i>换一换</a>
			</div>
			<div class="bd">
				<ul class="clearfix yui3-g Favourate picLB" id="picLBxxl">
						@foreach($goods_info as $k=>$v)
					<li class="yui3-u-1-6">
						<dl class="picDl huozhe">
					
							<dd>
								<a href="/index/goods_desc/{{$v->goods_id}}" class="pic"><img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" alt="" /></a>
								<div class="like-text">
									<p>{{$v->goods_name}}</p>
									<h3>¥{{$v->goods_price}}</h3>
								</div>
							</dd>
							@foreach($goods_info2 as $k=>$vv)
					
						
					
							
							<dd>
								<a href="/index/goods_desc/{{$vv->goods_id}}" class="pic"><img src="{{env('UPLOADS_URL')}}{{$vv->goods_img}}" alt="" /></a>
								<div class="like-text">
									<p>{{$vv->goods_name}}</p>
									<h3>¥{{$vv->goods_price}}</h3>
								</div>
							</dd>
						
					
					@endforeach
						</dl>
					</li>
					@endforeach
					
				</ul>
			</div>
		</div>
	</div>
	<!--有趣-->
	<div class="fun">
		<div class="py-container">
			<div class="title">
				<h3 class="fl">今日推荐</h3>
			</div>
			<div class="clearfix yui3-g Interest">
				<span class="x-line"></span>
				<div class="yui3-u row-405 Interest-conver">
					@foreach($goods_info as $k=>$v)
						@if($k==0)
						<a href="/index/goods_desc/{{$v->goods_id}}">
					<img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" style="width: 405px;height: 405px;"  /></a>
						@endif
					@endforeach
				</div>
				<div class="yui3-u row-225 Interest-conver-split">
					<h5>好东西</h5>
						@foreach($goods_info as $k=>$v)
							@if($k<=1)
							<a href="/index/goods_desc/{{$v->goods_id}}">
						<img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" style="width: 226px;height: 200px;"  /></a>
							@endif
						@endforeach
				</div>
				<div class="yui3-u row-405 Interest-conver-split blockgary">
					<h5>品牌街</h5>
					<div class="split-bt">
						@foreach($brand as $k=>$v)
							@if($k==0)
							<a href="/index/nav_hot/{{$v->brand_id}}">
						<img src="{{env('UPLOAD_URL')}}{{$v->brand_log}}"  style="width: 404px;height: 206px;" />
						    </a>
							@endif
						@endforeach
					</div>
					<div class="x-img fl">
						@foreach($brand as $k=>$v)
							@if($k<=1)
							<a href="/index/nav_hot/{{$v->brand_id}}">
						<img src="{{env('UPLOAD_URL')}}{{$v->brand_log}}" style="width: 203px;height: 158px;" />
						  </a>
							@endif
						@endforeach
					</div>
				</div>
				<div class="yui3-u row-165 brandArea">
					<span class="brand-yline"></span>
					<ul class="yui3-g brand-list">
						@foreach($brand as $k=>$v)
						<li class="yui3-u-1-2 brand-pit">
						<a href="/index/nav_hot/{{$v->brand_id}}">
							<img src="{{env('UPLOAD_URL')}}{{$v->brand_log}}"style="width: 82px;height: 49px;"  />
						</a>
						</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--楼层-->
	<div id="floor-1" class="floor">
		<div class="py-container">
			<div class="title floors">
				<h3 class="fl">第一层</h3>
				<div class="fr">
					<ul class="sui-nav nav-tabs">
						@foreach($brand as $k=>$v)
							@if($k==0)
						<li>
							<a href="{{url('/index/nav_hot/'.$v->brand_id)}}" >{{$v->brand_name}}</a>
						</li>
						@else
						<li>
							<a href="{{url('/index/nav_hot/'.$v->brand_id)}}" >{{$v->brand_name}}</a>
						</li>
						@endif
						@endforeach
					</ul>
				</div>
			</div>
			<div class="clearfix  tab-content floor-content">
				<div id="tab1" class="tab-pane active">
					<div class="yui3-g Floor-1">
						<div class="yui3-u Left blockgary">
							<ul class="jd-list">
							@foreach($brand as $k=>$v)
							  <a href="/index/goods_desc/{{$v->brand_id}}">
								<li>{{$v->brand_name}}</li>
								</a>
							@endforeach
							</ul>
							@foreach($goods as $k=>$v)
								@if($k==0)
								 <a href="/index/goods_desc/{{$v->goods_id}}">
								<img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" style="width: 187px; height: 227px;" />
								  </a>
								@endif
							@endforeach
						</div>
						<div class="yui3-u row-330 floorBanner">
							<div id="floorCarousel" data-ride="carousel" data-interval="4000" class="sui-carousel slide">
								<ol class="carousel-indicators">
									<li data-target="#floorCarousel" data-slide-to="0" class="active"></li>
									<li data-target="#floorCarousel" data-slide-to="1"></li>
									<li data-target="#floorCarousel" data-slide-to="2"></li>
								</ol>
								<div class="carousel-inner">
									@foreach($goods as $k=>$v)
										@if($k==0)
									<div class="active item">
									<a href="/index/goods_desc/{{$v->goods_id}}">
										<img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" style="width: 329px; height: 360px;" /></a>
									</div>
										@else
									<div class="item">
									<a href="/index/goods_desc/{{$v->goods_id}}">
										<img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" style="width: 329px; height: 360px;" /></a>
									</div>
										@endif
									@endforeach
								</div>
								<a href="#floorCarousel" data-slide="prev" class="carousel-control left">‹</a>
								<a href="#floorCarousel" data-slide="next" class="carousel-control right">›</a>
							</div>
						</div>
						<div class="yui3-u row-220 split">
							<span class="floor-x-line"></span>
							<div class="floor-conver-pit">
							@foreach($goods as $k=>$v)
								@if($k<=1)
								<a href="/index/goods_desc/{{$v->goods_id}}">
									<img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" style="width: 219px; height: 180px;" /></a>
								@endif
							@endforeach
							</div>
						</div>
						<div class="yui3-u row-218 split">
							@foreach($goods2 as $k=>$v)
								@if($k==0)
								<a href="/index/goods_desc/{{$v->goods_id}}">
									<img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" style="width: 218px; height: 356px;" /></a>
								@endif
							@endforeach
						</div>
						<div class="yui3-u row-220 split">
							<span class="floor-x-line"></span>
							<div class="floor-conver-pit">
							@foreach($goods2 as $k=>$v)
								@if($k<=1)		
								<a href="/index/goods_desc/{{$v->goods_id}}">
									<img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" style="width: 220px; height: 180px;" /></a>
								@endif
							@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- <div id="floor-2" class="floor">
		<div class="py-container">
			<div class="title floors">
				<h3 class="fl">手机通讯</h3>
				<div class="fr">
					<ul class="sui-nav nav-tabs">
						<li class="active">
							<a href="#tab8" data-toggle="tab">热门</a>
						</li>
						<li>
							<a href="#tab9" data-toggle="tab">品质优选</a>
						</li>
						<li>
							<a href="#tab10" data-toggle="tab">新机尝鲜</a>
						</li>
						<li>
							<a href="#tab11" data-toggle="tab">高性价比</a>
						</li>
						<li>
							<a href="#tab12" data-toggle="tab">合约机</a>
						</li>
						<li>
							<a href="#tab13" data-toggle="tab">手机卡</a>
						</li>
						<li>
							<a href="#tab14" data-toggle="tab">手机配件</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="clearfix  tab-content floor-content">
				<div id="tab8" class="tab-pane active">
					<div class="yui3-g Floor-1">
						<div class="yui3-u Left blockgary">
							<ul class="jd-list">
								<li>节能补贴</li>
								<li>4K电视</li>
								<li>空气净化器</li>
								<li>IH电饭煲</li>
								<li>滚筒洗衣机</li>
								<li>电热水器</li>
							</ul>
							<img src="/static/index/img/floor-1-1.png" />
						</div>
						<div class="yui3-u row-330 floorBanner">
							<div id="floorCarousell" data-ride="carousel" data-interval="4000" class="sui-carousel slide">
								<ol class="carousel-indicators">
									<li data-target="#floorCarousell" data-slide-to="0" class="active"></li>
									<li data-target="#floorCarousell" data-slide-to="1"></li>
									<li data-target="#floorCarousell" data-slide-to="2"></li>
								</ol>
								<div class="carousel-inner">
									<div class="active item">
										<img src="/static/index/img/floor-1-b01.png">
									</div>
									<div class="item">
										<img src="/static/index/img/floor-1-b02.png">
									</div>
									<div class="item">
										<img src="/static/index/img/floor-1-b03.png">
									</div>
								</div>
								<a href="#floorCarousell" data-slide="prev" class="carousel-control left">‹</a>
								<a href="#floorCarousell" data-slide="next" class="carousel-control right">›</a>
							</div>
						</div>
						<div class="yui3-u row-220 split">
							<span class="floor-x-line"></span>
							<div class="floor-conver-pit">
								<img src="/static/index/img/floor-1-2.png" />
							</div>
							<div class="floor-conver-pit">
								<img src="/static/index/img/floor-1-3.png" />
							</div>
						</div>
						<div class="yui3-u row-218 split">
							<img src="/static/index/img/floor-1-4.png" />
						</div>
						<div class="yui3-u row-220 split">
							<span class="floor-x-line"></span>
							<div class="floor-conver-pit">
								<img src="/static/index/img/floor-1-5.png" />
							</div>
							<div class="floor-conver-pit">
								<img src="/static/index/img/floor-1-6.png" />
							</div>
						</div>
					</div>
				</div>
				<div id="tab2" class="tab-pane">
					<p>第二个</p>
				</div>
				<div id="tab9" class="tab-pane">
					<p>第三个</p>
				</div>
				<div id="tab10" class="tab-pane">
					<p>第4个</p>
				</div>
				<div id="tab11" class="tab-pane">
					<p>第5个</p>
				</div>
				<div id="tab12" class="tab-pane">
					<p>第6个</p>
				</div>
				<div id="tab13" class="tab-pane">
					<p>第7个</p>
				</div>
				<div id="tab14" class="tab-pane">
					<p>第8个</p>
				</div>
			</div>
		</div>
	</div> -->
<div id="floor-2" class="floor">
		<div class="py-container">
			<div class="title floors">
				<h3 class="fl">第二层</h3>
				<div class="fr">
					<ul class="sui-nav nav-tabs">
						@foreach($brand as $k=>$v)
							@if($k==0)
						<li>
							<a href="{{url('/index/nav_hot/'.$v->brand_id)}}" >{{$v->brand_name}}</a>
						</li>
						@else
						<li>
							<a href="{{url('/index/nav_hot/'.$v->brand_id)}}" >{{$v->brand_name}}</a>
						</li>
						@endif
						@endforeach
					</ul>
				</div>
			</div>
			<div class="clearfix  tab-content floor-content">
				<div id="tab1" class="tab-pane active">
					<div class="yui3-g Floor-1">
						<div class="yui3-u Left blockgary">
							<ul class="jd-list">
							@foreach($brand as $k=>$v)
								<li>{{$v->brand_name}}</li>
							@endforeach
							</ul>
							@foreach($goods3 as $k=>$v)
								@if($k==0)
								<a href="/index/goods_desc/{{$v->goods_id}}">
								<img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" style="width: 187px; height: 227px;" /></a>
								@endif
							@endforeach
						</div>
						<div class="yui3-u row-330 floorBanner">
							<div id="floorCarousel" data-ride="carousel" data-interval="4000" class="sui-carousel slide">
								<ol class="carousel-indicators">
									<li data-target="#floorCarousel" data-slide-to="0" class="active"></li>
									<li data-target="#floorCarousel" data-slide-to="1"></li>
									<li data-target="#floorCarousel" data-slide-to="2"></li>
								</ol>
								<div class="carousel-inner">
									@foreach($goods3 as $k=>$v)
										@if($k==0)
									<div class="active item">
									<a href="/index/goods_desc/{{$v->goods_id}}">
										<img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" style="width: 329px; height: 360px;" /></a>
									</div>
										@else
									<div class="item">
									<a href="/index/goods_desc/{{$v->goods_id}}">
										<img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" style="width: 329px; height: 360px;" /></a>
									</div>
										@endif
									@endforeach
								</div>
								<a href="#floorCarousel" data-slide="prev" class="carousel-control left">‹</a>
								<a href="#floorCarousel" data-slide="next" class="carousel-control right">›</a>
							</div>
						</div>
						<div class="yui3-u row-220 split">
							<span class="floor-x-line"></span>
							<div class="floor-conver-pit">
							@foreach($goods3 as $k=>$v)
								@if($k<=1)
								<a href="/index/goods_desc/{{$v->goods_id}}">
									<img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" style="width: 219px; height: 180px;" /></a>
								@endif
							@endforeach
							</div>
						</div>
						<div class="yui3-u row-218 split">
							@foreach($goods4 as $k=>$v)
								@if($k==0)
								<a href="/index/goods_desc/{{$v->goods_id}}">
									<img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" style="width: 218px; height: 356px;" /></a>
								@endif
							@endforeach
						</div>
						<div class="yui3-u row-220 split">
							<span class="floor-x-line"></span>
							<div class="floor-conver-pit">
							@foreach($goods4 as $k=>$v)
								@if($k<=1)		
								<a href="/index/goods_desc/{{$v->goods_id}}">
									<img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" style="width: 220px; height: 180px;" /></a>
								@endif
							@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--商标-->
	<div class="brand">
		<div class="py-container">
			<ul class="Brand-list blockgary">
				@foreach($goods_info as $k=>$v)
				<li class="Brand-item">
				<a href="/index/goods_desc/{{$v->goods_id}}">
					<img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" style="width: 150px; height: 63px;" /></a>
				</li>
				@endforeach
			</ul>
		</div>
	</div>


@include("index.layout.foot")