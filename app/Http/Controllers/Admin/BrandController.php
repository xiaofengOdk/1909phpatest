<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BrandModel;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function message($code,$msg,$url=''){
        $message = [
            'code'=> $code,
            'msg'=> $msg,
            'url'=> $url
        ];
        return json_encode($message,JSON_UNESCAPED_UNICODE);
    }
    public function brand(){
        $info = BrandModel::where('is_del',1)->paginate(2);
	//dd($info);
        return view('admin/goods/brand',['info'=>$info]);

    }
    //添加品牌
    public function dobrand(Request $request){
        $data = $request->all();
      //dd($data);
        //文件上传
        if($request->hasFile('brand_log')){
            $data['brand_log']=$this->upload('brand_log');
        }
//        var_dump($data['brand_log']);
//        var_dump($data);
        $data['add_time']=time();
        $res = BrandModel::insert($data);
        return redirect('/admin/brand');
    }
    //文件上传
    public function upload($img){
        $file=request()->file($img);//接收文件
        //判断上传过程中有无错误
        if($file->isValid()){
            $store_result=$file->store('uploads');
            return $store_result;
        }

        exit('未获取到上传文件或上传文件过程中出错');
    }
    public function delbrand(Request $request){
        $brand_id = $request->brand_id;
        $res = BrandModel::where('brand_id',$brand_id)->update(['is_del'=>2]);
        if($res){
            return $this->message('00000','删除成功','/admin/brand');
        }else{
            return $this->message('00001','删除失败','/admin/brand');
        }
    }
    public function brandedit($id){
        $info = BrandModel::where('brand_id',$id)->first();
        return view('admin/goods/brandedit',['info'=>$info]);
    }
    public function brandupd($id){
        $data = request()->except('_token');
//        print_r($all);exit;
        //文件上传
        if(request()->hasFile('brand_log')){
            $data['brand_log']=$this->upload('brand_log');
        }
//        var_dump($data['brand_log']);
//        var_dump($data);
        $res = BrandModel::where('brand_id',$id)->update($data);
        if($res!==false){
            return redirect('/admin/brand');
        }else{
            return redirect("/admin/brandedit/$id");
        }

    }
    public function editbrand_name(Request $request){
//        var_dump($request->all());
        $brand_name = $request->info;
        $brand_id = $request->id;
        $res = BrandModel::where('brand_id',$brand_id)->update(['brand_name'=>$brand_name]);
        if($res !== false){
            return $this->message('00000','修改成功','/admin/brand');
        }else{
            return $this->message('00001','修改失败','/admin/brand');
        }
    }
    public function editbrand_show(Request $request){
        $data = $request->val;
        $id=$request->id;
//        var_dump($id,$data);exit;
        $data = intval($data);
        $info = ['brand_show'=>$data];
//        var_dump($info);exit;
        $res = BrandModel::where('brand_id',$id)->update($info);
//        var_dump($res);exit;
        if($res !== false){
            return $this->message('00000','修改成功','/admin/brand');
        }else{
            return $this->message('00001','修改失败','');
        }
    }
}
