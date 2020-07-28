<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cate;
use App\models\Goods;
use App\models\AdtgModel;
use App\Models\NavModel;
use App\Models\BrandModel;
use App\Models\FootModel;
use App\Models\User_info;
class UserController extends Controller
{
    // 个人信息
    public function user_info(){
        $nav = NavModel::get();//导航
        $brand = BrandModel::where("brand_show",1)->get();//热卖
        $footInfo=FootModel::get();
        $reg = session("reg");
        $user_id = $reg['user_id'];
        $info = User_info::where("user_id",3)->first();
        // dd($info);
        return view("index.user.user_info",compact("nav","brand","footInfo","info"));
    } 
    // 添加
    public function user_add(Request $request){
        $reg = session("reg");
        if($reg==null){
           return $message = [
                "code"=>00001,
                "message"=>"登录后才能完善个人信息",
                "success"=>false,
            ];
            exit;
        }

        if($reg){
            // 添加后修改
            $update = User_info::where("user_id",$reg['user_id'])->first();
            if($update){
                $info = $request->all();
                
                if($info['user_name']==null){
                    return $message = [
                        "code"=>00001,
                        "message"=>"昵称不能为空",
                        "success"=>false,
                    ];
                    exit;
                }
                
            
                if($info['birth']==null){
                    return $message = [
                        "code"=>00001,
                        "message"=>"出生日期不能为空",
                        "success"=>false,
                    ];
                    exit;
                }
                $user_id = $reg['user_id'];
                
            $user_address =  $info['province1'] . $info['city1'] . $info['district1'];
                $data = [
                    "user_name"=>$info['user_name'],
                    "user_id"=>$user_id,
                    "birth"=>$info['birth'],
                    "sex"=>$info['sex'],
                    "user_address"=>$user_address,
                ];
                $up = User_info::where("user_id",$user_id)->update($data);
                if($up==1){
                    return $message = [
                        "code"=>00001,
                        "message"=>"已添加",
                        "success"=>false,
                    ];
                   
                }
                if($up==0){
                    return $message = [
                        "code"=>00001,
                        "message"=>"已添加",
                        "success"=>false,
                    ];
                    
                }
                exit;
            }


            // 添加
            $info = $request->all();
            if($info['user_name']==null){
                return $message = [
                    "code"=>00001,
                    "message"=>"昵称不能为空",
                    "success"=>false,
                ];
                exit;
            }
            $name = User_info::where("user_name",$info['user_name'])->first();
            if($name){
                return $message = [
                    "code"=>00001,
                    "message"=>"该昵称已有",
                    "success"=>false,
                ];
                exit;
            }
           
            if($info['birth']==null){
                return $message = [
                    "code"=>00001,
                    "message"=>"出生日期不能为空",
                    "success"=>false,
                ];
                exit;
            }
            $user_id = $reg['user_id'];
            
          $user_address =  $info['province1'] . $info['city1'] . $info['district1'];
            $data = [
                "user_name"=>$info['user_name'],
                "user_id"=>$user_id,
                "birth"=>$info['birth'],
                "sex"=>$info['sex'],
                "user_address"=>$user_address,
            ];
           $res = User_info::insert($data);
           if($res){
                return $message = [
                    "code"=>00001,
                    "message"=>"已添加",
                    "success"=>true,
                ];
                exit;
            }
        }
       
    }
    // 图片
    public function user_file(Request $request){
         $info = request()->all();
        //  dd($info);
        if($request->hasFile('img')){ //hasFile 方法判断文件在请求中是否存在
            $data['img'] = $this->uploads('img');
        }
        
        $reg = session("reg");
        $user_id = $reg['user_id'];
        $res = User_info::where("user_id",$user_id)->update($data);
        if($res){
           return redirect("/user/user_info");
        }
    }
    public function uploads($img){
        $file = request()->$img;
        if($file->isValid()){ //isValid 方法判断文件在上传过程中是否出错
        $info = $file->store('upload'); //存储位置
        return $info;
        }
    }
}
