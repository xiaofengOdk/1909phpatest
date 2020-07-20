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
    public function Del(Request $request)
    {
        $role_id=$request->post('role_id');
        $bol=RoleModel::where('role_id',$role_id)->update(['is_del'=>2]);
        if($bol){
            $success=[];
            $success['success']=true;
            $success['code']=0000;
            $success['msg']='角色删除成功';
            $success['url']='/admin/role_add';
            echo json_encode($success);
        }else{
            $success=[];
            $success['success']=false;
            $success['code']=0001;
            $success['msg']='角色删除失败';
            $success['url']='/admin/role_add';
            echo json_encode($success);
        }
    }



}
