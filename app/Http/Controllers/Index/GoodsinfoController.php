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
        $brand = BrandModel::where("brand_show",1)->limit(7)->get();//热卖
        $brandInfo = BrandModel::where('cate_id',$id)->get();
        $goodsInfo = Goods::
        leftjoin("gimgs","goods.goods_id","=","gimgs.goods_id")
        ->where("goods.goods_id",$id)
        ->first();
        $goodsInfo['goods_id']=$id;
        $goods_hot=Goods::orderBy("add_time",'desc')->limit(5)->get();
        // dd($goods_hot);
        $attr=Attr::get();
        // dd($goodsInfo['cate_id']);
        $user_like=Goods::where("cate_id",$goodsInfo['cate_id'])->get();
        // dd($goodsInfo);
	$attrval=Attrval::get();
		// return view('index.goodsdesc.goods_desc');
        return view('index.goodsdesc.goods_desc',
            ["nav"=>$nav,"user_like"=>$user_like,"goods_hot"=>$goods_hot,
                "attr"=>$attr,"attrval"=>$attrval,"brand"=>$brand,"footInfo"=>$footInfo,
                "cart"=>$cart,'brandInfo'=>$brandInfo,'goodsInfo'=>$goodsInfo]);
	}
        public function sku(){
                // dd(request()->goods_id);
               // $num=Sku::rightjoin('goods',"sku.goods_id","=","goods.goods_id")->where("sku",request()->sku)->first();
              $goods = Sku::where("goods_id",request()->goods_id)->get();
              // dd(request()->goods_id);
              $sku=request()->sku;
              // dd($goods);
                    foreach($goods as $k=>$v){
                      // print_R($v['goods_id']);
                        $result=Sku::where(["sku"=>$sku,"goods_id"=>$v['goods_id']])->first();
                           // print_R($result);
                            if($result){
                                    return [
                                         "code"=>"00000",
                                         "message"=>$result 
                                        ];

                            }else{
                                    return [
                                    "code"=>"00004",
                                    "message"=>"正在补货中"
                                    ];
                                exit;
                            }
                     }
                     // dd($result);
        }
}