<div class="sui-navbar">
    <div class="navbar-inner filter">
        <ul class="sui-nav">
            <li class="{{$field==''?'active':''}}">
                <a href="#" class="selected" field="">综合</a>{{--active--}}
            </li>
            <li class="{{$field=='is_up'?'active':''}}">
                <a href="#" class="selected" field="is_up">销量</a>
            </li>
            <li class="{{$field=='is_new'?'active':''}}">
                <a href="#" class="selected" field="is_new">新品</a>
            </li>
            {{--<li>--}}
                {{--<a href="#" class="selected" field="goods_price">价格</a>--}}
            {{--</li>--}}
        </ul>
    </div>
</div>
@if(!empty($goodsInfo))
<div class="goods-list">
<ul class="yui3-g">
        @foreach($goodsInfo as $k=>$v)
            <li class="yui3-u-1-5">
                <div class="list-wrap">
                    <div class="p-img">
                        <a href="/index/goods_desc/{{$v->goods_id}}" target="_blank"><img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" style="weight:214px;height:242px;"/></a>
                    </div>
                    <div class="price">
                        <strong>
                            <em>¥</em>
                            <i>{{$v->goods_price}}</i>
                        </strong>
                    </div>
                    <div class="attr">
                        <em><a href="/index/goods_desc/{{$v->goods_id}}" style="color:black; text-decoration:none;">{{$v->goods_name}}</a></em>
                    </div>
                    {{--<div class="cu">--}}
                    {{--<em><span>促</span>满一件可参加超值换购</em>--}}
                    {{--</div>--}}
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
    <div class="fr page">
        <div class="sui-pagination pagination-large">
            <ul>
            {{$goodsInfo->links()}}
            </ul>
        </div>
    </div>
@else
    <li class="yui3-u-1-5">
        该条件下你没有商品....
    </li>
@endif