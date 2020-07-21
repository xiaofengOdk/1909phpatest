<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Admin_role;
use App\Models\Role;
class AdminController extends Controller
{
    //
   public function index(){
   	
    return view('admin.index');
    // return view('admin.right.index');
   }

   public function uShow(){
        $AdminModel=new Admin();
        $reg=$AdminModel->where('is_del',1)->paginate(2);
        $RoleModel=new Role();
        $regs=$RoleModel->get();

        //dd($regs);
        return view('admin.user.ushow',['reg'=>$reg,'regs'=>$regs]);
   }
   public function udo(){
       // echo request()->role_id;die;
    $adminrole_model=new Admin_role;
    $adminrole_model->admin_id=request()->admin_id;
    $adminrole_model->role_id=json_encode(request()->rid);
    $result=$adminrole_model->save();
    if($result){
        return [
            "code"=>"00000",
            "message"=>"赋予成功"
        ];
    }else{
       return [
           "code"=>"00004",
           "message"=>"赋予失败"
       ];
    }
    // print_R($result);
   }

   public function del(){
        $id=request()->all();
        $AdminModel=new Admin();
        $reg=$AdminModel->where('admin_id',$id)->update(['is_del'=>2]);
        // dd($reg);
        if($reg){
            return [
                "code"=>"00000",
                "message"=>"删除成功"
            ];
        }else{
           return [
               "code"=>"00001",
               "message"=>"删除失败"
           ];
        }
   }

   public function jupdo(){
       $admin_id=request()->admin_id;
       $admin_name=request()->field;
       $val=request()->_val;
       $AdminModel=new Admin();
       $reg=$AdminModel->where('admin_id',$admin_id)->update([$admin_name=>$val]);
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
}
