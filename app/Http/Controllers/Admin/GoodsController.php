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

     //提供一个无限极分类的方法
     public static function list_level($data,$pid=0,$level=0)//三个参数与上面index方法里面穿的参数相对应
     {
         static $array=[];
         foreach($data as $k=>$v){
             if($pid==$v->parent_id){
                 $v->level=$level;
                 $array[]=$v;
                 self::list_level($data,$v->cate_id,$level+1);
             }
         }
         return $array;
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
        $CateInfo=$this->list_level($Cate);
         //dd($CateInfo);
         //dd($Vdata);
        return view('admin.goods.gadd',['Bdata'=>$Bdata,'Adata'=>$Adata,'Vdata'=>$Vdata,'CateInfo'=>$CateInfo]);
    }
    public function uploadadd(){
    // echo 1111;
    // print_R(request()->all());
    $fileinfo=$_FILES['Filedata'];
    // dd($fileinfo);
    $tmpname=$fileinfo['tmp_name'];
    $ext=explode(".", $fileinfo['name'])[1];
    // dd($ext);
    $newFile=md5(uniqid()).".".$ext;
    $newFilePath="./uploads/".Date("Y/m/d",time());
    if(!is_dir($newFilePath)){
      mkdir($newFilePath,777,true);
    }
    // dd($newFilePath);
    $newFilePath=$newFilePath.$newFile;
    // dd($newFilePath);

    move_uploaded_file($tmpname,$newFilePath);
    $newFilePath=Ltrim($newFilePath,".");
        // dd($newFilePath);

    echo $newFilePath;
   }  
       public function goods_ji(){
        $goods_id=request()->goods_id;
        $goods_name=request()->goods_name;
        $zi=request()->zi;
        // $val=request()->_val;
        $model=new Goods();
        $reg=$model->where('goods_id',$goods_id)->update([$goods_name=>$zi]);
        // dd($reg);
        if($reg==1){
            return [
                "code"=>"00000",
                "message"=>"修改成功"
            ];
        }elseif($reg==0){
            return [
                "code"=>"00001",
                "message"=>"没有修改"
            ];
        }else{
            return [
                "code"=>"00002",
                "message"=>"修改失败"
            ];
        }
    }
    public function goods_del(){
        $id=request()->all();
        $AdminModel=new Goods();
        $reg=$AdminModel->where('goods_id',$id)->update(['is_del'=>2]);
        // dd($reg);
        if($reg){
            return [
                "code"=>"00000",
                "message"=>"删除成功"
            ];
        }else{
           return [
               "code"=>"00001",
               "message"=>"删除失败"
           ];
        }
   }


    public function Moreupload($img){
        $file = request()->file($img);
        // dd($file);
        if($file->isValid()){
            $info = $file->store('upload');
        }
        return $info;
    }
    public function gdo(){
         $data=request()->all();
        // dd($data);
        //  if($request->hasFile('Filename')){ //hasFile 方法判断文件在请求中是否存在
        //     $slide_log = $this->Moreupload('Filename');
        // }
        // dd($data);
        $goods_model=new Goods;

        // dd($data);
        $goods_model->goods_name=$data['goods_name'];
        $goods_model->brand_id=$data['brand_id'];
        $goods_model->goods_img=$data['baTop'];
        $goods_model->goods_name=$data['goods_name'];
        $goods_model->cate_id=1;
        $goods_model->goods_sn=time();
        $goods_model->goods_price=$data['goods_price'];
        $goods_model->goods_dese=$data['goods_dese'];
        $goods_model->goods_store=$data['goods_store'];
        $goods_model->goods_score=$data['goods_store'];
        $goods_model->is_show=1;
        $goods_model->is_hot=1;
        $goods_model->is_up=1;
        $goods_model->is_new=1;
        $goods_result=$goods_model->save();
        // print_R;die;
        $goods_id=Goods::where("goods_name",$data['goods_name'])->first();
        $sku_model=new Sku;
        $sku_model->goods_id=$goods_id['goods_id'];
        $sku_model->goods_price=$data['goods_price'];
        $sku_model->goods_store=$data['goods_store'];
        $sku_model->add_time=time();  
        $sku_model->sku=request()->sku;
        $sku_result=$sku_model->save();
        // dd($sku_result);
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
    public function goods_show(){
      $goods_res=Goods::
      leftjoin("cate","goods.cate_id","=","cate.cate_id")
      ->leftjoin("brand","goods.brand_id","=","brand.brand_id")
      ->where("goods.is_del",1)
      ->get();
      // dd($goods_res);
      return view('admin.goods.goods_show',['goods_res'=>$goods_res]);
    }
}
