<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\Cary;
use App\Models\Goods;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\NavModel;
use App\Models\BrandModel;
use App\Models\FootModel;
class CartController extends Controller
{
    public function cart_list()
    {
        $footInfo=FootModel::get();
        $brand = BrandModel::where("brand_show",1)->get();//热卖
        $nav = NavModel::get();//导航
        return view('index.cart.add',['nav'=>$nav,'brand'=>$brand,'footInfo'=>$footInfo]);
    }

    /**
     * 购物车添加
     * @param Request $request
     */
    public function add_Cart(Request $request)
    {
        $buy_number=$request->post('buy_number');
        $goods_id=$request->post('goods_id');
        $goods_where=[
            ['goods_id','=',$goods_id],
            ['buy_number','=',$buy_number]
        ];
        $goods_obj=Goods::where($goods_where)->first();
        // 判断用户是否登录
        if($this->checkHistory()){
            $res=$this->addCartDb($goods_id,$buy_number,$goods_obj);
        }else{
            $res=$this->addCartCookie($goods_id,$buy_number,$goods_obj);
        }
        if($res){
            $this->successly('');
        }else{
            $this->fail('加入购物车失败');
        }
        if(!$goods_obj){
            alert('商品没有找到！');
            exit;
        }
        #判断用户是否购买过该商品
        $cart_where=[
            ['goods_id','=',$goods_obj],
        ];
    }
    //判断session
    public function checkHistory(){
        return session('?userInfo');
    }
    //提示正确
    function fail($font){
        $arr=['code'=>2,'font'=>$font];
        echo json_encode($arr);
        exit;
    }
    //提示错误
    function successly($font=''){
        $arr=['code'=>1,'font'=>$font];
        echo json_encode($arr);
       exit;
    }
    //用户Id
    public function getUserId(){
        return session('userInfo.user_id');
    }

    //登录成功后加入购物车    数据添加到数据库
    public function addCartDb($goods_id,$buy_number,$goods_stor){
        $user_id=$this->getUserId();
        $where=[
            ['goods_id','=',$goods_id],
            ['user_id','=',$user_id],
            ['is_del','=',1]
        ];
        $cartinfo=Cary::where($where)->find();

        // 判断 数据库中此用户是否把此商品加入过购物车
        if(!empty($cartinfo)){
            // 检测库存
            if($buy_number+$cartinfo['buy_number']>$goods_stor){
                //将库存的值赋给购买数量
                $buy_number=$goods_stor;
            }else{
                // 把购买数量累加，加入时间改为当前时间
                $buy_number=$cartinfo['buy_number']+$buy_number;
            }
            $info=['buy_number'=>$buy_number,'add_time'=>time()];
            $res=Cary::where($where)->update($info);
        }else{
            // 否则
            // 检测库存
            if($buy_number>$goods_stor){
                $buy_number=$goods_stor;
            }
            // 把商品id、购买数量、加入购物车的时间、用户id  存入数据库
            $arr=['buy_number'=>$buy_number,'goods_id'=>$goods_id,'user_id'=>$user_id,'add_time'=>time()];
            $res=Cary::save($arr);
        }
        return $res;
    }
    //未登录加入购物车    数据存入cookie
    public function addCartCookie($goods_id,$buy_number,$goods_stor){
        $cartInfo=cookie('cartInfo');
        if(empty($cartInfo)){
            $cartInfo=[];
        }
        if(array_key_exists($goods_id,$cartInfo)){
            //检测库存
            if(($cartInfo[$goods_id]['buy_number']+$buy_number)>$goods_stor){
                $buy_num=$goods_stor;
            }else{
                //累加
                $buy_num=$cartInfo[$goods_id]['buy_number']+$buy_number;
            }
            $cartInfo[$goods_id]['buy_number']=$buy_num;
            $cartInfo[$goods_id]['add_time']=time();
        }else{
            //检测库存
            if($buy_number>$goods_stor){
                $buy_number=$goods_stor;
            }
            //添加
            //将商品id、加入购物车时间、购买数量  加入cookie
            $cartInfo[$goods_id]=['buy_number'=>$buy_number,'goods_id'=>$goods_id,'add_time'=>time()];
        }
        cookie('cartInfo',$cartInfo);
        return true;
    }

}
