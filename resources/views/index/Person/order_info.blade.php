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
                                        <th width="15%"><font size="2">图片 </font></th>
                                        <th width="10%"><font size="2"></font></th>
                                        <th width="8%"><font size="2">商品名</font></th>
                                        <th width="8%"><font size="2"> </font></th>
                                        <th width="10%"><font size="2"> </font></th>
                                        <th width="10%"><font size="2">商品价格 </font></th>
                                        <th width="10%"><font size="2"> </font></th>
                                    </thead>
                                </tr>
                            </table>
                        </div>
                       
                        <div class="order-detail">
                            <div class="orders">
                                <!--order1-->
                              
                                <table class="sui-table table-bordered order-datatable">
                                    <tbody>
                                    @foreach($goods_info as $k=>$v)
                                        <tr>
                                            <td width="20%">
                                                <div class="typographic"><img  src="{{$v['goods_img']}}" width="100px;"  height="100px;"/>
                                               
                                                    <a class="block-text"> <font size="2"></font></a>
                                                    <span class="guige"><font size="2"></font></span>
                                                </div>
                                            </td>
                                            <td width="39%" class="center">
                                                <ul class="unstyled">
                                                    
                                                    <li><font size="2">
                                                    {{$v['goods_name']}}
                                                    </font></li>
                                                </ul>
                                            </td>
                                            
                                            <td width="40%" class="center">
                                                <ul class="unstyled">
                                                    <li><a><font size="2">￥{{$v['goods_price']}}</font></a></li>
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