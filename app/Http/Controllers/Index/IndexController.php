<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\FootModel;
use Illuminate\Http\Request;
use App\Models\Cate;
use App\Models\NavModel;
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
        $nav = NavModel::get();
        $footInfo=FootModel::get();
        // dd($nav);
    	    	 return view('index.index',['cate_info'=>$cate_info,"nav"=>$nav,"footInfo"=>$footInfo]);

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