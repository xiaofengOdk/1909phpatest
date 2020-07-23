<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BrandModel;
use App\Models\Goods;
use App\Models\Sku;
use App\Models\Attr;
use App\Models\AttrVal;
use App\Models\Cate;
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
              $this->CateInfo($Cate,$v->cate_id,$level+1);
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

         $cModel=new Cate();
         $Cate=$cModel->get();//分类
         //dd($Cate);
        $CateInfo=$this->CateInfo($Cate);
         //dd($CateInfo);
         //dd($Vdata);
        return view('admin.goods.gadd',['Bdata'=>$Bdata,'Adata'=>$Adata,'Vdata'=>$Vdata,'CateInfo'=>$CateInfo]);
    }

    public function gdo(){
        // dd(request()->sku);
        // json_decode()
        // dd($_FILES);
        $data=request()->all();
        // dd($data);
        $goods_model=new Goods;

        // dd($data['goods_name']);
        $goods_model->goods_name=$data['goods_name'];
        $goods_model->brand_id=$data['brand_id'];
        $goods_model->goods_name=$data['goods_name'];
        $goods_model->cate_id=1;
        $goods_model->goods_sn=time();
        $goods_model->goods_price=$data['goods_price'];
        $goods_model->goods_dese=$data['goods_dese'];
        $goods_model->goods_stor=$data['goods_store'];
        $goods_model->is_show=1;
        $goods_model->is_hot=1;
        $goods_model->is_up=1;
        $goods_model->is_new=1;
        $goods_result=$goods_model->save();
        // print_R;die;
        $goods_id=Goods::where("goods_name",$data['goods_name'])->first();
        $sku_model=new Sku;
        $sku_model->goods_id=$goods_id['goods_id'];
        $goods_model->goods_price=$data['goods_price'];
        $goods_model->goods_store=$data['goods_store'];
        $sku_model->add_time=time();
        
        $sku_model->sku=request()->sku;
        $sku_result=$sku_model->save();
        //dd($sku_result);
        if($sku_result){
             return [
                 'code'=>'000000',
                 'message'=>'添加成功',
                 'result'=>''
             ];
        }else{
            return [
                'code'=>'000000',
                'message'=>'添加失败',
                'result'=>''
            ];
        }
    }
}
