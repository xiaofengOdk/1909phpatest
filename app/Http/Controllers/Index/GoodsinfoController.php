<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\Goods;
use Illuminate\Http\Request;
use App\models\Attr;
use App\models\Attrval;
use App\Models\NavModel;
use App\Models\FootModel;
use App\Models\BrandModel;

class GoodsinfoController extends Controller
{
	public function goods_desc($id){
		$nav = NavModel::get();//导航
        $footInfo=FootModel::get();//底部导航
        $brand = BrandModel::where("brand_show",1)->get();//热卖
        $brandInfo = BrandModel::where('cate_id',$id)->get();
        $goodsInfo = Goods::
        leftjoin("gimgs","goods.goods_id","=","gimgs.goods_id")
        ->where("goods.goods_id",$id)
        ->first();
        $goods_hot=Goods::orderBy("add_time",'desc')->limit(5)->get();
        // dd($goods_hot);
        $attr=Attr::get();
		$attrval=Attrval::get();
		// return view('index.goodsdesc.goods_desc');
		return view('index.goodsdesc.goods_desc',["nav"=>$nav,"goods_hot"=>$goods_hot,"attr"=>$attr,"attrval"=>$attrval,"brand"=>$brand,"footInfo"=>$footInfo,'brandInfo'=>$brandInfo,'goodsInfo'=>$goodsInfo]);

	}
}