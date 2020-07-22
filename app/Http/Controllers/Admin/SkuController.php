<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attr;
use App\Models\AttrVal;
use Illuminate\Http\Request;

class SkuController extends Controller
{
    //属性表
    //展示
    public function attr_add(Request $request)
    {
        $data=Attr::where('is_del',1)->get();
        return view('admin.sku.attr_add',['data'=>$data]);
    }
    //添加
    public function attr_adds(Request $request)
    {
        $attr_name=$request->post('attr_name');
        if(empty($attr_name)){
            return $this->message('001','属性名称不能为空','');
        }
        $data=[
            'attr_name'=>$attr_name,
            'add_time'=>time(),
            'is_del'=>1,
        ];
        $bol=Attr::insert($data);
        if($bol){
            return $this->message('200','属性添加成功','/admin/attr_add');
        }else{
            return $this->message('002','属性添加失败','');
        }
    }
    //删除
    public function attr_del(Request $request)
    {
        $attr_id=$request->post('attr_id');
        $bol=Attr::where('attr_id',$attr_id)->update(['is_del'=>2]);
        if($bol){
            return $this->message('200','删除成功','/admin/attr_add');
        }else{
            return $this->message('003','删除失败');
        }
    }

    //属性值表
    //展示
    public function attrval_add(Request $request)
    {
        $data=AttrVal::leftjoin('attr','attrval.attr_id','=','attr.attr_id')
            ->where( 'attrval.is_del',1)
            ->get(['attrval.attrval_name','attrval.add_time','attr.attr_name','attrval.id'])
            ->toArray();
        $res = Attr::get();
        return view('admin.sku.attrval_add',['data'=>$data,'res'=>$res]);
    }
    //添加
    public function attrval_adds(Request $request)
    {
        $attrval_name=$request->post('attrval_name');
        $attr_id=$request->attr_id;
        if(empty($attrval_name)){
            return $this->message('001','属性名称不能为空','');
        }
        $data=[
            'attrval_name'=>$attrval_name,
            'attr_id'=>$attr_id,
            'add_time'=>time(),
            'is_del'=>1,
        ];
        $bol=AttrVal::insert($data);
        if($bol){
            return $this->message('200','属性值添加成功','/admin/attrval_add');
        }else{
            return $this->message('002','属性值添加失败','');
        }
    }

    //删除
    public function attrval_del(Request $request)
    {
        $id=$request->post('id');
        $bol=AttrVal::where('id',$id)->update(['is_del'=>2]);
        if($bol){
            return $this->message('200','删除成功','/admin/attrval_add');
        }else{
            return $this->message('003','删除失败');
        }
    }

    //错误提示
    public function message($code,$msg,$url=''){
        $message = [
            'code'=> $code,
            'msg'=> $msg,
            'url'=> $url
        ];
        return json_encode($message,JSON_UNESCAPED_UNICODE);
    }

}
