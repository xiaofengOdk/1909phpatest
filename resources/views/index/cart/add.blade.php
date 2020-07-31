<link rel="stylesheet" type="text/css" href="/static/index/css/webbase.css" />
<link rel="stylesheet" type="text/css" href="/static/index/css/pages-cart.css" />
<script type="text/javascript" src="/static/index/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/static/index/js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="/static/index/js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="/static/index/js/widget/nav.js"></script>
<!--head-->
<div class="top">
	<div class="py-container">
		<div class="shortcut">
			<ul class="fl">
				<li class="f-item">品优购欢迎您！</li>
				<li class="f-item">请登录　<span><a href="#">免费注册</a></span></li>
			</ul>
			<ul class="fr">
				<li class="f-item">我的订单</li>
				<li class="f-item space"></li>
				<li class="f-item">我的品优购</li>
				<li class="f-item space"></li>
				<li class="f-item">品优购会员</li>
				<li class="f-item space"></li>
				<li class="f-item">企业采购</li>
				<li class="f-item space"></li>
				<li class="f-item">关注品优购</li>
				<li class="f-item space"></li>
				<li class="f-item">客户服务</li>
				<li class="f-item space"></li>
				<li class="f-item">网站导航</li>
			</ul>
		</div>
	</div>
</div>
<div class="cart py-container">
	<!--logoArea-->
	<div class="logoArea">
		<div class="fl logo"><span class="title">购物车</span></div>
		<div class="fr search">
			<form class="sui-form form-inline">
				<div class="input-append">
					<input type="text" class="input-error input-xxlarge"
						   style="height:30px" placeholder="品优购自营" name="goods_name" value="" />
					<input type="submit" class="sui-btn btn-xlarge btn-danger" value="搜索">
				</div>
			</form>
		</div>
		</div>
	</div>
	<div class="cart py-container">
		<!--logoArea-->

		<!--All goods-->
		<div class="allgoods">
			<h4>全部商品<span>11</span></h4>
			<div class="cart-main">
				<div class="yui3-g cart-th">
					<div class="yui3-u-1-4"><input type="checkbox" name="qx_0.2" id="check_all" value="" /> 全部</div>
					<div class="yui3-u-1-4">商品</div>
					<div class="yui3-u-1-8">单价（元）</div>
					<div class="yui3-u-1-8">数量</div>
					<div class="yui3-u-1-8">小计（元）</div>
					<div class="yui3-u-1-8">操作</div>
				</div>
				@foreach($cartinfo as $k=>$v)
				<div class="cart-item-list" id='list_one'>
					<div class="cart-body">
						<div class="cart-list"  id='ul_id'>
							<ul class="goods-list yui3-g">
								<li class="yui3-u-1-24">
									<input type="checkbox" name="qx_0.1" id="" value="" />
								</li>
								<li class="yui3-u-11-24">
									<div class="good-item">
										<div class="item-img"><img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" /></div>
										<div class="item-msg">{{$v->goods_name}}</div>

									</div>
								</li>
								<li class="yui3-u-1-8"><span class="price">{{$v->goods_price}}</span></li>
								<li class="yui3-u-1-8">
									<a href="javascript:void(0)" class="increment mins" id="num_jian" cary_id="{{$v->cary_id}}" sku_id="{{$v->id}}">-</a>
									<input autocomplete="off" type="text" id='vl' cary_id="{{$v->cary_id}}" sku_id="{{$v->id}}" value="{{$v->buy_number}}" minnum="1" class="itxt" />
									<a href="javascript:void(0)" class="increment plus" id="num_jia" cary_id="{{$v->cary_id}}" sku_id="{{$v->id}}">+</a>
									<span class="tishi" style="display:none; color:red;">缺货</span>
								</li>
								<li class="yui3-u-1-8"><span class="sum" id='num_zong'>
										{{$v['buy_number']*$v['goods_price']}}
									</span>
								</li>
								<li class="yui3-u-1-8">
									<a href="#none">删除</a><br />
									<a href="#none">移到我的关注</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				@endforeach
			</div>

			<div class="cart-tool">
				<div class="select-all">
					<input type="checkbox"  name="qx_0.2" id="check_all_s" value="" />
					<span>全选</span>
				</div>
				<div class="option">
					<a href="#none">删除选中的商品</a>
					<a href="#none">移到我的关注</a>
					<a href="#none">清除下柜商品</a>
				</div>
				<div class="toolbar">
					<div class="chosed">已选择<span id="zsl">0</span>件商品</div>
					<div class="sumprice">
						<span><em>总价（不含运费） ：</em><i class="summoney" id="zj">¥0</i></span>
						<span><em>已节省：</em><i>-¥20.00</i></span>
					</div>
					<div class="sumbtn">
						<a class="sum-btn" href="#" target="_blank">结算</a>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="deled">
				<span>已删除商品，您可以重新购买或加关注：</span>
				<div class="cart-list del" style="height: 40px;width: 1200px;">
					<ul class="goods-list yui3-g">
						<li class="yui3-u-1-2">
							<div class="good-item">
								<div class="item-msg">Apple Macbook Air 13.3英寸笔记本电脑 银色（Corei5）处理器/8GB内存</div>
							</div>
						</li>
						<li class="yui3-u-1-6"><span class="price">8848.00</span></li>
						<li class="yui3-u-1-6">
							<span class="number">1</span>
						</li>
						<li class="yui3-u-1-8">
							<a href="#none">重新购买</a>
							<a href="#none">移到我的关注</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="liked">
				<ul class="sui-nav nav-tabs">
					<li class="active">
						<a href="#index" data-toggle="tab">猜你喜欢</a>
					</li>
					<li>
						<a href="#profile" data-toggle="tab">特惠换购</a>
					</li>
				</ul>
				<div class="clearfix"></div>
				<div class="tab-content">
					<div id="index" class="tab-pane active">
						<div id="myCarousel" data-ride="carousel" data-interval="4000" class="sui-carousel slide">
							<div class="carousel-inner">

								<div class="active item">
									<ul>
										@foreach($history_goods as $kk=>$vv)
										<li>
											<img src="/static/index/img/like1.png" />
											<div class="intro">
												<i>Apple苹果iPhone 6s (A1699)</i>
											</div>
											<div class="money">
												<span>$29.00</span>
											</div>
											<div class="incar">
												<a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
											</div>
										</li>
										@endforeach
									</ul>
								</div>
							</div>
							<a href="#myCarousel" data-slide="prev" class="carousel-control left">‹</a>
							<a href="#myCarousel" data-slide="next" class="carousel-control right">›</a>
						</div>
					</div>
					<div id="profile" class="tab-pane">
						<p>特惠选购</p>
					</div>
				</div>
			</div>
		</div>
	</div>

<script>
	//减
	$(document).on('click','#num_jian',function(){
		var ts=$(this);
		var cary_id=$(this).attr('cary_id');
		var id=$(this).attr('sku_id');
		var zz=/^\d{1,}$/;
		var f1=false;
//		console.log(cary_id,id);
		if(!zz.test(cary_id)||cary_id<=0){
			console.log('cary_id获取失败');
			f1=false;
		}else{
			f1=true;
		}
		var f2=false;
		if(!zz.test(id)||id<=0){
			console.log('id获取失败');
			f2=false;
		}else{
			f2=true;
		}
		if(f1==true&&f2==true){
			$.ajax({
				url:'/index/cart_num',
				type:'post',
				dataType:'json',
				data:{'cary_id':cary_id,'id':id,'num_jian':'num_jian'},
				success:function(jk_n){
					if(jk_n.a1==0){
						ts.parent().find('#vl').val(jk_n.a3['jk_1']);
						ts.parents("#ul_id").find('#num_zong').text(jk_n.a3['jk_2']);
					}
					instant_price();
					console.log(jk_n.a2);
				}
			});
			console.log(cary_id,id);
		}
	});
	//加
	$(document).on('click','#num_jia',function(){
		var ts=$(this);
		var cary_id=$(this).attr('cary_id');
		var id=$(this).attr('sku_id');
		var zz=/^\d{1,}$/;
		var f1=false;
//		console.log(cary_id,id);
		if(!zz.test(cary_id)||cary_id<=0){
			console.log('cary_id获取失败');
			f1=false;
		}else{
			f1=true;
		}
		var f2=false;
		if(!zz.test(id)||id<=0){
			console.log('id获取失败');
			f2=false;
		}else{
			f2=true;
		}
		if(f1==true&&f2==true){
			$.ajax({
				url:'/index/cart_num',
				type:'post',
				dataType:'json',
				data:{'cary_id':cary_id,'id':id,'num_jian':'num_jia'},
				success:function(jk_n){
					if(jk_n.a1==0){
						ts.parent().find('#vl').val(jk_n.a3['jk_1']);
						ts.parents("#ul_id").find('#num_zong').text(jk_n.a3['jk_2']);
					}
					instant_price();
					if(jk_n.code=='00009'){
						ts.next("span").show()
					}
//					console.log(jk_n.a2);
				}
			});
			console.log(cary_id,id);
		}
	});
	//修改中间的数字
	$(document).on('blur','#vl',function(){
		var ts=$(this);
		var cary_id=$(this).attr('cary_id');
		var sku_id=$(this).attr('sku_id');
		var goods_store=$(this).val();
		var zz=/^\d{1,}$/;
		var f1=false;
		if(!zz.test(cary_id)||cary_id<=0){
			console.log('cary_id获取失败');
			f1=false;
		}else{
			f1=true;
		}
		if(!zz.test(goods_store)||goods_store<=0){
			goods_store=1;
		}
		if(f1==true){
			$.ajax({
				url:'/index/cart_nums',
				type:'post',
				dataType:'json',
				data:{'cary_id':cary_id,'goods_store':goods_store,'sku_id':sku_id},
				success:function(jk_y_vl){
					if(jk_y_vl.a1==0){
						ts.parent().find('#vl').val(jk_y_vl.a3['jk_1']);
						ts.parents("#ul_id").find('#num_zong').text(jk_y_vl.a3['jk_2']);
					}
					instant_price();
					console.log(jk_y_vl.a2);
				}
			});
		}
		console.log(cary_id,goods_store);
	});
	//点击全选选中
	$(document).on('click','#check_all,#check_all_s',function(){
		var sf=$(this).prop('checked');
//		console.log(sf);
		$("[type='checkbox'][name='qx_0.1']").prop('checked',sf);
		$("[type='checkbox'][name='qx_0.2']").prop('checked',sf);
		instant_price();
		// console.log(sf);
	});
	//点击每件商品复选框
	$(document).on('click',"[type='checkbox'][name='qx_0.1']",function(){
		instant_price();
	});


	//计算被选中商品总数,总价
	function instant_price(){
		var sf=0;
		var quantity=0;
		var price=0;
		$("[type='checkbox'][name='qx_0.1']:checked").each(function(index, el) {
			var q_ty=$(this).parents("#list_one").find('#vl').val();
			var q_ty_vl=parseInt(q_ty);
			quantity=quantity+q_ty_vl;
			var p_ce=$(this).parents("#list_one").find('#num_zong').text();
			var p_ce_vl=parseInt(p_ce);
			price=price+p_ce_vl;

			sf=sf+1;
		});
		if(sf==0){
			$("#check_all").prop('checked',false);
			$("#check_all_s").prop('checked',false);
		}
		$("#zsl").text(quantity);
		$("#zj").text('￥:'+price);
		console.log(quantity,price);
	}

</script>