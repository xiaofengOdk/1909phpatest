<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order_info;
use App\Models\AdtgModel;
use App\Models\NavModel;
use App\Models\FootModel;
use App\Models\BrandModel;
use App\Models\Goods;
use App\Models\Cary;
class Fina extends Controller
{
    public function fina(){
        //查询所有的省份 作为第一个下拉菜单的值  pid=0
        $cart=Cary::get();
        $cart=count($cart);
        $nav = NavModel::get();//导航
        $user_info=session('reg');
        $user_id=$user_info['user_id'];
       $money= Order_info::where("user_id",$user_id)->orderBy("order_id","desc")->first();
        $footInfo=FootModel::get();//底部导航
        $brand = BrandModel::limit(7)->get();//热卖
        // dd($money);
      return view('index.paysuccess',['nav'=>$nav,
                  'footInfo'=>$footInfo,
                  'brand'=>$brand,
                  'cart'=>$cart,
                  "money"=>$money,
              ]);
    }
}
