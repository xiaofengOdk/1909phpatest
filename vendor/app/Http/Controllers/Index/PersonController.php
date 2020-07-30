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
class PersonController extends Controller
{
    // 个人中心
    public function user_index(){
        $nav = NavModel::get();//导航
        $brand = BrandModel::where("brand_show",1)->get();//热卖
        $footInfo=FootModel::get();
        return view("index.person.user_index",compact("nav","brand","footInfo"));
    }
}
