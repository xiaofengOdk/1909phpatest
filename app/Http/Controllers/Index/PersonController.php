<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cate;
use App\models\Goods;
use App\models\AdtgModel;
use App\Models\NavModel;
use App\Models\BrandModel;
use App\Models\FootModel;
use App\models\Cary;
use App\Models\Order_info;
use App\Models\Order_goods;
class PersonController extends Controller
{
    // 个人中心
    public function user_index(){
        $nav = NavModel::get();//导航
        $brand = BrandModel::limit(7)->get();//热卖
        $footInfo=FootModel::get();
        $cart=Cary::get();
        $cart=count($cart);
        $order = Order_info::get();
        // $order_info = Order_info::leftjoin("order_goods","order_info.order_id","=","order_goods.order_id")->get();
        return view("index.person.user_index",compact("nav","brand","footInfo","cart","order","order_info"));
    }
}
