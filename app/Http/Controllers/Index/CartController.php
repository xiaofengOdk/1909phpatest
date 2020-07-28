<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\Goods;
use Illuminate\Http\Request;
use App\Models\NavModel;
use App\Models\BrandModel;
use App\Models\FootModel;
class CartController extends Controller
{
    public function cart_list()
    {
        $footInfo=FootModel::get();
        $brand = BrandModel::where("brand_show",1)->get();//热卖
        $nav = NavModel::get();//导航
        return view('index.cart.add',['nav'=>$nav,'brand'=>$brand,'footInfo'=>$footInfo]);
    }

    /**
     * 购物车添加
     * @param Request $request
     */
    public function goods_add(Request $request)
    {
        $goods_id=$request->post('goods_id');
        $goods_where=[
            ['goods_id','=',$goods_id]
        ];
        $goods_obj=Goods::where($goods_where)->first();
        if(!$goods_obj){
            alert('商品没有找到！');
            exit;
        }
        #判断用户是否购买过该商品
        $cart_where=[
            ['goods_id','=',$goods_obj],
        ];
    }
}
