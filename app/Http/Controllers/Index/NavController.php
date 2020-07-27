<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Goods;
use App\models\AdtgModel;
use App\Models\NavModel;
use App\Models\BrandModel;
use App\Models\FootModel;
class NavController extends Controller
{
    // top
    public function nav_list($id){
        $nav = NavModel::get();//导航
        $brand = BrandModel::where("brand_show",1)->get();//热卖
        $footInfo=FootModel::get();
        $navgoods = Goods::where("nav_id",$id)->get();
        // dd($navgoods);
        return view("index/nav/nav_list",compact("nav","brand","footInfo","navgoods"));
    }
    // top
    public function nav_hot($id){
        $nav = NavModel::get();//导航
        $brand = BrandModel::where("brand_show",1)->get();//热卖
        $footInfo=FootModel::get();
        $hot = Goods::where("cate_id",$id)->get();//热卖商品
        return view("index/nav/nav_hot",compact("nav","brand","footInfo","hot"));
    }
}
