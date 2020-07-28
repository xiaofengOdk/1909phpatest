@extends("index.layout.public")
@include("index.layout.top")
@section("content")
<link rel="stylesheet" type="text/css" href="/static/index/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/static/index/css/pages-item.css" />
    <link rel="stylesheet" type="text/css" href="/static/index/css/pages-zoom.css" />
    <link rel="stylesheet" type="text/css" href="/static/index/css/widget-cartPanelView.css" />
	<div class="py-container">
		<div id="item">
			<div class="crumb-wrap">
				<ul class="sui-breadcrumb">
					<li>
						<a href="#">手机、数码、通讯</a>
					</li>
					<li>
						<a href="#">手机</a>
					</li>
					<li>
						<a href="#">Apple苹果</a>
					</li>
					<li class="active">iphone 6S系类</li>
				</ul>
			</div>
			<!--product-info-->
			<div class="product-info">
				<div class="fl preview-wrap">
					<!--放大镜效果-->
					<div class="zoom">
						<!--默认第一个预览-->
						<div id="preview" class="spec-preview">

							<span class="jqzoom"><img jqimg="{{env('UPLOADS_URL')}}{{$goodsInfo->goods_img}}" src="{{env('UPLOADS_URL')}}{{$goodsInfo->goods_img}}"  style="width:412px; height: 412px; " /></span>
						</div>
						<!--下方的缩略图-->
						<div class="spec-scroll">
							<a class="prev">&lt;</a>
							<!--左右按钮-->
							<div class="items">
								<ul>
									 @php $goods_imgs = explode("|",$goodsInfo['goods_imgs']); @endphp   
									@foreach($goods_imgs as $v)
									<li><img src="{{env('UPLOAD_URL')}}{{$v}}" bimg="{{env('UPLOAD_URL')}}{{$v}}" onmousemove="preview(this)" /></li>
									@endforeach
								</ul>
							</div>
							<a class="next">&gt;</a>
						</div>
					</div>
				</div>
				<div class="fr itemInfo-wrap">
					<div class="sku-name">
						<h4>{{$goodsInfo['goods_name']}}</h4>
					</div>
					<div class="news"><span>推荐选择下方[优惠购] 买买买卖买买</span></div>
					<div class="summary">
						<div class="summary-wrap">
							<div class="fl title">
								<i>价　　格</i>
							</div>
							<div class="fl price">
								<i>¥</i>
								<em>{{$goodsInfo['goods_price']}}</em>
								<span>降价通知</span>
							</div>
							<div class="fr remark">
								<i>商品积分</i><em style="color: red; font-size: 20px;">{{$goodsInfo['goods_store']}}</em>
							</div>
						</div>
						<div class="summary-wrap">
							<div class="fl title">
								<i>促　　销</i>
							</div>
							<div class="fl fix-width">
								<i class="red-bg">加价购</i>
								<em class="t-gray">购买此商品，即可获得<em style="color: red; font-size: 20px;">{{$goodsInfo['goods_store']}}</em>积分，购买商品时，可用积分抵消</em>
							</div>
						</div>
					</div>
					<div class="support">
						<div class="summary-wrap">
							<div class="fl title">
								<i>配 送 至</i>
							</div>
							<div class="fl fix-width">
								<em class="t-gray">满999.00另加20.00元，或满1999.00另加30.00元，或满2999.00另加40.00元，即可在购物车换购热销商品</em>
							</div>
						</div>
					</div>
					<div class="clearfix choose">
						<div id="specification" class="summary-wrap clearfix" style="text-align:center;">
						@foreach($attr as $k=>$v)	
						<div style="text-align:center;">
							<dl >							
								<dt >
									<div class="fl title" >
									<i>{{$v->attr_name}}</i>
									</div>
								</dt>
								<!-- <br> -->
									@foreach($attrval as $kk=>$vv)
										@if($v->attr_id==$vv->attr_id)
											@if($kk==0)
								<dd>
									<a href="javascript:;" class="selected">{{$vv->attrval_name}}<span title="点击取消选择">&nbsp;</span>
									</a>
								</dd>
<<<<<<< HEAD
								<dd><a href="javascript:;">移动版</a></dd>
							</dl>
							<dl>
								<dt>
									<div class="fl title">
									<i>购买方式</i>
								</div>
								</dt>
=======
											@else
>>>>>>> 125ef5eab3a1c3360bce21fe7e577fe40e10f07d
								<dd>
									<a href="javascript:;" >{{$vv->attrval_name}}<span title="点击取消选择">&nbsp;</span>
									</a>
								</dd>
<<<<<<< HEAD
								<dd><a href="javascript:;">移动优惠版</a></dd>
								<dd><a href="javascript:;"  class="locked">电信优惠版</a></dd>
							</dl>
							<dl>
								<dt>
									<div class="fl title">
									<i>套　　装</i>
								</div>
								</dt>
								<dd>
									<a href="javascript:;" class="selected">保护套装<span title="点击取消选择">&nbsp;</span>
									</a>
								</dd>
								<dd><a href="javascript:;"  class="locked">充电套装</a></dd>

							</dl>
						</div>
=======
												@endif
										@endif
									@endforeach
							</dl>
							</div>
							@endforeach
						</div>	
>>>>>>> 125ef5eab3a1c3360bce21fe7e577fe40e10f07d
						<div class="summary-wrap">
							<div class="fl title">
								<div class="control-group">
									<div class="controls">
										<input autocomplete="off" type="text" value="1" minnum="1"   class="itxt"style="padding-right:10px; " />
										<a href="javascript:void(0)" class="increment plus" style="padding-right:10px; ">+</a>
										<a href="javascript:void(0)" class="increment mins" style="padding-right:10px; ">-</a>
									</div>
								</div>
							</div>
							<div class="fl">
								<ul class="btn-choose unstyled">
									<li>
										<a href="cart.html" target="_blank" class="sui-btn  btn-danger addshopcar">加入购物车</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--product-detail-->
			<div class="clearfix product-detail">
				<div class="fl aside">
					<ul class="sui-nav nav-tabs tab-wraped">
						<li class="active">
							<a href="#index" data-toggle="tab">
								<span>相关分类</span>
							</a>
						</li>
						<li>
							<a href="#profile" data-toggle="tab">
								<span>推荐品牌</span>
							</a>
						</li>
					</ul>
					<div class="tab-content tab-wraped">
						<div id="index" class="tab-pane active">
							<ul class="part-list unstyled">
									@foreach($brand as $k=>$v)
								<li>{{$v->brand_name}}</li>
									@endforeach
							</ul>
							<ul class="goods-list unstyled">
								<li>
									@foreach($goods_hot as $k=>$v)
									<div class="list-wrap">
										<div class="p-img">
											<img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" style="width: 150px;height: 255px;" />
										</div>
										<div class="attr">
											<em>{{$v->goods_name}}</em>
										</div>
										<div class="price">
											<strong>
											<em>¥</em>
											<i>{{$v->goods_price}}</i>
										</strong>
										</div>
										<div class="operate">
											<a href="javascript:void(0);" class="sui-btn btn-bordered"  style="height: 24px; font-size: 12px;">加入购物车</a>
										</div>
									</div>
									@endforeach
								</li>
							</ul>
						</div>
						<div id="profile" class="tab-pane">
							@foreach($goods_hot as $k=>$v)
							<div class="list-wrap">
										<div class="p-img">
											<img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" />
										</div>
										<div class="attr">
											<em>{{$v->goods_name}}</em>
										</div>
										<div class="price">
											<strong>
											<em>¥</em>
											<i>{{$v->goods_price}}</i>
										</strong>
										</div>
										<div class="operate">
											<a href="javascript:void(0);" class="sui-btn btn-bordered" style="height: 24px;">加入购物车</a>
										</div>
									</div>
									@endforeach
						</div>
					</div>
				</div>
				<div class="fr detail">
					<div class="clearfix fitting">
						<h4 class="kt">选择搭配</h4>
						<div class="good-suits">
							<div class="fl master">
								<div class="list-wrap">
									<div class="p-img">
										<img src="/static/index/img/_/l-m01.png" />
									</div>
									<em>￥5299</em>
									<i>+</i>
								</div>
							</div>
							<div class="fl suits">
								<ul class="suit-list">
									<li class="">
										<div id="">
											<img src="/static/index/img/_/dp01.png" />
										</div>
										<i>Feless费勒斯VR</i>
										<label data-toggle="checkbox" class="checkbox-pretty">
 										   <input type="checkbox"><span>39</span>
  										</label>
									</li>
									<li class="">
										<div id=""><img src="/static/index/img/_/dp02.png" /> </div>
										<i>Feless费勒斯VR</i>
										<label data-toggle="checkbox" class="checkbox-pretty">
    <input type="checkbox"><span>50</span>
  </label>
									</li>
									<li class="">
										<div id=""><img src="/static/index/img/_/dp03.png" /></div>
										<i>Feless费勒斯VR</i>
										<label data-toggle="checkbox" class="checkbox-pretty">
    <input type="checkbox"><span>59</span>
  </label>
									</li>
									<li class="">
										<div id=""><img src="/static/index/img/_/dp04.png" /></div>
										<i>Feless费勒斯VR</i>
										<label data-toggle="checkbox" class="checkbox-pretty">
    <input type="checkbox"><span>99</span>
  </label>
									</li>
								</ul>
							</div>
							<div class="fr result">
								<div class="num">已选购0件商品</div>
								<div class="price-tit"><strong>套餐价</strong></div>
								<div class="price">￥5299</div>
								<button class="sui-btn  btn-danger addshopcar">加入购物车</button>
							</div>
						</div>
					</div>
					<div class="tab-main intro">
						<ul class="sui-nav nav-tabs tab-wraped">
							<li class="active">
								<a href="#one" data-toggle="tab">
									<span>商品介绍</span>
								</a>
							</li>
							<li>
								<a href="#two" data-toggle="tab">
									<span>规格与包装</span>
								</a>
							</li>
							<li>
								<a href="#three" data-toggle="tab">
									<span>售后保障</span>
								</a>
							</li>
							<li>
								<a href="#four" data-toggle="tab">
									<span>商品评价</span>
								</a>
							</li>
							<li>
								<a href="#five" data-toggle="tab">
									<span>手机社区</span>
								</a>
							</li>
						</ul>
						<div class="clearfix"></div>
						<div class="tab-content tab-wraped">
							<div id="one" class="tab-pane active">
								<ul class="goods-intro unstyled">
									<li>分辨率：1920*1080(FHD)</li>
									<li>后置摄像头：1200万像素</li>
									<li>前置摄像头：500万像素</li>
									<li>核 数：其他</li>
									<li>频 率：以官网信息为准</li>
									<li>品牌： Apple</li>
									<li>商品名称：APPLEiPhone 6s Plus</li>
									<li>商品编号：1861098</li>
									<li>商品毛重：0.51kg</li>
									<li>商品产地：中国大陆</li>
									<li>热点：指纹识别，Apple Pay，金属机身，拍照神器</li>
									<li>系统：苹果（IOS）</li>
									<li>像素：1000-1600万</li>
									<li>机身内存：64GB</li>
								</ul>
								<div class="intro-detail">
									<img src="/static/index/img/_/intro01.png" />
									<img src="/static/index/img/_/intro02.png" />
									<img src="/static/index/img/_/intro03.png" />
								</div>
							</div>
							<div id="two" class="tab-pane">
								<p>规格与包装</p>
							</div>
							<div id="three" class="tab-pane">
								<p>售后保障</p>
							</div>
							<div id="four" class="tab-pane">
								<p>商品评价</p>
							</div>
							<div id="five" class="tab-pane">
								<p>手机社区</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--like-->
			<div class="clearfix"></div>
			<div class="like">
				<h4 class="kt">猜你喜欢</h4>
				<div class="like-list">
					<ul class="yui3-g">
						<li class="yui3-u-1-6">
							<div class="list-wrap">
								<div class="p-img">
									<img src="/static/index/img/_/itemlike01.png" />
								</div>
									<p>
										<div class="attr">
											<em>DELL戴尔Ins 15MR-7528SS 15英寸 银色 笔记本</em>
										</div>
									</p>
								<p>
									<div class="price">
										<strong>
												<em>¥</em>
												<i>3699.00</i>
										</strong>
									</div>
								</p>
								<p>
									<div class="commit">
										<i class="command">已有6人评价</i>
									</div>
								</p>

							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--侧栏面板开始-->
<div class="J-global-toolbar">
	<div class="toolbar-wrap J-wrap">
		<div class="toolbar">
			<div class="toolbar-panels J-panel">

				<!-- 购物车 -->
				<div style="visibility: hidden;" class="J-content toolbar-panel tbar-panel-cart toolbar-animate-out">
					<h3 class="tbar-panel-header J-panel-header">
						<a href="" class="title"><i></i><em class="title">购物车</em></a>
						<span class="close-panel J-close" onclick="cartPanelView.tbar_panel_close('cart');" ></span>
					</h3>
					<div class="tbar-panel-main">
						<div class="tbar-panel-content J-panel-content">
							<div id="J-cart-tips" class="tbar-tipbox hide">
								<div class="tip-inner">
									<span class="tip-text">还没有登录，登录后商品将被保存</span>
									<a href="#none" class="tip-btn J-login">登录</a>
								</div>
							</div>
							<div id="J-cart-render">
								<!-- 列表 -->
								<div id="cart-list" class="tbar-cart-list">
								</div>
							</div>
						</div>
					</div>
					<!-- 小计 -->
					<div id="cart-footer" class="tbar-panel-footer J-panel-footer">
						<div class="tbar-checkout">
							<div class="jtc-number"> <strong class="J-count" id="cart-number">0</strong>件商品 </div>
							<div class="jtc-sum"> 共计：<strong class="J-total" id="cart-sum">¥0</strong> </div>
							<a class="jtc-btn J-btn" href="#none" target="_blank">去购物车结算</a>
						</div>
					</div>
				</div>

				<!-- 我的关注 -->
				<div style="visibility: hidden;" data-name="follow" class="J-content toolbar-panel tbar-panel-follow">
					<h3 class="tbar-panel-header J-panel-header">
						<a href="#" target="_blank" class="title"> <i></i> <em class="title">我的关注</em> </a>
						<span class="close-panel J-close" onclick="cartPanelView.tbar_panel_close('follow');"></span>
					</h3>
					<div class="tbar-panel-main">
						<div class="tbar-panel-content J-panel-content">
							<div class="tbar-tipbox2">
								<div class="tip-inner"> <i class="i-loading"></i> </div>
							</div>
						</div>
					</div>
					<div class="tbar-panel-footer J-panel-footer"></div>
				</div>

				<!-- 我的足迹 -->
				<div style="visibility: hidden;" class="J-content toolbar-panel tbar-panel-history toolbar-animate-in">
					<h3 class="tbar-panel-header J-panel-header">
						<a href="#" target="_blank" class="title"> <i></i> <em class="title">我的足迹</em> </a>
						<span class="close-panel J-close" onclick="cartPanelView.tbar_panel_close('history');"></span>
					</h3>
					<div class="tbar-panel-main">
						<div class="tbar-panel-content J-panel-content">
							<div class="jt-history-wrap">
								<ul>
									<!--<li class="jth-item">
										<a href="#" class="img-wrap"> <img src=".portal//static/index/img/like_03.png" height="100" width="100" /> </a>
										<a class="add-cart-button" href="#" target="_blank">加入购物车</a>
										<a href="#" target="_blank" class="price">￥498.00</a>
									</li>
									<li class="jth-item">
										<a href="#" class="img-wrap"> <img src="portal//static/index/img/like_02.png" height="100" width="100" /></a>
										<a class="add-cart-button" href="#" target="_blank">加入购物车</a>
										<a href="#" target="_blank" class="price">￥498.00</a>
									</li>-->
								</ul>
								<a href="#" class="history-bottom-more" target="_blank">查看更多足迹商品 &gt;&gt;</a>
							</div>
						</div>
					</div>
					<div class="tbar-panel-footer J-panel-footer"></div>
				</div>

			</div>

			<div class="toolbar-header"></div>

			<!-- 侧栏按钮 -->
			<div class="toolbar-tabs J-tab">
				<div onclick="cartPanelView.tabItemClick('cart')" class="toolbar-tab tbar-tab-cart" data="购物车" tag="cart" >
					<i class="tab-ico"></i>
					<em class="tab-text"></em>
					<span class="tab-sub J-count " id="tab-sub-cart-count">0</span>
				</div>
				<div onclick="cartPanelView.tabItemClick('follow')" class="toolbar-tab tbar-tab-follow" data="我的关注" tag="follow" >
					<i class="tab-ico"></i>
					<em class="tab-text"></em>
					<span class="tab-sub J-count hide">0</span>
				</div>
				<div onclick="cartPanelView.tabItemClick('history')" class="toolbar-tab tbar-tab-history" data="我的足迹" tag="history" >
					<i class="tab-ico"></i>
					<em class="tab-text"></em>
					<span class="tab-sub J-count hide">0</span>
				</div>
			</div>

			<div class="toolbar-footer">
				<div class="toolbar-tab tbar-tab-top" > <a href="#"> <i class="tab-ico  "></i> <em class="footer-tab-text">顶部</em> </a> </div>
				<div class="toolbar-tab tbar-tab-feedback" > <a href="#" target="_blank"> <i class="tab-ico"></i> <em class="footer-tab-text ">反馈</em> </a> </div>
			</div>

			<div class="toolbar-mini"></div>

		</div>

		<div id="J-toolbar-load-hook"></div>

	</div>
</div>
<!--购物车单元格 模板-->
<script type="text/template" id="tbar-cart-item-template">
	<div class="tbar-cart-item" >
		<div class="jtc-item-promo">
			<em class="promo-tag promo-mz">满赠<i class="arrow"></i></em>
			<div class="promo-text">已购满600元，您可领赠品</div>
		</div>
		<div class="jtc-item-goods">
			<span class="p-img"><a href="#" target="_blank"><img src="{2}" alt="{1}" height="50" width="50" /></a></span>
			<div class="p-name">
				<a href="#">{1}</a>
			</div>
			<div class="p-price"><strong>¥{3}</strong>×{4} </div>
			<a href="#none" class="p-del J-del">删除</a>
		</div>
	</div>
</script>
</body>

</html>
@include("index.layout.foot")
@endsection
