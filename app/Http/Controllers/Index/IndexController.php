<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\FootModel;
use Illuminate\Http\Request;
use App\Models\Cate;
use App\models\Goods;
use App\models\AdtgModel;
use App\Models\NavModel;
use App\Models\BrandModel;
class IndexController extends Controller
{
    public function index(){
	$res=Cate::get();
        // dd(request()->all());
    	$cate_info=self::getleftInfo($res);     
    	// dd($cate_info);
    	// foreach($cate_info as $k=>$v){
    	// 	print_R($v['child']);
    	// }
        // exit;
        $nav = NavModel::get();//导航
        $brand = BrandModel::where("brand_show",1)->get();//热卖
        // dd($nav);
        $adtr_info=AdtgModel::where("is_del",1)->limit(5)->get();
        $footInfo=FootModel::get();
        //购物车
        $goods_info=Goods::get();
        // dd($goods_info);
    	return view('index.index',['cate_info'=>$cate_info,"goods_info"=>$goods_info,"nav"=>$nav,"brand"=>$brand,"footInfo"=>$footInfo,"adtr_info"=>$adtr_info]);

    }
    
    public function show(){
        return view('index.show');
    }
public static function getleftInfo($leftInfo,$pid=0){
      $arr=[];
    foreach($leftInfo as $k=>$v){
        //  dump($v['cate_name']);
        if($v['parent_id']==$pid){
        //   dump($v['cate_name']);
        //采用递归的方式，自己调用自己 并且是后进现出
        
        $child=self::getleftInfo($leftInfo,$v['cate_id']);
        $v['child']=$child;
        $arr[]=$v;
        }
    }
    return  $arr;
	}
}
