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
                <li class="tag" style="display:none;" id="first">全网通<i class="sui-icon icon-tb-close"></i></li>
                <li class="tag" style="display:none;" id="two">63G<i class="sui-icon icon-tb-close"></i></li>
                <li class="tag" style="display:none;" id="three">63G<i class="sui-icon icon-tb-close"></i></li>
            </ul>

            <div class="clearfix"></div>
        </div>
        <!--selector-->
        <div class="clearfix selector">

            <div class="type-wrap logo">
                <div class="fl key brand">品牌</div>
                <div class="value logos">

                    <ul class="logo-list">
                        @foreach($brandInfo as $k=>$v)
                            <li class="brand" cate_id="{{$cate->cate_id}}" brand_id="{{$v->brand_id}}" brand_name="{{$v->brand_name}}"><img src="{{env('UPLOAD_URL')}}{{$v->brand_log}}" style="width:105px;height:43px;"/></li>
                        @endforeach
                    </ul>
                </div>
                <div class="ext">
                    <a href="javascript:void(0);" class="sui-btn">多选</a>
                    <a href="javascript:void(0);">更多</a>
                </div>
            </div>
            @foreach($attr as $k=>$v)
            <div class="type-wrap attrs">
                <div class="fl key">
                    {{$v->attr_name}}
                </div>

                <div class="fl value">

                    <ul class="type-list">
                        @foreach($attrval as $kk=>$vv)
                            @if($v->attr_id == $vv->attr_id)
                        <li>
                            <a attr_id="{{$vv->attr_id}}" attrval_id="{{$vv->id}}" class="attrval">{{$vv->attrval_name}}</a>
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
                        @foreach($price as $k=>$v)
                        <li>
                            <a class="price_name">{{$v}}</a>
                        </li>
                            @endforeach
                    </ul>
                </div>
                <div class="fl ext">
                </div>
            </div>
        </div>
        <!--details-->
        <div class="details" id="goodslist">
            <div class="sui-navbar">
                <input type="hidden" id="brand_id"  value="">
                <input type="hidden" id="field"  value="">
                <input type="hidden" id="sku"  value="">
                <input type="hidden" id="goods_price"  value="">
                {{--<input type="hidden" id="attr_2"  value="">--}}

                <div class="navbar-inner filter">
                    <ul class="sui-nav" >
                        <li class="active">
                            <a href="#" class="selected" field="">综合</a>{{--active--}}
                        </li>
                        <li>
                            <a href="#" class="selected" field="is_up">销量</a>
                        </li>
                        <li>
                            <a href="#" class="selected" field="is_new">新品</a>
                        </li>
                        {{--<li>--}}
                            {{--<a href="#" class="selected" field="goods_price">价格</a>--}}
                        {{--</li>--}}
                    </ul>
                </div>
            </div>
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
                                <div class="operate">
                                    <a href="javascript:;"  goods_id="{{$v->goods_id}}" class="sui-btn btn-bordered btn-danger jia">加入购物车</a>
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
                        {{$goodsInfo->links()}}
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
                    </ul>
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
                            <div style="width:292px;height:142px">
                                {{--<img src="/static/index/img/like_01.png" />--}}
                                <a href="/index/goods_desc/{{$v->goods_id}}"><img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" style="width:142px;height:142px;"/></a>
                            </div>
                            <div class="attr">
                                <em><a href="/index/goods_desc/{{$v->goods_id}}" style="color:black; text-decoration:none;">{{$v->goods_name}}</a></em>
                            </div>
                            <div class="price">
                                <strong>
                                    <em>¥</em>
                                    <i>{{$v->goods_price}}</i>
                                </strong>
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
    $(document).ready(function(){
        //品牌
        $(document).on('click','.brand',function(){
            var _this =  $(this);
            if(_this.hasClass("redhover")){
                _this.removeClass("redhover");
                $("#two").hide();
                var brand_id=null;
                var cate_id="{{$cate->cate_id}}";
                var field = $('#field').val();
                var goods_price=$('#goods_price').val();
                var sku=$('#sku').val();
                if(field==''){
                    field=null;
                }
                if(goods_price==''){
                    goods_price=null;
                }
                if(sku==''){
                    sku=null;
                }
                var url='/index/getnewinfo';
                var data={brand_id:brand_id,goods_price:goods_price,field:field,cate_id:cate_id,sku:sku};
                $.ajax({
                    url:url,
                    data:data,
                    type:'post',
                    dataType:'html',
                    success:function(res){
//                console.log(res);
                        $('#goodslist').html(res);
                    }
                })
            }else{
                _this.addClass("redhover");
                $(this).prev('li').removeClass('redhover');
                var brand_name = _this.attr('brand_name');
                $("#two").show();
                $('#two').text(brand_name);
                var brand_id=_this.attr('brand_id');
                var cate_id="{{$cate->cate_id}}";
                var field = $('#field').val();
                var goods_price=$('#goods_price').val();
                var sku=$('#sku').val();
                if(field==''){
                    field=null;
                }
                if(goods_price==''){
                    goods_price=null;
                }
                if(sku==''){
                    sku=null;
                }
                var url='/index/getnewinfo';
                var data={brand_id:brand_id,goods_price:goods_price,field:field,cate_id:cate_id,sku:sku};
                $.ajax({
                    url:url,
                    data:data,
                    type:'post',
                    dataType:'html',
                    success:function(res){
//                console.log(res);
                        $('#goodslist').html(res);
                    }
                })
            }

        })
        //价格
        $(document).on('click','.price_name',function(){
            var _this =  $(this);
            if(_this.hasClass("redhover")){
                _this.removeClass("redhover");
                $("#first").hide();
                var goods_price = null;
//               getInfo();
                var brand_id=$('#brand_id').val();
                var cate_id="{{$cate->cate_id}}";
                var field = $('#field').val();
                var sku=$('#sku').val();
                if(field==''){
                    field=null;
                }
                if(brand_id==''){
                    brand_id=null;
                }
                if(sku==''){
                    sku=null;
                }
                var url='/index/getnewinfo';
                var data={brand_id:brand_id,goods_price:goods_price,field:field,cate_id:cate_id,sku:sku};
                $.ajax({
                    url:url,
                    data:data,
                    type:'post',
                    dataType:'html',
                    success:function(res){
                        $('#goodslist').html(res);
                    }
                })
            }else{
                var goods_price = _this.text();
                _this.addClass("redhover");
                $(this).parent('li').siblings('li').find('a').removeClass('redhover');
                $("#first").show();
                $('#first').text(goods_price);
//               getInfo();
                var brand_id=$('#brand_id').val();
                var cate_id="{{$cate->cate_id}}";
                var field = $('#field').val();
                var sku=$('#sku').val();
                if(field==''){
                    field=null;
                }
                if(brand_id==''){
                    brand_id=null;
                }
                if(sku==''){
                    sku=null;
                }
                var url='/index/getnewinfo';
                var data={brand_id:brand_id,goods_price:goods_price,field:field,cate_id:cate_id,sku:sku};
                $.ajax({
                    url:url,
                    data:data,
                    type:'post',
                    dataType:'html',
                    success:function(res){
                        $('#goodslist').html(res);
                    }
                })
            }

        })
        //销量
        $(document).on('click','.selected',function(){
            var _this = $(this);
            _this.parent('li').addClass('active');
            _this.parent('li').siblings('li').removeClass('active');
            var field = _this.attr('field');
            var brand_id=_this.attr('brand_id');
            var cate_id="{{$cate->cate_id}}";
            var goods_price=$('#goods_price').val();
            var sku=$('#sku').val();
            if(goods_price==''){
                goods_price=null;
            }
            if(brand_id==''){
                brand_id=null;
            }
            if(sku==''){
                sku=null;
            }
            var url='/index/getnewinfo';
            var data={brand_id:brand_id,goods_price:goods_price,field:field,cate_id:cate_id,sku:sku};
            $.ajax({
                url:url,
                data:data,
                type:'post',
                dataType:'html',
                success:function(res){
//                console.log(res);
                    $('#goodslist').html(res);
                }
            })
//            return false;
//            getInfo();
        })
        //sku
        $(document).on('click','.attrval',function(){
            var _this=$(this);
            if(_this.hasClass("redhover")){
                _this.removeClass("redhover");
//                return false;
                var sku=null;
                var brand_id=$('#brand_id').val();
                var cate_id="{{$cate->cate_id}}";
                var field = $('#field').val();
                var goods_price=$('#goods_price').val();
                if(field==''){
                    field=null;
                }
                if(goods_price==''){
                    goods_price=null;
                }
                if(brand_id==''){
                    brand_id=null;
                }
                var url='/index/getnewinfo';
                var data={brand_id:brand_id,goods_price:goods_price,field:field,cate_id:cate_id,sku:sku};
                $.ajax({
                    url:url,
                    data:data,
                    type:'post',
                    dataType:'html',
                    success:function(res){
//                console.log(res);
                        $('#goodslist').html(res);
                    }
                })
            }else{
                var attr_id = _this.attr('attr_id');
                var attrval_id = _this.attr('attrval_id');
                var attrval_name = _this.text();
                var sku = "["+attr_id+':'+attrval_id+"]";
                _this.addClass("redhover");
                $(this).parent('li').siblings('li').find('a').removeClass('redhover');
//            getInfo(sku);
                var brand_id=$('#brand_id').val();
                var cate_id="{{$cate->cate_id}}";
                var field = $('#field').val();
                var goods_price=$('#goods_price').val();
                if(field==''){
                    field=null;
                }
                if(goods_price==''){
                    goods_price=null;
                }
                if(brand_id==''){
                    brand_id=null;
                }
                var url='/index/getnewinfo';
                var data={brand_id:brand_id,goods_price:goods_price,field:field,cate_id:cate_id,sku:sku};
                $.ajax({
                    url:url,
                    data:data,
                    type:'post',
                    dataType:'html',
                    success:function(res){
//                console.log(res);
                        $('#goodslist').html(res);
                    }
                })
            }
        })

    })
    //加入购物车
    $(document).on("click",".jia",function(){
        var goods_id = $(this).attr("goods_id");
        var data ={};
        data.goods_id = goods_id;
        data.buy_number = 1;
//        console.log(data);
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