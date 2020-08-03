<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\models\RoleModel;
use App\models\Right;
use Illuminate\Http\Request;
class RoleController extends Controller
{
    /**
     * 角色添加、角色展示
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
<<<<<<< Updated upstream
    public function role_add(Request $request)
    {
        $role_name = $request->role_name;
        $where = [];
        if ($role_name) {
            $where[] = ['role_name', "like", "%$role_name%"];
        }
        $data = RoleModel::where('is_del', 1)->where($where)->paginate(3);
        $right_model = Right::get();
        return view('admin.role.add', ['data' => $data, 'right_model' => $right_model]);
}
=======
    public function role_add(){
        $where=[
            'is_del'=>1
        ];
        $data=RoleModel::where($where)->paginate(3);
        $right_model=Right::get();
        return view('admin.role.add',['data'=>$data,'right_model'=>$right_model]);
    }

>>>>>>> Stashed changes
    //执行添加
    public function  role_adds(Request $request)
    {
        $role_name=$request->post('role_name');
        if(empty($role_name)){
            $success=[];
            $success['success']=false;
            $success['code']=0000;
            $success['msg']='角色名称不能为空';
            echo json_encode($success);
        }else{
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
<<<<<<< Updated upstream
=======

    //即点即改
    public function pth(){
        $role_id=request()->role_id;
        $role_name=request()->field;
        $val=request()->_val;
        $model=new RoleModel();
        $reg=$model->where('role_id',$role_id)->update([$role_name=>$val]);
        // dd($reg);
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
    public function message($code,$msg,$url=''){
        $message = [
            'code'=> $code,
            'msg'=> $msg,
            'url'=> $url
        ];
        return json_encode($message,JSON_UNESCAPED_UNICODE);
    }
    
>>>>>>> Stashed changes
    //即点即改
    public function pth(){
        $role_id=request()->role_id;
        $role_name=request()->field;
        $val=request()->_val;
        $model=new RoleModel();
        $reg=$model->where('role_id',$role_id)->update([$role_name=>$val]);
        // dd($reg);
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
<<<<<<< Updated upstream
    //错误提示
    public function message($code,$msg,$url=''){
        $message = [
            'code'=> $code,
            'msg'=> $msg,
            'url'=> $url
        ];
        return json_encode($message,JSON_UNESCAPED_UNICODE);
    }
    //角色赋予权限
    public function upd(){
         $data=request()->all();
         //dd($data);
         $RgModel=new Role_right();
         $reg=$RgModel->insert($data);
          //dd($reg);
        if($reg){
            return [
                'code'=>'000000',
                'message'=>'权限赋予成功',
                'result'=>''
            ];
        }else{
            return [
                'code'=>'000001',
                'message'=>'权限赋予失败',
                'result'=>''
            ];
        }
    }
=======

>>>>>>> Stashed changes
}

