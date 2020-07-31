<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Goods;
use App\models\AdtgModel;
use App\Models\NavModel;
use App\Models\BrandModel;
use App\Models\FootModel;
use App\MOdels\Order_goods;
use App\Models\Score;
class OrderinfoController extends Controller
{
    public function index(){
        $nav = NavModel::get();//导航
        $brand = BrandModel::limit(7)->get();//热卖
        $footInfo=FootModel::get();
        // 订单
        $order = Order_goods::leftjoin("goods","order_goods.goods_id","=","goods.goods_id")->get();
       $reg = session("reg");
        dd($reg);
        return view("index.orderinfo.index",compact("nav","brand","footInfo","order"));
    }
}
