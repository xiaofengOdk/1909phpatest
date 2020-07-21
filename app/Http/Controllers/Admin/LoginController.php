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
        $AdminModel=new Admin();
        $where=[
              'admin_name'=>$data['admin_name'],
              'admin_pwd'=>md5($data['admin_pwd'])
        ];
        $reg=$AdminModel->where($where)->first();
        //dd($reg);
        if($reg){
            session(['reg'=>$reg]);
             return redirect('/admin/index');
        }else{
            return redirect('/admin/login')->with('msg','账号或密码错误');
        }
    }
}
