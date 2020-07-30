<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gimgs;
use App\Models\Goods;
class GimgsController extends Controller
{
    public function gimgs_adds(Request $request){
        $res = Goods::get();
      
       
        $res2 = Gimgs::where("is_dels",1)->leftjoin("goods","gimgs.goods_id","=","goods.goods_id")->paginate(2);
        return view("admin.gimgs.gimgs_adds",compact("res","res2"));
    }
    public function gimgs_add(Request $request){
    //   print_r($_FILES); 
        $data = $request->all();
       
        if($request->hasFile('goods_imgs')){ //hasFile 方法判断文件在请求中是否存在
            $goods_imgs = $this->Moreupload('goods_imgs');
            $data['goods_imgs'] = implode("|",$goods_imgs); //将数组转化为字符串
        }
        $res = Gimgs::insert($data);
        if($res){
            return redirect("admin/gimgs_adds");
        }
      
    }
   
   public function gimgs_upd($id){
    $res = Gimgs::where("id",$id)->first();
   
    return view("admin.gimgs.gimgs_upd",compact("res"));
   }
   public function gimgs_upddo($id){
       $data = request()->all();
       if(request()->hasFile('goods_imgs')){ //hasFile 方法判断文件在请求中是否存在
        $goods_imgs = $this->Moreupload('goods_imgs');
        $data['goods_imgs'] = implode("|",$goods_imgs); //将数组转化为字符串
        }
       
        $res = Gimgs::where("id",$id)->update($data);
        // dd($res);
        if($res){
            return redirect("admin/gimgs_adds");
        }
   }



   public function Moreupload($img){
    $file = request()->$img;
    foreach($file as $k=>$v){
        if($v->isValid()){
            $info[$k] = $v->store("upload");
        }else{
            $info[$k] = '未获取到上传文件或上传过程错误';
        }
    }
    return $info;
  }
  public function gimgs_del(Request $request){
     $id = $request->all();
     $res = Gimgs::where("id",$id)->update(['is_dels'=>2]);
     if($res){
        return $message = [
            "message"=>"删除成功",
            "success"=>true,
            "code"=>00001,
        ];
    }
  }
}
