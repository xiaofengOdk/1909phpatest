<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
class SlideController extends Controller
{
    // 展示
    public function slide_show(){
        $res = Slide::where("is_show",1)->paginate(2);

        return view("admin.slide.slide_show",compact('res'));
    }
    // 添加
    public function slide_add(Request $request){
        $ta = $request->all();
        // dd($data);
        // if($request->hasFile('Filename')){ //hasFile 方法判断文件在请求中是否存在
        //     $data['Filename'] = $this->uploads('Filename');
        // }
        // dd($data);
        if($request->hasFile('slide_log')){ //hasFile 方法判断文件在请求中是否存在
            $da['slide_log'] = $this->Moreupload('slide_log');
        }
        $data = [
            "slide_log"=>$da['slide_log'],
            "is_show"=>1,
            "add_time"=>time(),
            "slide_weight"=>$ta['slide_weight'],
        ];
        $res = Slide::insert($data);
        if($res){
           return Redirect("admin/slide_show");
        }
       
    }
   
   
    // 修改
    public function slide_upd($id){
        $res = Slide::find($id);
        return view("admin.slide.slide_upd",compact("res"));
    }
    public function slide_upddo($id){
        $data = request()->all();
        
        if(request()->hasFile('slide_log')){ //hasFile 方法判断文件在请求中是否存在
            $data['slide_log'] = $this->Moreupload('slide_log');
        }
      
        $res = Slide::where("slide_id",$id)->update($data);
        if($res){
            return Redirect("admin/slide_show");
        }
        if($res==0){
            return Redirect("admin/slide_show");
        }
        
    }
    public function Moreupload($img){
        $file = request()->file($img);
        // dd($file);
        if($file->isValid()){
            $info = $file->store('upload');
        }
        return $info;
    }
}
