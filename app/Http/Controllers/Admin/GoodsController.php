<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BrandModel;
use App\Models\Goods;
use App\Models\Sku;
use App\Models\Attr;
use App\Models\AttrVal;
class GoodsController extends Controller
{

    //无限极分类
     public function CateInfo($Cate,$pid=0,$level=0){
        if(!$Cate){
            return;
        }
          static $newArray=[];
        foreach($Cate as $v){
          if($v->pid==$pid){
              $v->level=$level;
              $newArray[]=$v;

               //再次调用自己查找复合条件的孩子
              CateInfo($Cate,$v->cate_id,$level+1);
          }
        }

        return $newArray;
  }
     
    
    public function gadd(){
        $bModel=new BrandModel();//品牌
        $Bdata=$bModel->where('is_del',1)->get();//查询品牌数据

        $aModel=new Attr();//属性
        $Adata=$aModel->where('is_del',1)->get();//获取属性数据
        
        $vModel=new AttrVal();//属性值
        $Vdata=$vModel->where("is_del",1)->get();//属性值数据

        //$Cate=Category::get();//分类
        //$CateInfo=CateInfo($Cate);
         //dd($Vdata);
        return view('admin.goods.gadd',['Bdata'=>$Bdata,'Adata'=>$Adata,'Vdata'=>$Vdata]);
    }

    public function gdo(){
        $data=request()->all();
        dd($data);
    }
}
