<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\AdtgModel;
use Illuminate\Http\Request;

class AdtgController extends Controller
{
    /**
     * 广告添加、展示
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adtg_add(Request $request)
    {
        $g_name = $request->g_name;
        $where = [];
        if($g_name){
            $where[] = ['g_name',"like","%$g_name%"];
        }
        $data=AdtgModel::where("is_del",1)->where($where)->paginate(6);
        return view('admin.adtg.add',['data'=>$data]);
    }

    /**
     * 广告执行
     * @param Request $request
     * @return string
     */
    public function adtg_adds(Request $request){
        $data = $request->all();
        if(empty($data['g_name'])){
            return $this->message('00001','广告名称不能为空','');
        }
        if(empty($data['g_desc'])){
            return $this->message('00002','广告描述不能为空','');
        }
        if(empty($data['g_url'])){
            return $this->message('00003','跳转地址不能为空','');
        }
        $data['add_time']=time();
        $data['is_del']=1;
        $bol = AdtgModel::insert($data);
        if($bol){
            return $this->message('00000','广告添加成功','/admin/adtg_add');
        }else{
            return $this->message('00004','广告添加失败','');
        }
    }

    //错误提示
    public function message($code,$msg,$url=''){
        $message = [
            'code'=> $code,
            'msg'=> $msg,
            'url'=> $url
        ];
        return json_encode($message,JSON_UNESCAPED_UNICODE);
    }

    /**
     * 删除
     * @param Request $request
     * @return string
     */
    public function adtg_del(Request $request)
    {
        $g_id=$request->post('g_id');
        $bol=AdtgModel::where('g_id',$g_id)->update(['is_del'=>2]);
        if($bol){
            return $this->message('00000','该广告，已去火星！','/admin/adtg_add');
        }else{
            return $this->message('00001','广告删除失败');
        }
    }

    /**
     * 即点即改
     * @return array
     */
    public function pol(){
        $g_id=request()->g_id;
        $g_name=request()->field;
        $val=request()->_val;
        $model=new AdtgModel();
        $reg=$model->where('g_id',$g_id)->update([$g_name=>$val]);
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

}
