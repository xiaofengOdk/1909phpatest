<div class="sui-navbar">
    <input type="hidden" id="brand_id"  value="{{$brand_id}}">
    <input type="hidden" id="field"  value="{{$field}}">
    <input type="hidden" id="sku"  value="{{$sku}}">
    <input type="hidden" id="goods_price"  value="{{$price}}">
    {{--<input type="hidden" id="attr_2"  value="{{}}">--}}
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
@if(!empty($goodsInfo['data']))
<div class="goods-list">
<ul class="yui3-g">
        @foreach($goodsInfo['data'] as $k=>$v)
            <li class="yui3-u-1-5">
                <div class="list-wrap">
                    <div class="p-img">
                        <a href="/index/goods_desc/{{$v['goods_id']}}" target="_blank"><img src="{{env('UPLOADS_URL')}}{{$v['goods_img']}}" style="weight:214px;height:242px;"/></a>
                    </div>
                    <div class="price">
                        <strong>
                            <em>¥</em>
                            <i>{{$v['goods_price']}}</i>
                        </strong>
                    </div>
                    <div class="attr">
                        <em><a href="/index/goods_desc/{{$v['goods_id']}}" style="color:black; text-decoration:none;">{{$v['goods_name']}}</a></em>
                    </div>
                    {{--<div class="cu">--}}
                    {{--<em><span>促</span>满一件可参加超值换购</em>--}}
                    {{--</div>--}}
                    <div class="operate">
                        <a href="javascript:;" goods_id="{{$v['goods_id']}}" class="sui-btn btn-bordered btn-danger jia">加入购物车</a>
                        <a href="javascript:void(0);" class="sui-btn btn-bordered">收藏</a>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    </div>
    <div class="fr page">
        <div class="sui-pagination pagination-large">
            <ul class="pages">
                {{--{{$goodsInfo->links()}}--}}
            </ul>
        </div>
    </div>
@else
    <li class="yui3-u-1-5">

       <h2>该条件下没有商品....</h2>

    </li>
@endif