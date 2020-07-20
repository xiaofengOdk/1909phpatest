<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\RoleModel;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * 角色添加、角色展示
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function role_add(){
        $where=[
            'is_del'=>1
        ];
        $data=RoleModel::where($where)->get();
        return view('admin.role.add',['data'=>$data]);
    }

    //执行添加
    public function  role_adds(Request $request)
    {
        $role_name=$request->post('role_name');
        $data=[
            'role_name'=>$role_name,
            'add_time'=>time(),
        ];
        $bol=RoleModel::insert($data);
        if($bol){
            $success=[];
            $success['success']=true;
            $success['code']=0000;
            $success['msg']='角色添加成功';
            $success['url']='/admin/role_list';
            echo json_encode($success);
        }else{
            $success=[];
            $success['success']=false;
            $success['code']=0001;
            $success['msg']='角色添加失败';
            $success['url']='/admin/role_add';
            echo json_encode($success);
        }
    }

    /**
     * 角色删除
     */
    public function role_Del(Request $request)
    {
        $role_id=$request->post('role_id');
        $bol=RoleModel::where('role_id',$role_id)->update(['is_del'=>2]);
        if($bol){
            return $this->message('00000','小伙子，拜拜！','/admin/role_add');
        }else{
            return $this->message('00001','角色删除失败','/admin/role_add');
        }
    }

    /**
     * 修改页
     * @param $id
     */
    public function update($id){
        $model=new RoleModel();
        $res=$model::where(['role_id'=>$id])->first()->toArray();
        return view('admin.role.update',['res'=>$res]);
    }

   //执行修改
    public function upd(Request $request){
        $id=$request->post('rid');
//        echo $id;exit;
        if(empty($id)){
            $arr=[
                'code'=>'300',
                'msg'=>'非法操作',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $r_name=$request->post('rname');
//        echo $r_name;exit;
        if(empty($r_name)){
            $arr=[
                'code'=>'300',
                'msg'=>'非法操作',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }

        $model=new Role();
        $res=$model::where(['rid'=>$id])->first();
        $res->r_name=$r_name;
        if($res->save()){
            $arr=[
                'code'=>'200',
                'msg'=>'修改成功',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }else{
            $arr=[
                'code'=>'300',
                'msg'=>'修改失败',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
    }




    public function message($code,$msg,$url='')
    {
        $message = [
            'code' => $code,
            'msg' => $msg,
            'url' => $url
        ];
        return json_encode($message, JSON_UNESCAPED_UNICODE);
    }


    public function updateajax(Request $request){
        $da = $request->all();
        dd($da);
    }
}
