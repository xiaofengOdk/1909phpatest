<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BrandModel;
use App\Models\Cate;
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
    //无限极分类的方法
    public static function list_level($data,$pid=0,$level=0)//三个参数与上面index方法里面穿的参数相对应
    {
        static $array=[];
        foreach($data as $k=>$v){
            if($pid==$v->parent_id){
                $v->level=$level;
                $array[]=$v;
                self::list_level($data,$v->cate_id,$level+1);
            }
        }
        return $array;
    }
    public function brand(){
<<<<<<< Updated upstream
        $brand_name=request()->brand_name;

        $where=[
            ['brand_name','like',"%$brand_name%"],
            ['is_del','=',1]
        ];
        $info = BrandModel::leftjoin('cate','brand.cate_id','=','cate.cate_id')->where($where)->paginate(2);
	//dd($info);
        $cate = Cate::get();
        $cateinfo = $this->list_level($cate);
//        print_r($cateinfo);exit;
        return view('admin/goods/brand',['info'=>$info,'cateinfo'=>$cateinfo]);
=======
        $info = BrandModel::where('is_del',1)->paginate(2);
<<<<<<< HEAD
		//dd($info);
=======
        // dd($info);
>>>>>>> 1d51503d5359745f47718cac0f4ebae98f92980f
        return view('admin/goods/brand',['info'=>$info]);
>>>>>>> Stashed changes

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
        $cate = Cate::get();
        $cateinfo = $this->list_level($cate);
        return view('admin/goods/brandedit',['info'=>$info,'cateinfo'=>$cateinfo]);
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
