@extends("index.layout.public")
@section("content")
@include("index.layout.top")
    <link rel="stylesheet" type="text/css" href="/static/index/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/static/index/css/widget-jquery.autocomplete.css" />
    <link rel="stylesheet" type="text/css" href="/static/index/css/pages-shop.css" />
    <!-- 头部栏位 -->
    <!--页面顶部-->

<div>
<div class="py-container shop">
        <!--header-->
        <div class="shop-name">红袖官方旗舰店</div>

       
        <div class="banner">
            <img src="/static/index/img/_/shop-intro.png" alt="">
        </div>

        <div class="default-list">
            <div class="title">
                <h1>Must have+</h1>
                <h2>畅销夏日装备</h2>
            </div>
            <div class="goods-list">
                <ul class="yui3-g" id="goods-list">
                  @foreach($navgoods as $k=>$v)
                    <li class="yui3-u-1-4">
 
                        <div class="list-wrap">               
                 
                            <div class="p-img"><img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" style="width: 300;height: 200;"></div>
                            <div class="price"><strong><em>¥</em> <i>{{$v->goods_price}}</i></strong></div>
                            <div class="attr"><em>{{$v->goods_name}}</em></div>
                            <div class="cu"><em><span>促</span>满一件可参加超值换购</em></div>
                            <div class="operate">
                                <a href="success-cart.html" target="_blank" class="sui-btn btn-bordered btn-danger">加入购物车</a>
                                <a href="javascript:void(0);" class="sui-btn btn-bordered">对比</a>
                                <a href="javascript:void(0);" class="sui-btn btn-bordered">关注</a>
                            </div>  
                          
                        </div>
                  
                    </li > 
                  @endforeach
                </ul>
            </div>
           
            <!--tab list end-->
        </div>


        <!--回到顶部-->
        <div class="cd-top">
            <div class="top">
                <img src="/static/index/img/_/gotop.png" />
                <b>TOP</b>
            </div>
            <div class="code" id="code">
                <span><img src="/static/index/img/_/code.png"/></span>
            </div>
            <div class="erweima">
                <img src="/static/index/img/_/erweima.jpg" alt="">
                <s></s>
            </div>
        </div>
    </div>
</div>

   

    <!-- 底部栏位 -->
    <!--页面底部-->

<!--页面底部END-->

@include("index.layout.foot")