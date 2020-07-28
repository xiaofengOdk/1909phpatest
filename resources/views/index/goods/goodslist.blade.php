@extends("index.layout.public")
@section("content")
@include("index.layout.top")
        <!--list-content-->

<div class="main">
    <div class="py-container">
        <!--bread-->
        <div class="bread">
            <ul class="fl sui-breadcrumb">
                <li>
                    <a href="#">全部结果</a>
                </li>
                <li class="active">{{$cate->cate_name}}</li>
            </ul>
            <ul class="tags-choose">
                <li class="tag">全网通<i class="sui-icon icon-tb-close"></i></li>
                <li class="tag">63G<i class="sui-icon icon-tb-close"></i></li>
            </ul>
            <form class="fl sui-form form-dark">
                <div class="input-control control-right">
                    <input type="text" />
                    <i class="sui-icon icon-touch-magnifier"></i>
                </div>
            </form>
            <div class="clearfix"></div>
        </div>
        <!--selector-->
        <div class="clearfix selector">
            <div class="type-wrap">
                <div class="fl key">{{$cate->cate_name}}</div>
                <div class="fl value"></div>
                <div class="fl ext"></div>
            </div>
            <div class="type-wrap logo">
                <div class="fl key brand">品牌</div>
                <div class="value logos">
                    <ul class="logo-list">
                        @foreach($brandInfo as $k=>$v)
                            <li class="brand" cate_id="{{$cate->cate_id}}" brand_id="{{$v->brand_id}}"><img src="{{env('UPLOAD_URL')}}{{$v->brand_log}}" /></li>
                        @endforeach
                    </ul>
                </div>
                <div class="ext">
                    <a href="javascript:void(0);" class="sui-btn">多选</a>
                    <a href="javascript:void(0);">更多</a>
                </div>
            </div>
            @foreach($attr as $k=>$v)
            <div class="type-wrap">
                <div class="fl key">{{$v->attr_name}}</div>

                <div class="fl value">

                    <ul class="type-list">
                        @foreach($attrval as $kk=>$vv)
                            @if($v->attr_id == $vv->attr_id)
                        <li>
                            <a>{{$vv->attrval_name}}</a>
                        </li>
                            @endif
                        @endforeach
                    </ul>

                </div>

                <div class="fl ext"></div>
            </div>
            @endforeach
            <div class="type-wrap">
                <div class="fl key">价格</div>
                <div class="fl value">
                    <ul class="type-list">
                        <li>
                            <a>0-500元</a>
                        </li>
                        <li>
                            <a>500-1000元</a>
                        </li>
                        <li>
                            <a>1000-1500元</a>
                        </li>
                        <li>
                            <a>1500-2000元</a>
                        </li>
                        <li>
                            <a>2000-3000元 </a>
                        </li>
                        <li>
                            <a>3000元以上</a>
                        </li>
                    </ul>
                </div>
                <div class="fl ext">
                </div>
            </div>
            <div class="type-wrap">
                <div class="fl key">更多筛选项</div>
                <div class="fl value">
                    <ul class="type-list">
                        <li>
                            <a>特点</a>
                        </li>
                        <li>
                            <a>系统</a>
                        </li>
                        <li>
                            <a>手机内存 </a>
                        </li>
                        <li>
                            <a>单卡双卡</a>
                        </li>
                        <li>
                            <a>其他</a>
                        </li>
                    </ul>
                </div>
                <div class="fl ext">
                </div>
            </div>
        </div>
        <!--details-->
        <div class="details">
            <div class="sui-navbar">
                <div class="navbar-inner filter">
                    <ul class="sui-nav">
                        <li class="active">
                            <a href="#">综合</a>
                        </li>
                        <li>
                            <a href="#">销量</a>
                        </li>
                        <li>
                            <a href="#">新品</a>
                        </li>
                        <li>
                            <a href="#">评价</a>
                        </li>
                        <li>
                            <a href="#">价格</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="goods-list">
                <ul class="yui3-g">
                    @foreach($goodsInfo as $k=>$v)
                        <li class="yui3-u-1-5">
                            <div class="list-wrap">
                                <div class="p-img">
                                    <a href="item.html" target="_blank"><img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" /></a>
                                </div>
                                <div class="price">
                                    <strong>
                                        <em>¥</em>
                                        <i>{{$v->goods_price}}</i>
                                    </strong>
                                </div>
                                <div class="attr">
                                    <em>{{$v->goods_name}}</em>
                                </div>
                                <div class="cu">
                                    <em><span>促</span>满一件可参加超值换购</em>
                                </div>
                                <div class="commit">
                                    <i class="command">已有2000人评价</i>
                                </div>
                                <div class="operate">
                                    <a href="success-cart.html" target="_blank" class="sui-btn btn-bordered btn-danger">加入购物车</a>
                                    <a href="javascript:void(0);" class="sui-btn btn-bordered">对比</a>
                                    <a href="javascript:void(0);" class="sui-btn btn-bordered">关注</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            {{--{{$goodsInfo->links()}}--}}
            <div class="fr page">
                <div class="sui-pagination pagination-large">
                    {{$goodsInfo->links()}}
                    {{--<ul>--}}

                    {{--<li >--}}
                    {{--<a href="#">«上一页</a>--}}
                    {{--</li>--}}
                    {{--<li >--}}
                    {{--{{$goodsInfo->links()}}--}}
                    {{--<a href="#">{{$goodsInfo->links()}}</a>--}}
                    {{--</li>--}}

                    {{--<li >--}}
                    {{--<a href="#">下一页»</a>--}}
                    {{--</li>--}}
                    {{--</ul>--}}
                    {{--<div><span>共10页&nbsp;</span>--}}
                        {{--<span>--}}
                      {{--到第--}}
                {{--<input type="text" class="page-num">--}}
                 {{--页 <button class="page-confirm" onclick="alert(1)">确定</button>--}}
                        {{--</span></div>--}}
                </div>
            </div>
        </div>
        <!--hotsale-->
        <div class="clearfix hot-sale">
            <h4 class="title">热卖商品</h4>
            <div class="hot-list">
                <ul class="yui3-g">
                    @foreach($goods_hot as $k=>$v)
                    <li class="yui3-u-1-4">
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
                            <div class="commit">
                                <i class="command">已有700人评价</i>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<script src="/static/admin/js/plugins/jquery/jquery.min.js"></script>
<script>
    $(document).on('click','.brand',function(){
        var brand_id=$(this).attr('brand_id');
//        console.log(brand_id);
        var url='/index/getGoodsBrand';
        var data={brand_id:brand_id};
        $.ajax({
            url:url,
            data:data,
            type:'get',
            dataType:'json',
            success:function(res){
                console.log(res);
            }
        })
    })
</script>
@include("index.layout.foot")