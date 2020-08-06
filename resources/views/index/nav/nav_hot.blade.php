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
           
        </div>

        <div class="default-list">
            <div class="title">
                <h1>Must have+</h1>
                <h2>畅销热卖</h2>
            </div>
            <div class="goods-list">
                <ul class="yui3-g" id="goods-list">
                @foreach($hot as $k=>$v)
                    <li class="yui3-u-1-4">
                        <div class="list-wrap">         
                            <div class="p-img"><a style="text-decoration: none; color:black;" href="{{url('/index/goods_desc/'.$v->goods_id)}}"><img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" width='200px'></a> </div>
                            <div class="price"><strong><em>¥</em> <i><a style="text-decoration: none; color:red;" href="{{url('/index/goods_desc/'.$v->goods_id)}}">{{$v->goods_price}}</a> </i></strong></div>
                            <div class="attr"><em><a style="text-decoration: none; color:black;" href="{{url('/index/goods_desc/'.$v->goods_id)}}">{{$v->goods_name}}</a> </em></div>
                            <div class="cu"><em><span>促</span>满一件可参加超值换购</em></div>
                            <div class="operate">
                                <a href="javascript:void(0);" goods_id="{{$v->goods_id}}" class="sui-btn btn-bordered btn-danger jia">加入购物车</a>
                                <a href="javascript:void(0);" class="sui-btn btn-bordered">收藏</a>
                                
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
<script type="text/javascript" src="/static/index/js/plugins/jquery/jquery.min.js"></script>

<script>
    $(document).on("click",".jia",function(){
        var goods_id = $(this).attr("goods_id");
        var data ={};
        data.goods_id = goods_id;
        data.buy_number = 1;
        console.log(data);
        var url = "/index/cart_add";
        $.ajax({
            type:"post",
            url:url,
            data:data,
            dataType:"json",
            success:function(res){
                if(res.success==true){
                    alert(res.message);
                    location.href="{{url('/index/cart_list')}}"
                }
                if(res.success==false){
                    alert(res.message);
                    location.href="{{url('/index/cart_list')}}"
                }
                 
            }
        })
       
    })


</script>
@include("index.layout.foot")