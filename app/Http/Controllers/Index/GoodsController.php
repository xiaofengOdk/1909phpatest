<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\Attr;
use App\Models\AttrVal;
use App\Models\Cate;
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
//        echo "<script>alert('添加成功');location.href='/'</script>";
//        echo $id;
        $nav = NavModel::get();//导航
        $footInfo=FootModel::get();//底部导航
        $brand = BrandModel::where("brand_show",1)->get();//热卖
        $brandInfo = BrandModel::where('cate_id',$id)->get();
        $cate = Cate::where('cate_id',$id)->first();
        $where=[
            ['is_del','=',1],
            ['is_show','=',1]
        ];

        $goodsInfo = Goods::where($where)->paginate(10);
        $hotwhere = [
            ['is_hot','=',1],
            ['is_del','=',1]
        ];
        $goods_hot = Goods::where($hotwhere)->limit(4)->get();

        //获取属性
        $attr = Attr::where('is_del',1)->get();
        //属性值
        $attrval = AttrVal::get();

        return view('index/goods/goodslist',["nav"=>$nav,"brand"=>$brand,"footInfo"=>$footInfo,'brandInfo'=>$brandInfo,'goodsInfo'=>$goodsInfo,'cate'=>$cate,'goods_hot'=>$goods_hot,'attr'=>$attr,'attrval'=>$attrval]);
    }
}
