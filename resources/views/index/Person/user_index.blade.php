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
                                        <th width="35%"><font size="2">宝贝 </font></th>
                                        <th width="5%"><font size="2">单价 </font></th>
                                        <th width="5%"><font size="2">数量 </font></th>
                                        <th width="8%"><font size="2">商品操作 </font></th>
                                        <th width="10%"><font size="2">实付款 </font></th>
                                        <th width="10%"><font size="2">交易状态 </font></th>
                                        <th width="10%"><font size="2">交易操作 </font></th>
                                    </thead>
                                </tr>
                            </table>
                        </div>
                        <div class="order-detail">
                            <div class="orders">
                                <div class="choose-order">
                                    <div class="sui-pagination pagination-large top-pages">
                                        <ul>
                                            <li class="prev disabled"><a href="#">上一页</a></li>

                                            <li class="next"><a href="#">下一页</a></li>
                                        </ul>
                                    </div>
                                </div>

								<!--order1-->
                                <div class="choose-title">
                                    <label data-toggle="checkbox" class="checkbox-pretty ">
                                           <input type="checkbox" checked="checked"><span>2017-02-11 11:59　订单编号：7867473872181848  店铺：哇哈哈 <a>和我联系</a></span>
                                     </label>
									  <a class="sui-btn btn-info share-btn">分享</a>
                                </div>
                                <table class="sui-table table-bordered order-datatable">
                                    <tbody>
                                        <tr>
                                            <td width="35%">
                                                <div class="typographic"><img src="/static/index/img/goods.png" />
                                               
                                                    <a href="#"  class="block-text"> <font size="2">包邮 正品玛姬儿压缩面膜无纺布纸膜100粒 送泡瓶面膜刷喷瓶 新款</font></a>
                                                    <span class="guige"><font size="2">规格：温泉喷雾150ml</font></span>
                                                </div>
                                            </td>
                                            <td width="5%" class="center">
                                                <ul class="unstyled">
                                                    <li class="o-price"><font size="2">¥599.00</li>
                                                    <li><font size="2">¥299.00</font></li>
                                                </ul>
                                            </td>
                                            <td width="5%" class="center"><font size="2">1</font></td>
                                            <td width="8%" class="center">
                                               
                                            </td>
                                            <td width="10%" class="center" >
                                                <ul class="unstyled">
                                                    <li><font size="2">¥299.00</font></li>
                                                    <li><font size="2">（含运费：￥0.00）</font></li>
                                                </ul>
                                            </td>
                                            <td width="10%" class="center">
                                                <ul class="unstyled">
                                                    <li><font size="2">等待卖家付款</font></li>
                                                    <li><a href="orderDetail.html" class="btn"><font size="2">订单详情 </font></a></li>
                                                </ul>
                                            </td>
                                            <td width="10%" class="center">
                                                <ul class="unstyled">
													<li><a href="#" class="sui-btn btn-info"><font size="2">立即付款</font></a></li>
                                                    <li><font size="2">取消订单</font></li>
                                                    
                                                </ul>
                                            </td>
                                        </tr>
                                        

                                    </tbody>
                                </table>
                                <!--order2-->
                                <div class="choose-title">
                                    <label data-toggle="checkbox" class="checkbox-pretty ">
                                           <input type="checkbox" checked="checked"><span>2017-02-11 11:59　订单编号：7867473872181848  店铺：哇哈哈 <a>和我联系</a></span>
                                     </label>
									  <a class="sui-btn btn-info share-btn">分享</a>
                                </div>
                                <table class="sui-table table-bordered order-datatable">
                                    <tbody>
                                        <tr>
                                            <td width="35%">
                                                <div class="typographic"><img src="/static/index/img/goods.png" />
                                                    <a href="#" class="block-text">包邮 正品玛姬儿压缩面膜无纺布纸膜100粒 送泡瓶面膜刷喷瓶 新款</a>
                                                    <span class="guige">规格：温泉喷雾150ml</span>
                                                </div>
                                            </td>
                                            <td width="5%" class="center">
                                                <ul class="unstyled">
                                                    <li class="o-price">¥599.00</li>
                                                    <li>¥299.00</li>
                                                </ul>
                                            </td>
                                            <td width="5%" class="center">1</td>
                                            <td width="8%" class="center">
                                                <ul class="unstyled">
                                                    <li>已发货</li>
                                                    <li><a>退货/退款</a></li>
                                                </ul>
                                            </td>
                                            <td width="10%" class="center" rowspan="2">
                                                <ul class="unstyled">
                                                    <li>¥299.00</li>
                                                    <li>（含运费：￥0.00）</li>
                                                </ul>
                                            </td>
                                            <td width="10%" class="center" rowspan="2">
                                                <ul class="unstyled">
                                                    <li>部分发货</li>
                                                    <li><a href="orderDetail.html" class="btn">订单详情 </a></li>
                                                </ul>
                                            </td>
                                            <td width="10%" class="center" rowspan="2">
                                                <ul class="unstyled">
                                                    <li>还剩4天23时</li>
                                                    <li><a href="#" class="sui-btn btn-info">确认发货</a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="35%">
                                                <div class="typographic"><img src="/static/index/img/goods.png" />
                                                    <a href="#" class="block-text">包邮 正品玛姬儿压缩面膜无纺布纸膜100粒 送泡瓶面膜刷喷瓶 新款</a>
                                                    <span class="guige">规格：温泉喷雾150ml</span>
                                                </div>
                                            </td>
                                            <td width="5%" class="center">
                                                <ul class="unstyled">
                                                    <li class="o-price">¥199.00</li>
                                                    <li>¥212.00</li>
                                                </ul>
                                            </td>
                                            <td width="5%" class="center">1</td>
                                            <td width="8%" class="center">
                                                <ul class="unstyled">
                                                    <li>未发货</li>
                                                    <li><a>退货/退款</a></li>
                                                </ul>
                                            </td>


                                        </tr>

                                    </tbody>
                                </table>

                                <!--order3-->
                                <div class="choose-title">
                                    <label data-toggle="checkbox" class="checkbox-pretty ">
                                           <input type="checkbox" checked="checked"><span>2017-02-11 11:59　订单编号：7867473872181848  店铺：哇哈哈 <a>和我联系</a></span>
                                     </label>
                                    <a class="sui-btn btn-info share-btn">分享</a>
                                </div>
                                <table class="sui-table table-bordered order-datatable">
                                    <tbody>
                                        <tr>
                                            <td width="35%">
                                                <div class="typographic"><img src="/static/index/img/goods.png" />
                                                    <a href="#" class="block-text">包邮 正品玛姬儿压缩面膜无纺布纸膜100粒 送泡瓶面膜刷喷瓶 新款</a>
                                                    <span class="guige">规格：温泉喷雾150ml</span>
                                                </div>
                                            </td>
                                            <td width="5%" class="center">
                                                <ul class="unstyled">
                                                    <li class="o-price">¥599.00</li>
                                                    <li>¥299.00</li>
                                                </ul>
                                            </td>
                                            <td width="5%" class="center">1</td>
                                            <td width="8%" class="center">
                                                <ul class="unstyled">

                                                    <li><a>退货/退款</a></li>
                                                </ul>
                                            </td>
                                            <td width="10%" class="center">
                                                <ul class="unstyled">
                                                    <li>¥299.00</li>
                                                    <li>（含运费：￥0.00）</li>
                                                </ul>
                                            </td>
                                            <td width="10%" class="center">
                                                <ul class="unstyled">
                                                    <li>买家已付款</li>
                                                    <li><a href="orderDetail.html" class="btn">订单详情 </a></li>
                                                </ul>
                                            </td>
                                            <td width="10%" class="center">
                                                <ul class="unstyled">
                                                    <li><a href="#" class="sui-btn btn-info">提醒发货</a></li>
                                                </ul>
                                            </td>
                                        </tr>


                                    </tbody>
                                </table>



                            </div>
                            <div class="choose-order">
                                <div class="sui-pagination pagination-large top-pages">
                                    <ul>
                                        <li class="prev disabled"><a href="#">«上一页</a></li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li class="dotted"><span>...</span></li>
                                        <li class="next"><a href="#">下一页»</a></li>
                                    </ul>
                                    <div><span>共10页&nbsp;</span><span>
                                            到
                                            <input type="text" class="page-num"><button class="page-confirm" onclick="alert(1)">确定</button>
                                            页</span></div>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                        </div>

                        <div class="like-title">
                            <div class="mt">
                                <span class="fl"><strong>热卖单品</strong></span>
                            </div>
                        </div>
                        <div class="like-list">
                            <ul class="yui3-g">
                                <li class="yui3-u-1-4">
                                    <div class="list-wrap">
                                        <div class="p-img">
                                            <img src="/static/index/img/_/itemlike01.png" />
                                        </div>
                                        <div class="attr">
                                            <em><font size="1">DELL戴尔Ins 15MR-7528SS 15英寸 银色 笔记本</font></em>
                                        </div>
                                        <div class="price">
                                            <strong>
											<em>¥</em>
											<i><font size="1">3699.00</font></i>
										</strong>
                                        </div>
                                        <div class="commit">
                                            <i class="command"><font size="1">已有6人评价</font></i>
                                        </div>
                                    </div>
                                </li>
                                <li class="yui3-u-1-4">
                                    <div class="list-wrap">
                                        <div class="p-img">
                                            <img src="/static/index/img/_/itemlike02.png" />
                                        </div>
                                        <div class="attr">
                                            <em>Apple苹果iPhone 6s/6s Plus 16G 64G 128G</em>
                                        </div>
                                        <div class="price">
                                            <strong>
											<em>¥</em>
											<i>4388.00</i>
										</strong>
                                        </div>
                                        <div class="commit">
                                            <i class="command">已有700人评价</i>
                                        </div>
                                    </div>
                                </li>
                                <li class="yui3-u-1-4">
                                    <div class="list-wrap">
                                        <div class="p-img">
                                            <img src="/static/index/img/_/itemlike03.png" />
                                        </div>
                                        <div class="attr">
                                            <em>DELL戴尔Ins 15MR-7528SS 15英寸 银色 笔记本</em>
                                        </div>
                                        <div class="price">
                                            <strong>
											<em>¥</em>
											<i>4088.00</i>
										</strong>
                                        </div>
                                        <div class="commit">
                                            <i class="command">已有700人评价</i>
                                        </div>
                                    </div>
                                </li>
                                <li class="yui3-u-1-4">
                                    <div class="list-wrap">
                                        <div class="p-img">
                                            <img src="/static/index/img/_/itemlike04.png" />
                                        </div>
                                        <div class="attr">
                                            <em>DELL戴尔Ins 15MR-7528SS 15英寸 银色 笔记本</em>
                                        </div>
                                        <div class="price">
                                            <strong>
											<em>¥</em>
											<i>4088.00</i>
										</strong>
                                        </div>
                                        <div class="commit">
                                            <i class="command">已有700人评价</i>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 底部栏位 -->
    <!--页面底部-->


<!--页面底部END-->
undefined

</html>
@include("index.layout.foot")