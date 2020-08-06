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
				<li class="f-item space"></li>
				<li class="f-item"><a href="http://www.1909a3.com/user/answer"style="text-decoration: none; color:black;" >网站导航</a></li>
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
			{{--<h4>全部商品<span>11</span></h4>--}}
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
									<input type="checkbox" name="qx_0.1" cary_id="{{$v['cary_id']}}" id="" value="{{$v['goods_id']}}" />
								</li>
								<li class="yui3-u-11-24">
									<div class="good-item">
										<div class="item-img"><img src="{{env('UPLOADS_URL')}}{{$v['goods_img']}}" /></div>
										<div class="item-msg">
											<a href="{{url('/index/goods_desc',$v['goods_id'])}}">{{$v['goods_name']}}</a>
										</div>

									</div>
								</li>
								<li class="yui3-u-1-8"><span class="price">{{$v['goods_price']}}</span></li>
								<li class="yui3-u-1-8">
									<a href="javascript:void(0)" class="increment mins" id="num_jian" cary_id="{{$v['cary_id']}}" sku_id="{{$v['id']}}">-</a>
									<input autocomplete="off" type="text" id='vl' cary_id="{{$v['cary_id']}}" sku_id="{{$v['id']}}" value="{{$v['buy_number']}}" minnum="1" class="itxt" />
									<a href="javascript:void(0)" class="increment plus" id="num_jia" cary_id="{{$v['cary_id']}}" sku_id="{{$v['id']}}">+</a>
									<span class="tishi" style="display:none; color:red;">缺货</span>
								</li>
								<li class="yui3-u-1-8"><span class="sum" id='num_zong'>
										{{$v['buy_number']*$v['goods_price']}}
									</span>
								</li>
								<li class="yui3-u-1-8">
									<a href="#none" cary_id="{{$v['cary_id']}}" id="del_one">删除</a>
									{{--<br />--}}
									{{--<a href="#none">移到我的关注</a>--}}
								</li>
							</ul>
						</div>
					</div>
				</div>
				@endforeach
				<span id="list_new">&nbsp;</span>
			</div>

			<div class="cart-tool">
				<div class="select-all">
					<input type="checkbox"  name="qx_0.2" id="check_all_s" value="" />
					<span>全选</span>
				</div>
				<div class="option">
					<a href="#none" id="del_all">删除选中的商品</a>
					{{--<a href="#none">移到我的关注</a>--}}
					{{--<a href="#none">清除下柜商品</a>--}}
				</div>
				<div class="toolbar">
					<div class="chosed">已选择<span id="zsl">0</span>件商品</div>
					<div class="sumprice">
						<span>
							<em>总价（不含运费）</em>
							<i class="summoney" id="zj" >0</i>
						</span>
						{{--<span><em>已节省：</em><i>-¥20.00</i></span>--}}
					</div>
					<div class="sumbtn">
						<a class="sum-btn" href="javascript:;"  id="suanzhang">结算</a>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="deled">
				<span id="del_list">已删除商品，您可以重新购买或加关注：</span>
				@foreach($dels_vl as $kkk=>$vvv)
				<div class="cart-list del" id="eva_886" style="height: 40px;width: 1200px;">
					<ul class="goods-list yui3-g">
						<li class="yui3-u-1-2">
							<div class="good-item">
								<div class="item-msg">{{$vvv['goods_id']['goods_name']}}
									&nbsp;
									@foreach($vvv['id']['sku'] as $e_n1=>$e_n2)
										@if($e_n1=='0')
											{{'/'.$e_n2['attrval_name'].'/'}}
										@else
											{{$e_n2['attrval_name'].'/'}}
										@endif
									@endforeach
								</div>
							</div>
						</li>
						<li class='yui3-u-1-6'>
							<span class='price'>单价: {{$vvv['goods_price_one']}}</span>
						</li>
						<li class='yui3-u-1-6'>
							<span class='number'>数量:{{$vvv['buy_number']}}&nbsp;&nbsp;&nbsp;&nbsp;
								总价:{{$vvv['goods_totall']}}</span>
						</li>
						<li class="yui3-u-1-8">
							<a href="javascript:;" id='del_new' cary_id="{{$vvv['cary_id']}}">重新购买</a>
							&nbsp;&nbsp;&nbsp;
							<a href='#none' id='del_yes' cary_id="{{$vvv['cary_id']}}">删除本记录</a>
						</li>
					</ul>
				</div>
				@endforeach

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
											<img src="{{env('UPLOADS_URL')}}{{$vv->goods_img}}" />
											<div class="intro">
												<i>{{$vv->goods_name}}</i>
											</div>
											<div class="money">
												<span>{{$vv->goods_price}}</span>
											</div>
											<div class="incar">
												<a href="/index/goods_desc/{{$vv->goods_id}}"
												   class="sui-btn btn-bordered btn-xlarge btn-default">
													<i class="car"></i><span class="cartxt">查看详情</span>
												</a>
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
	//删除
	$(document).on('click','#del_one',function(){
		var cary_id=$(this).attr('cary_id');
		var data={};
		data.cary_id=cary_id;
		var url="/index/cart_del";
		if(window.confirm("确认删除？")){
			$.ajax({
				url:url,
				data:data,
				type:'post',
				dataType:'json',
				success:function(result){
					if(result['code']==200){
						alert(result['msg']);
						location.href=result['url'];
					}else{
						alert(result['msg']);
						location.href=result['url'];
					}
				}
			})
		}
	});
	//批量删除
	$(document).on('click','#del_all',function(){
		var jk_num=0;
		var cary_id='';
		$("[type='checkbox'][name='qx_0.1']:checked").each(function(index, el) {
			var vl_a=$(this).attr("cary_id");
			var vl_a_vl=parseInt(vl_a);
			cary_id+=vl_a_vl+',';
			jk_num=jk_num+1;
		});
		var cd=cary_id.length;
		var cary_id=cary_id.substr(0,cd-1);
		if(jk_num>0){
			$.ajax({
				url:'/index/cart_dels',
				type:'post',
				dataType:'json',
				data:{'cary_id':cary_id},
				success:function(jk_dels){
					if(jk_dels.a1==0){
						$("[type='checkbox'][name='qx_0.1']:checked").each(function(index, el) {
							var vl_a=$(this).parents("#list_one").remove();
						});
						for(var p_uj=0;p_uj<=jk_dels.a4-1;p_uj++){
							var name_s='';
							var sku_s=jk_dels.a3[p_uj]['id']['sku'];
							var cd=sku_s.length;
							for(var js_1=0;js_1<=cd-1;js_1++){
								if(js_1==0){
									name_s=name_s+'/'+jk_dels.a3[p_uj]['id']['sku'][js_1]['attrval_name']+'/';
								}else{
									name_s=name_s+jk_dels.a3[p_uj]['id']['sku'][js_1]['attrval_name']+'/';
								}
							}
							var del_one="<div style='height: 40px;width: 1200px;'" +
									" class='cart-list del'  id='id='eva_886'><ul class='goods-list yui3-g'>" +
									"<li class='yui3-u-1-2'><div class='good-item'>" +
									"<div class='item-msg'>"+jk_dels.a3[p_uj]['goods_id']['goods_name']+'&nbsp;'+name_s+"</div>" +
									"</div></li><li class='yui3-u-1-6'><span class='price'>单价: "+jk_dels.a3[p_uj]['goods_price_one']+"</span>" +
									"</li><li class='yui3-u-1-6'><span class='number'>数量:"+jk_dels.a3[p_uj]['buy_number']+'&nbsp;&nbsp;&nbsp;&nbsp;' +
									'总价:'+jk_dels.a3[p_uj]['goods_totall']+"</span></li><li class='yui3-u-1-8'>&nbsp;&nbsp;&nbsp;" +
									"<a href='#none' id='del_new' trolley_id='"+jk_dels.a3[p_uj]['cary_id']+"'>重新购买</a>&nbsp;&nbsp;&nbsp;" +
									"<a href='#none' id='del_yes' cary_id='"+jk_dels.a3[p_uj]['cary_id']+"'>删除本记录</a></li></ul></div>";
							$("#del_list").append(del_one);
						}
					}
					instant_price();
					console.log(jk_dels.a2);
				}
			});
		}
	});
	//重新加入购物车
	$(document).on('click','#del_new',function(){
		var ts=$(this);
		var cary_id=$(this).attr('cary_id');
		var zz=/^\d{1,}$/;
		if(!zz.test(cary_id)||cary_id<=0){
			console.log('cary_id获取失败');
		}else{
			$.ajax({
				url:'/index/cart_num_del_new',
				type:'post',
				dataType:'json',
				data:{'cary_id':cary_id},
				success:function(jk_new){
					if(jk_new.a1==0){
						var name_s='';
						var sku_s=jk_new.a3[0]['id']['sku'];
						var cd=sku_s.length;
						for(var js_1=0;js_1<=cd-1;js_1++){
							if(js_1==0){
								name_s=name_s+'/'+jk_new.a3[0]['id']['sku'][js_1]['attrval_name']+'/';
							}else{
								name_s=name_s+jk_new.a3[0]['id']['sku'][js_1]['attrval_name']+'/';
							}
						}
//						ts.parents(".cart-list del").remove();
//
//						var new_one="" +
//								"<div class='cart-list' id='list_one'>" +
//								"<ul class='goods-list yui3-g' id='ul_id'>" +
//								"<li class='yui3-u-1-24'>" +
//								"<input type='checkbox' name='ck_jb0528' trolley_id='"+jk_new.a3[0]['cary_id']+"' id='' value='' />" +
//								"</li><li class='yui3-u-11-24'><div class='good-item'><div class='item-img'>" +
//								"<img style='width:82px;height:82px;' src='"+jk_new.a3[0]['goods_id']['goods_img']+"' />" +
//								"</div><div class='item-msg'>"+jk_new.a3[0]['goods_id']['goods_name']+'&nbsp;'+name_s+"</div>" +
//								"</div></li><li class='yui3-u-1-8'><span class='price'>"+jk_new.a3[0]['goods_price_one']+"</span>" +
//								"</li><li class='yui3-u-1-8'>" +
//								"<a href='javascript:void(0)' class='increment mins' property_id='"+jk_new.a3[0]['id']['id']+"' cary_id='"+jk_new.a3[0]['cary_id']+"' id='num_n'>" +
//								"-</a><input autocomplete='off' type='text' id='vl' cary_id='"+jk_new.a3[0]['cary_id']+"' value='"+jk_new.a3[0]['buy_number']+"' class='itxt' />" +
//								"<a href='javascript:void(0)' class='increment plus' property_id='"+jk_new.a3[0]['id']['id']+"' cary_id='"+jk_new.a3[0]['cary_id']+"' id='num_y'>+" +
//								"</a></li><li class='yui3-u-1-8'>" +
//								"<span class='sum' id='num_zong'>"+jk_new.a3[0]['goods_price_one']*jk_new.a3[0]['buy_number']+"</span>" +
//								"</li><li class='yui3-u-1-8'>" +
//								"<a href='#none' id='cat_del' cary_id='"+jk_new.a3[0]['cary_id']+"'>删除</a><br /></li></ul></div>";
//						$("#list_new").prepend(new_one);
						location.replace(location.href);
					}
					console.log(jk_new.a2);
				}
			});
		}
	});
	//彻底删除
	$(document).on('click','#del_yes',function(){
		var cary_id=$(this).attr('cary_id');
		var data={};
		data.cary_id=cary_id;
		var url="/index/cart_delds";
		if(window.confirm("确认删除？")){
			$.ajax({
				url:url,
				data:data,
				type:'post',
				dataType:'json',
				success:function(result){
					if(result['code']==200){
						alert(result['msg']);
						location.href=result['url'];
					}else{
						alert(result['msg']);
						location.href=result['url'];
					}
				}
			})
		}
	});
	//结算
	$(document).on("click","#suanzhang",function(){
		var goods_id=""
		$("input[name='qx_0.1']:checked").each(function(reg){
                        goods_id+= $(this).attr('cary_id')+",";
				});
				var goodss_id=goods_id.length-1;
				 goods_id=goods_id.substr(0,goodss_id);
				var goods_price=$("#zj").text();
				var url="/order/index_do"
				var data={goods_id:goods_id,goods_price:goods_price}
				// console.log(data)
				// return false
	$.ajax({
				url:url,
				data:data,
				type:'post',
				dataType:'json',
				success:function(result){
						// console.log(result)
					if(result.code=='00000'){
						location.href="http://www.1909a3.com/order/index";
					}
					if(result.success==false){
						location.href="http://www.1909a3.com/index/login";
					}

				}
			})
	})
</script>