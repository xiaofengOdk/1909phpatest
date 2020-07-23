<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gimgs;
use App\Models\Goods;
class GimgsController extends Controller
{
    public function gimgs_adds(){
        $res = Goods::get();
        $res2 = Gimgs::leftjoin("goods","gimgs.goods_id","=","goods.goods_id")->get();
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
}
