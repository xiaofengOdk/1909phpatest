<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Goods;
use App\models\AdtgModel;
use App\Models\NavModel;
use App\Models\BrandModel;
use App\models\Cary;
use App\Models\FootModel;
class NavController extends Controller
{
    // top
    public function nav_list($id){
        $nav = NavModel::get();//导航
        $brand = BrandModel::limit(7)->get();//热卖
        $footInfo=FootModel::where('is_del',1)->get();
        $navgoods = Goods::where("nav_id",$id)->get();
        $cart=Cary::get();
        $cart=count($cart);
        // dd($navgoods);
        return view("index/nav/nav_list",compact("nav","brand","footInfo","navgoods","cart"));
    }
    // top
    public function nav_hot($id){
        $nav = NavModel::get();//导航
        $brand = BrandModel::limit(7)->get();//热卖
        $footInfo=FootModel::where('is_del',1)->get();
        $hot = Goods::where("brand_id",$id)->get();//热卖商品
        $cart=Cary::get();
        $cart=count($cart);
        return view("index/nav/nav_hot",compact("nav","brand","footInfo","hot","cart"));
    }
}
