<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdtgModel;
use App\Models\NavModel;
use App\Models\FootModel;
use App\Models\BrandModel;
use App\Models\Goods;
use App\Models\Cary;
class AdvController extends Controller
{
    public function adv_list($id){
        $nav = NavModel::get();//导航
        $footInfo=FootModel::get();//底部导航
        $brand = BrandModel::limit(7)->get();//热卖
        $brandInfo = BrandModel::where('cate_id',$id)->get();
        $AdModel=new AdtgModel();
        $cart=Cary::get();
        $cart=count($cart);
        $reg=$AdModel->where('g_id',$id)->first();
        $gInfo=Goods::where('is_hot',1)->limit(3)->get();
        return view('index.ad.ad_list',['nav'=>$nav,'footInfo'=>$footInfo,'brand'=>$brand,'brandInfo'=>$brandInfo,'reg'=>$reg,'gInfo'=>$gInfo,'cart'=>$cart]);
    }
}
