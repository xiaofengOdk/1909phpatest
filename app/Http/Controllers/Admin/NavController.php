<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NavModel;
use Illuminate\Http\Request;

class NavController extends Controller
{
    //错误提示
    public function message($code,$msg,$url=''){
        $message = [
            'code'=> $code,
            'msg'=> $msg,
            'url'=> $url
        ];
        return json_encode($message,JSON_UNESCAPED_UNICODE);
    }
    public function nav_add(){
        $nav_info = NavModel::where('is_del',1)->paginate(2);
        return view('admin/nav/nav',['nav_info'=>$nav_info]);
    }
    //执行添加
    public function nav_adds(Request $request){
        $all = $request->all();
        // print_r($all);
        if(empty($all['nav_name'])){
            return $this->message('00001','导航名称不能为空','');
        }
        if(empty($all['nav_url'])){
            return $this->message('00002','导航路径不能为空','');
        }
        if(empty($all['nav_weigh'])){
            return $this->message('00003','导航权重不能为空','');
        }
        $all['add_time']=time();
        $res = NavModel::insert($all);
        if($res){
            return $this->message('00000','导航添加成功','/admin/nav_add');
        }else{
            return $this->message('00004','导航添加失败','');
        }
    }
    //删除
    public function nav_dels(){
        $nav_id = request()->nav_id;
        $res = NavModel::where('nav_id',$nav_id)->update(['is_del'=>2]);
        if($res){
            return $this->message('00000','删除成功','/admin/nav_add');
        }else{
            return $this->message('00001','删除失败','/admin/nav_add');
        }
    }
    //导航名称即点即改
    public function nav_jidian(Request $request){
        $nav_name = $request->info;
        $nav_id = $request->id;
        $res = NavModel::where('nav_id',$nav_id)->update(['nav_name'=>$nav_name]);
        if($res !== false){
            return $this->message('00000','修改成功','/admin/nav_add');
        }else{
            return $this->message('00001','修改失败','/admin/nav_add');
        }
    }
}
