<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
class LoginController extends Controller
{
    public function login(){
        return view('admin.login.login');
    }

    public function logDo(){
        $data=request()->all();
        if(empty($data['admin_name'])){
            return redirect('/admin/login')->with('msg','请输入账号');  
        }else if(empty($data['admin_pwd'])){
            return redirect('/admin/login')->with('msg','密码不能为空');  
        }
        $AdminModel=new Admin();
        $where=[
              'admin_name'=>$data['admin_name'],
              'admin_pwd'=>md5($data['admin_pwd'])
        ];
        $reg=$AdminModel->where($where)->first();
        //dd($reg);
        $time=date("Y-m-d H:i:s");
        if($reg){
            session(['reg'=>$reg,'time'=>$time]);
           
             return redirect('/admin/index');
        }else{
            return redirect('/admin/login')->with('msg','账号或密码错误');
        }
    }

    public function quit(){
        session(['reg'=>null,'time'=>null])
        
    }
}
