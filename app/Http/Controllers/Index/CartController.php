<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NavModel;
use App\Models\BrandModel;
use App\Models\FootModel;
class CartController extends Controller
{
    public function cart_list()
    {
        $footInfo=FootModel::get();
        $brand = BrandModel::where("brand_show",1)->get();//热卖
        $nav = NavModel::get();//导航
        return view('index.cart.add',['nav'=>$nav,'brand'=>$brand,'footInfo'=>$footInfo]);
    }
}
