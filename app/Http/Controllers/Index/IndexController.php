<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\FootModel;
use Illuminate\Http\Request;
use App\Models\Cate;
use App\models\Goods;
use App\models\Slide;
use App\models\AdtgModel;
use App\Models\NavModel;
use App\models\Cary;
use App\Models\BrandModel;
class IndexController extends Controller
{
    public function index(){
        $uu=session('reg');
        $user_id=$uu['user_id'];
        if(empty($user_id)){
           
	    $res=Cate::get();
        // dd(request()->all());
    	$cate_info=self::getleftInfo($res);     
    	
        $nav = NavModel::get();//导航
        $brand = BrandModel::limit(7)->get();//热卖
        // dd($nav);
        $cart=Cary::get();
        $cart=count($cart);
        
          $adtr_info=AdtgModel::where("is_del",1)->limit(5)->get();
        $footInfo=FootModel::where('is_del',1)->get();
        //购物车
        $goods_info=Goods::limit(6)->get();
        $goods_info2=Goods::orderBy("add_time","desc")->limit(6)->get();
        $slide_info=Slide::limit(3)->get();
        $goods = Goods::where("is_hot",1)->limit(5)->get();
        $goods2 = Goods::orderBy("goods_id","desc")->limit(5)->where("is_hot",1)->get();
        $goods3 = Goods::where("is_new",1)->limit(5)->get();
        $goods4 = Goods::orderBy("add_time","asc")->limit(5)->where("is_hot",1)->get();
        // dd($goods_info2);
        // dd($goods_info);
    

        }else{
        
      
	    $res=Cate::get();
        // dd(request()->all());
    	$cate_info=self::getleftInfo($res);     
    	
        $nav = NavModel::get();//导航
        $brand = BrandModel::limit(7)->get();//热卖
        // dd($nav);
        $cart=Cary::where('user_id',$user_id)->get();
        $cart=count($cart);
        
          $adtr_info=AdtgModel::where("is_del",1)->limit(5)->get();
        $footInfo=FootModel::where('is_del',1)->get();
        //购物车
        $goods_info=Goods::limit(6)->get();
        $goods_info2=Goods::orderBy("add_time","asc")->limit(6)->get();
        $slide_info=Slide::limit(3)->get();
        $goods = Goods::where("is_hot",1)->limit(5)->get();
        $goods2 = Goods::orderBy("goods_id","desc")->limit(5)->where("is_hot",1)->get();
        $goods3 = Goods::where("is_new",1)->limit(5)->get();
        $goods4 = Goods::orderBy("add_time","asc")->limit(5)->where("is_hot",1)->get();
        // dd($goods_info);
    }
    return view('index.index',['cate_info'=>$cate_info,"goods_info"=>$goods_info,"cart"=>$cart,"nav"=>$nav,"brand"=>$brand,"footInfo"=>$footInfo,"adtr_info"=>$adtr_info,"slide_info"=>$slide_info,"goods"=>$goods,"goods2"=>$goods2,"goods3"=>$goods3,"goods4"=>$goods4,"goods_info2"=>$goods_info2]);
         
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
    
    public function sshow(){
        return view('index.show');
    }
}
