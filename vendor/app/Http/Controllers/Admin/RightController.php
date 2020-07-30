<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Right;
class RightController extends Controller
{
    public function index(Request $request){
        $right_name = $request->right_name;
        $where = [];
        if($right_name){
            $where[] = ['right_name',"like","%$right_name%"];
        }
        $res = Right::where("is_del",1)->where($where)->paginate(2);
        // if(request()->ajax()){
        //     return view("admin.right.paginate",compact("res"));
        // }
        return view("admin.right.index",compact("res"));
    }
    public function add_right(Request $request){
        $da = $request->all();
        if($da['right_name']==""){
            return $message = [
                "message"=>"权限名不能为空",
                "success"=>false,
                "code"=>00001,
            ];
        }
        if($da['right_desc']==""){
            return $message = [
                "message"=>"描述不能为空",
                "success"=>false,
                "code"=>00001,
            ];
        }
        if($da['right_url']==""){
            return $message = [
                "message"=>"url不能为空",
                "success"=>false,
                "code"=>00001,
            ];
        }
        $data = [
            "right_name"=>$da['right_name'],
            "right_desc"=>$da['right_desc'],
            "add_time"=>time(),
            "right_url"=>$da['right_url'],
        ];
        $info = Right::where("right_name",$da['right_name'])->first();
         if($info){
             return $message = [
                 "message"=>"权限已有",
                 "success"=>false,
                 "code"=>00001,
             ];
         }
        $res = Right::insert($data);
        if($res){
            return $message = [
                "message"=>"权限添加成功",
                "success"=>true,
                "code"=>00001,
            ];
        }
    }
    public function del(Request $request){
        $right_id = $request->all();
        $res = Right::where("right_id",$right_id)->update(['is_del'=>2]);
        if($res){
            return $message = [
                "message"=>"删除成功",
                "success"=>true,
                "code"=>00001,
            ];
        }
    }
    public function updateajax(Request $request){
        $da = $request->all();
        $res = Right::where("right_id",$da['right_id'])->update([$da['right_name']=>$da['zi']]);
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
}
