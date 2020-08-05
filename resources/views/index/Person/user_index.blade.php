@extends("index.layout.public")
@section("content")
@include("index.layout.top")

    <!-- 头部栏位 -->
    <!--页面顶部-->




<script type="text/javascript" src="/static/index/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">

$(function(){

	$("#service").hover(function(){

		$(".service").show();

	},function(){

		$(".service").hide();

	});

	$("#shopcar").hover(function(){

		$("#shopcarlist").show();

	},function(){

		$("#shopcarlist").hide();

	});



})

</script>
<script type="text/javascript" src="/static/index/js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="/static/index/js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="/static/index/js/plugins/jquery-placeholder/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="/static/index/js/widget/nav.js"></script>
</body>
    <!--header-->
    <div id="account">
        <div class="py-container">
            <div class="yui3-g home">
                <!--左侧列表-->
                @include("index.layout.left")
                <!--右侧主内容-->
                <div class="yui3-u-5-6 order-pay">
                    <div class="body">
                        <div class="table-title">
                            <table class="sui-table  order-table">
                                <tr>
                                    <thead>
                                        <th width="35%"><font size="2">订单号 </font></th>
                                        <th width="12%"><font size="2">是否发货</font></th>
                                        <th width="8%"><font size="2">是否支付</font></th>
                                        <th width="8%"><font size="2">商品价格 </font></th>
                                        <th width="10%"><font size="2">支付方式 </font></th>
                                        <th width="10%"><font size="2">下单时间 </font></th>
                                        <th width="10%"><font size="2">交易操作 </font></th>
                                    </thead>
                                </tr>
                            </table>
                        </div>
                       
                        <div class="order-detail">
                            <div class="orders">
                                <!--order1-->
                                <table class="sui-table table-bordered order-datatable">
                                    <tbody>
                                    @foreach($order_info as $k=>$v)
                                        <tr>
                                            <td width="39%">
                                                <div class="typographic">
                                               
                                                    <a class="block-text"> <font size="2">订单号：{{$v['order_sn']}}</font></a>
                                                    <span class="guige"><font size="2"></font></span>
                                                </div>
                                            </td>
                                            <td width="5%" class="center">
                                                <ul class="unstyled">
                                                    
                                                    <li><font size="2">
                                                        @if($v['shipping_status']==1)
                                                            未发货
                                                        @endif
                                                        @if($v['shipping_status']==2)
                                                            已发货
                                                        @endif
                                                    </font></li>
                                                </ul>
                                            </td>
                                            <td width="5%" class="center"><font size="2">
                                                        @if($v['pay_status']==1)
                                                            未支付
                                                        @endif
                                                        @if($v['pay_status']==2)
                                                            已支付
                                                        @endif
                                            
                                            </font></td>
                                            <td width="8%" class="center">
                                                <ul class="unstyled">
                                                    <li><a><font size="2">￥{{$v['order_amount']}}</font></a></li>
                                                </ul>
                                            </td>
                                            <td width="10%" class="center" >
                                                <ul class="unstyled">
                                                    <li><font size="2">
                                                        @if($v['payname']==1)
                                                            支付宝
                                                        @endif
                                                        @if($v['payname']==2)
                                                            微信
                                                        @endif
                                                    </font></li>
                                                </ul>
                                            </td>
                                            <td width="10%" class="center">
                                                <ul class="unstyled">
                                                    <li><font size="2">{{date('Y-m-d',$v['add_time'])}}</font></li>
                                                </ul>
                                            </td>
                                            <td width="10%" class="center">
                                                <ul class="unstyled">
													<li><a href="{{url('/payMoney1/'.$v->order_id)}}" class="sui-btn btn-info"><font size="2">立即付款</font></a></li>
                                                    <li><font size="2"><a href="{{url('/index/order_info/'.$v->order_id)}}">订单下商品</a></font></li>
                                                    
                                                </ul>
                                            </td>
                                        </tr>
                                        
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="choose-order">
                                <div class="sui-pagination pagination-large top-pages">
                                   
                                </div>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 底部栏位 -->
    <!--页面底部-->


<!--页面底部END-->

</html>
@include("index.layout.foot")