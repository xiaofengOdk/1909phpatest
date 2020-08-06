<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Cary;
use App\Models\Sku;
use App\Models\Goods;
use App\Models\NavModel;
use App\Models\BrandModel;
use App\Models\FootModel;
class CartshopController extends Controller
{
    public function cart_add(Request $request){
        $goods_id = $request->goods_id;
        $buy_number = $request->buy_number;
       // dd(request()->all());
        $reg = session("reg");
        $sku=request()->sku;
        $sku_info=Sku::where(["sku"=>$sku,"goods_id"=>$goods_id])->first();
       // dd($sku_info);
        // $sku=explode(",",$sku);
        // dd($sku_info);

        // exit;
        $user_id = $reg['user_id'];
        if($user_id==null){
            return $message=[
                "code"=>00004,
                "url"=>"/index/login",
                "message"=>"请登录",
                "success"=>false,
            ];exit;
        }
        if($user_id==null){
                $cartdata = cookie("cartdata");
                // $buy_number = 1;
                $goods = Sku::where(["goods_id"=>$goods_id])->get();
                // 判断库存
                    foreach($goods as $k=>$v){
                        // print_R($v['sku']);
                        // print_r( $sku);
                            if($v['sku']==$sku){
                                return $message=[
                                         "code"=>00001,
                                        "message"=>"已加入购物车",
                                        "success"=>true,
                                        ];
                            }else{
                                return $message=[
                                    "code"=>00004,
                                    "message"=>"库存不足",
                                    "success"=>false,
                                ];
                                exit;
                            }
                     }
                // dd(1);
                if($goods['goods_store']<$buy_number){
                    return $message=[
                            "code"=>00001,
                            "message"=>"库存不足",
                            "success"=>false,
                        ];
                            exit;
                }

                $id=request()->goods_id;
                // dd($id);
                // $id=implode("",$id);
                $cookie = $request->cookie('test');
                if(empty($cookie)){
                    $cookie = [];
                }
                // dd($cookie);
                if($cookie==[]){
                    // echo 2;exit;
                    $goods_id  = request()->goods_id;
                    $cartdata=[];
                    $cartdata[$goods_id] = [
                        "goods_id"=>$request->goods_id,
                        "buy_number"=>$buy_number,
                        "add_time"=>time(),
                    ];
                    $cartdata[$goods_id]["goods_id_".$goods_id]=$goods_id;
                    $cartdata=json_encode($cartdata);
                }else{
                    // echo 1;
                    $cookie=json_decode($cookie);
//                if(array_key_exists("goods_id_".$id,$cookie)){
                if(array_key_exists($id,$cookie)){
                    // dd(1);
                    if($goods['goods_store']<$buy_number){
                        $carts = $goods['goods_store'];
                    }else{
                        // dd($cookie->buy_number+$buy_number);
                        $cart = $cookie->buy_number+$buy_number;
                        #当购买数量相加时超过库存时
                        if($goods['goods_store']<$cart){
                            return [
                                "code"=>00002,
                                "message"=>"库存不足",
                                "success"=>false,
                            ];
                                exit;
                        }
                    }
                    $cartdata[$goods_id] = [
                        "buy_number"=>$cart,
                        "goods_id"=>$id,
                        "add_time"=>time(),
                    ];
                    $cartdata[$goods_id]["goods_id_".$id]=$id;
                    // dd($);
                    $cartdata=json_encode($cartdata);
                }else{
                    // dd(2);
                    $goods_id  = request()->goods_id;
                    $cartdata=[];
                    $cartdata[$goods_id] = [
                        "goods_id"=>$request->goods_id,
                        "buy_number"=>$buy_number,
                        "add_time"=>time(),
                    ];
                    $cartdata[$goods_id]["goods_id_".$goods_id]=$goods_id;
                    $cartdata=json_encode($cartdata);
                 }
                }
                Cookie::queue("test",$cartdata);
                    return $message=[
                        "code"=>00001,
                        "message"=>"已加入购物车",
                        "success"=>true,
                    ];


        }else{
            // 登录后
            // $buy_number = 1;
            $goods = Goods::where("goods_id",$goods_id)->first();
            // 判断库存
            if($goods['goods_store']<$buy_number){
                return $message=[
                        "code"=>00001,
                        "message"=>"库存不足",
                        "success"=>false,
                    ];
                        exit;
            }
            $cart = Cary::where(["user_id"=>$user_id,"goods_id"=>$goods_id,"is_del"=>1])->first();
            $cart2 = Cary::where(["user_id"=>$user_id,"goods_id"=>$goods_id,"is_del"=>2])->first();
            if($cart2){
                $buy_number = $buy_number;
                if($goods['goods_store']<$buy_number){
                    $buy_number = $goods->goods_store;
                }
                $res3 = Cary::where(["user_id"=>$user_id,"goods_id"=>$goods_id,"is_del"=>2])->update(['buy_number'=>$buy_number,'add_time'=>time(),"is_del"=>1]);
            // dd($res2);
                
                if($res3){
                    return $message=[
                        "code"=>00001,
                        "message"=>"已加入购物车",
                        "success"=>true,
                    ];
                }

            }
            if($cart){
                $buy_number = $cart->buy_number+$buy_number;
                if($goods['goods_store']<$buy_number){
                    $buy_number = $goods->goods_store;
                }
                
            $res = Cary::where(["user_id"=>$user_id,"goods_id"=>$goods_id])->update(['buy_number'=>$buy_number,'add_time'=>time()]);
                if($res){
                    return $message=[
                        "code"=>00001,
                        "message"=>"已加入购物车",
                        "success"=>true,
                    ];
                }

            }else{
                $data = [
                    "user_id"=>$user_id,
                    "goods_id"=>$request->goods_id,
                    "buy_number"=>$buy_number,
                    "add_time"=>time(),
                    "id"=>$sku_info['id'],
                ];
                    $res2 = Cary::insert($data);
                    if($res2){
                        return $message=[
                            "code"=>00001,
                            "message"=>"已加入购物车",
                            "success"=>true,
                        ];
                    }
            }
        }
        
       
    }

    public function test(Request $request){
        // $reg = session("reg");
        // if($reg){
           
        //                 dd($cookie);

        // }
       
    }
}
