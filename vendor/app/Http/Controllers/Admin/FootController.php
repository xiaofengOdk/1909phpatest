<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FootModel;
use Illuminate\Http\Request;

class FootController extends Controller
{
    public function message($code,$msg,$url=''){
        $message = [
            'code'=> $code,
            'msg'=> $msg,
            'url'=> $url
        ];
        return json_encode($message,JSON_UNESCAPED_UNICODE);
    }
    //展示
    public function foot_show(){
        $foot_name=request()->foot_name;

        $where=[
            ['foot_name','like',"%$foot_name%"],
            ['is_del','=',1]
        ];
        $info = FootModel::where($where)->paginate(3);
        return view('admin/foot/foot',['info'=>$info]);
    }
    //执行添加
    public function foot_adds(Request $request){
        $arr = $request->all();
        if(empty($arr['foot_name'])){
            return $this->message('00001','链接名称不能为空','');
        }
        if(empty($arr['foot_url'])){
            return $this->message('00002','链接路径不能为空','');
        }
        if(empty($arr['is_weight'])){
            return $this->message('00003','权重不能为空','');
        }
        $arr['add_time']=time();
//        var_dump($arr);exit;
        $res = FootModel::insert($arr);
        if($res){
            return $this->message('00000','添加成功','/admin/foot_show');
        }else{
            return $this->message('00004','添加失败','');
        }
    }
    //删除
    public function foot_del(){
        $id = request()->id;
        $res = FootModel::where('id',$id)->update(['is_del'=>2]);
        if($res){
            return $this->message('00000','删除成功','/admin/foot_show');
        }else{
            return $this->message('00001','删除失败','');
        }
    }
}
