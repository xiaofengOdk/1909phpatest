<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\Goods;
use Illuminate\Http\Request;
use App\models\Attr;
use App\models\Attrval;
use App\Models\NavModel;
use App\models\Cary;

use App\Models\FootModel;
use App\Models\BrandModel;
use App\models\Sku;
class GoodsinfoController extends Controller
{
	public function goods_desc($id){
		$nav = NavModel::get();//导航
        $footInfo=FootModel::get();//底部导航
               $cart=Cary::get();
        $cart=count($cart);
        $brand = BrandModel::where("brand_show",1)->get();//热卖
        $brandInfo = BrandModel::where('cate_id',$id)->get();
        $goodsInfo = Goods::
        leftjoin("gimgs","goods.goods_id","=","gimgs.goods_id")
        ->where("goods.goods_id",$id)
        ->first();
        $goods_hot=Goods::orderBy("add_time",'desc')->limit(5)->get();
        // dd($goods_hot);
        $attr=Attr::get();
        // dd($goodsInfo['cate_id']);
        $user_like=Goods::where("cate_id",$goodsInfo['cate_id'])->get();
        // dd($user_like);
	$attrval=Attrval::get();
		// return view('index.goodsdesc.goods_desc');
        return view('index.goodsdesc.goods_desc',["nav"=>$nav,"user_like"=>$user_like,"goods_hot"=>$goods_hot,"attr"=>$attr,"attrval"=>$attrval,"brand"=>$brand,"footInfo"=>$footInfo,"cart"=>$cart,'brandInfo'=>$brandInfo,'goodsInfo'=>$goodsInfo]);
	}
        public function sku(){
                // dd(request()->goods_id);
               $num=Sku::leftjoin('goods',"sku.goods_id","=","goods.goods_id")->where("sku",request()->sku)->first();
                // dd($num);
               if($num){
                return [
                        "code"=>"00000",
                        "message"=>$num
                        ];
               }else{
                   return [
                        "code"=>"00004",
                        "message"=>"正在补货中"
                        ];
               }
        }
}