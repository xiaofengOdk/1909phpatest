<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attr;
use App\Models\AttrVal;
use App\Models\Cate;
use App\Models\Goods;
use App\Models\Area;
use App\Models\Cary;
use App\Models\NavModel;
use App\Models\FootModel;
use App\Models\BrandModel;
use App\Models\User_Address;
class AddressController extends Controller
{
     public function user_address(){

         $reg=$this->getAddress();

        //查询所有的省份 作为第一个下拉菜单的值  pid=0
        $proInfo=$this->getAreaInfo(0);
        $cart=Cary::get();
        $cart=count($cart);
        $nav = NavModel::get();//导航
        $footInfo=FootModel::get();//底部导航
        $brand = BrandModel::limit(7)->get();//热卖
      return view('index.address.address',['nav'=>$nav,
                  'footInfo'=>$footInfo,
                  'brand'=>$brand,
                  'proInfo'=>$proInfo,
                  'cart'=>$cart,
                  'reg'=>$reg
              ]);
     }

  


      /*获取区域信息*/
      public function getAreaInfo($pid){
        $area_model=new Area();
        $where=[
          ['pid','=',$pid]
        ];
       $info=$area_model->where($where)->get();
       
       return $info;
   }
 
   /* 获取地区*/
   public function getCity(){
      $id=request()->id;
      $City_Info=$this->getAreaInfo($id);
     
      return  json_encode($City_Info);
   }


   //获取当前登录用户的收货地址
  public function getAddress(){
    //查询所有收货地址--作为列表的数据
    $user_id=session('reg')->user_id;
    $UserAddressModel=new User_Address();
   
    $where=[
       ['user_id','=',$user_id],
       ['is_del','=',1],
     
    ];
    $reg=$UserAddressModel->where($where)->get();
    $area_model=new Area;
    foreach($reg as $k=>$v){
         $reg[$k]['province']=$area_model->where('id',$v['province'])->value('name');
         $reg[$k]['city']=$area_model->where('id',$v['city'])->value('name');
         $reg[$k]['area']=$area_model->where('id',$v['area'])->value('name');

    }
     return $reg;
  }

  public function addressdo(){
      $user_id=session('reg')->user_id;
      $data=request()->all();
      $data['user_id']=$user_id;
      $data['add_time']=time();
      $UserAddressModel=new User_Address();
      $reg=$UserAddressModel->insert($data);
      if($reg){
           return $message=[
             'code'=>'00000',
             'message'=>'添加地址成功',
             'result'=>''
           ];
           die;
      }else{
        return $message=[
          'code'=>'00001',
          'message'=>'系统错误',
          'result'=>''
        ];
        die;
      }
      
  }

  public function del($id){
    $UserAddressModel=new User_Address();
    $reg=$UserAddressModel->where('id',$id)->update(['is_del'=>2]);
    if($reg){
       return redirect('/user/user_address');
    }
  }

  public function default($id){
   
    $UserAddressModel=new User_Address();
    $regs=$UserAddressModel->where('is_del',1)->update(['is_moren'=>1]);
    $reg=$UserAddressModel->where('id',$id)->update(['is_moren'=>2]);
   
    if($reg){
      
       return redirect('/user/user_address');
    }
  }
  
}
