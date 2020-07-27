<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\Goods;
use Illuminate\Http\Request;
use App\Models\NavModel;
use App\Models\FootModel;
use App\Models\BrandModel;

class GoodsController extends Controller
{
    /**
     * 商品列表
     */
    public function goods_list($id){
//        echo $id;
        $nav = NavModel::get();//导航
        $footInfo=FootModel::get();//底部导航
        $brand = BrandModel::where("brand_show",1)->get();//热卖
        $brandInfo = BrandModel::where('cate_id',$id)->get();
        $where=[
            ['is_del','=',1],
            ['is_show','=',1]
        ];
        $goodsInfo = Goods::where($where)->paginate(10);
        return view('index/goods/goodslist',["nav"=>$nav,"brand"=>$brand,"footInfo"=>$footInfo,'brandInfo'=>$brandInfo,'goodsInfo'=>$goodsInfo]);
    }
}
