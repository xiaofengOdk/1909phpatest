<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\Cary;
use App\Models\Goods;
use App\Models\Sku;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\NavModel;
use App\Models\BrandModel;
use App\Models\FootModel;
class CartController extends Controller
{
    //购物车展示
    public function cart_list(Request $request)
    {
        $footInfo=FootModel::get();
        $brand = BrandModel::where("brand_show",1)->get();//热卖
        $nav = NavModel::get();//导航

        $goods_name= $request->goods_name;
//        dd($goods_name);
        $where1 = [];
        if($goods_name){
            $where1[] = ['goods_name',"like","%$goods_name%"];
        }
        $where=[
            ['cary.is_del','=',1]
        ];
        $cartinfo=Cary::leftjoin('goods','cary.goods_id','=','goods.goods_id')
            ->leftjoin('user','cary.user_id','=','user.user_id')
            ->where($where1)
            ->where($where)
            ->get();
//        dd($cartinfo);

        return view('index.cart.add',
            [
                'nav'=>$nav,
                'brand'=>$brand,
                'footInfo'=>$footInfo,
                'cartinfo'=>$cartinfo,
            ]);
    }

    //购物车的加减
    public function cart_num(Request $request)
    {
        $res=$request->all();
        $a1=array_key_exists('cary_id',$res); //判断键名有没有k
        $a2=array_key_exists('id',$res);
        $a3=array_key_exists('num_jian',$res); //事件 num_jian
        if($a1==false||$a2==false||$a3==false){
            $fh=['a1'=>'1','a2'=>'参数缺失'];
            return json_encode($fh);exit;
        }
        $eva_f1=Cary::where([['cary_id',$res['cary_id']],['is_del','1']])->first(); //查询购物车
        $shu_a=$eva_f1['buy_number']; //购物车的商品数量
//        dd($eva_f1);

        $eva_f2=Sku::where('id',$res['id'])->first(); //关联表 查库存
        $shu_b=$eva_f2['goods_store'];   //关联表的商品库存
//        dd($eva_f2);
        // return json_encode($shu_b);exit;
        $stocks=0;
        if($res['num_jian']=='num_jia'){
            if(($shu_a+1)<=$shu_b){
                $goods_store=$shu_a+1;
            }else{
                $stocks=$stocks+1;
                $goods_store=$shu_b;
            }
        }else  if($res['num_jian']=='num_jian'){
            $goods_store=$shu_a-1;
            if($goods_store<=0){
                $goods_store=1;
            }
        }
        $goods_totall=$goods_store*$eva_f2['goods_price']; //总价
        $xg=Cary::where([['cary_id',$res['cary_id']],['is_del','1']])->update([ //修改购物车
            'buy_number'=>$goods_store,
            'goods_totall'=>$goods_totall
        ]);
        $goods_vl=['jk_1'=>$goods_store,'jk_2'=>$goods_totall];
        if($xg){
            $fh=['a1'=>'0','a2'=>'修改成功','a3'=>$goods_vl];
        }else{
            if($stocks>0){
//                $fh=['a1'=>'1','a2'=>'已是最大库存'];
                return [
                    'code'=>'00009',
                ];
            }else{
                return [
                    'code'=>'00009',
                ];
                $fh=['a1'=>'1','a2'=>'修改失败'];
            }
        }
        return json_encode($fh);
    }

    //购物车删除
    public function cart_del(Request $request)
    {

    }
}
