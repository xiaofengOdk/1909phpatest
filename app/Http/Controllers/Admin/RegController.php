<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class RegController extends Controller
{
    public function reg(){
        return view('admin.reg.reg');
    }

    public function rdo(){
        $data=request()->all();
        // dd($data);
        if(empty($data['admin_name'])){
            return redirect('/admin/reg')->with('msg','账号不能为空');  
        }else if(empty($data['admin_pwd'])){
            return redirect('/admin/reg')->with('msg','密码不能为空');  
        }
       
        $data['admin_pwd']=md5($data['admin_pwd']);
        $data['add_time']=time();
        $AdminModel=new Admin();
        $reg=$AdminModel->insert($data);
        if($reg){
            return redirect('/admin/login');   
        }
    }
}
