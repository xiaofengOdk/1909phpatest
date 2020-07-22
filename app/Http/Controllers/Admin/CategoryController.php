<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Cate;
class CategoryController extends Controller
{
    public function category(){
    	$res=Cate::get();
    	$cate_info=self::list_level($res);

    	// dd($cate_info);
        return view('admin.cate.index',['res'=>$cate_info]);
    }

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

    public function cate_ji(){
    	// print_R(request()->all());
    	 $da = request()->all();
        $res = Cate::where("cate_id",$da['cate_id'])->update([$da['cate_name']=>$da['zi']]);
        if($res){
            return $message = [
                "message"=>"修改成功",
                "success"=>true,
                "code"=>00001,
            ];
        }
        if($res=="0"){
            return $message = [
                "message"=>"未修改",
                "success"=>true,
                "code"=>00001,
            ];
        }
    }
    public function cate_adds(){
    	 $da = request()->all();
        $data = [
            "cate_name"=>$da['cate_name'],
            "parent_id"=>$da['pid'],
            "cate__show"=>1,
        ];
        // dd($data);
        $res = Cate::insert($data);
         if($res){
            return $message = [
                "message"=>"添加成功",
                "success"=>success,
                "code"=>00000,
            ];
        }else{
        	return $message = [
                "message"=>"添加失败",
                "success"=>false,
                "code"=>00004,
            ];
        }
    }
}
