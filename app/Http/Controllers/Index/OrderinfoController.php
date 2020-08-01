<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Goods;
use App\models\AdtgModel;
use App\models\Cary;
use App\Models\NavModel;
use App\Models\BrandModel;
use App\Models\FootModel;
use App\MOdels\Order_goods;
use App\Models\Score;
use App\Models\User_Address;
use App\Models\User;
use App\Models\User_info;
use App\Models\Order_info;
class OrderinfoController extends Controller
{
    public function index(){
        $nav = NavModel::get();//导航
        $brand = BrandModel::limit(7)->get();//热卖
        $footInfo=FootModel::get();
        $cart=Cary::get();
        $cart=count($cart);
        // 订单
        $order = Order_goods::where("order_t",1)->leftjoin("goods","order_goods.goods_id","=","goods.goods_id")->get();
       $reg = session("reg");
       $user_id = $reg['user_id'];
       $score = Score::where("user_id",$user_id)->first();
       $score2 = $score['score'];
       $score3 = $score2/10;
    //    dd($score3);
        $price = Order_goods::get();

        $shop =0;
        foreach($price as $k=>$v){
            $shop=$shop+$v['order_price'];
        }

        $goodsss_id=[];
        foreach($order as $k=>$v){
            // print_R($v['goods_id']);
            $goodsss_id[$k]=$v['goods_id'];
        }
        // print_R(implode(",",$goodsss_id));
        // exit;
        $goodsss_id=implode(",",$goodsss_id);
        $num = $shop-$score3;
    //    dd($num);
        // 收货地址
       
        $address = User_Address::where(["user_id"=>$user_id,"is_del"=>1])->get();
        // dd($address);
        return view("index.orderinfo.index",compact("nav","brand","goodsss_id","footInfo","order","score","shop","num","score3","cart","address"));
    }

    public function order_sub(){
        $info = request()->all();
        $a = rand(99999,000001);
        $sn = time().$a; //订单号
        $reg = session("reg");
        $user_id = $reg['user_id'];
        $goods_price = $info['price'];
        $data = [
            "order_sn"=>$sn,
            "user_id"=>$user_id,
            "order_amount"=>$goods_price,
            "add_time"=>time(),
            "payname"=>1,
        ];
        $res = Order_info::insert($data);
        $goods_id = $info['goods_id'];
        $goods_id = explode(",",$goods_id);
        $da=Order_info::where("order_sn",$sn)->first();
        $order_id = $da['order_id'];
        // dd($order_id);
        foreach($goods_id as $k=>$v){
           $order = Order_goods::where("goods_id",$v)->update(['order_id'=>$order_id,"order_t"=>2]);
            // dump($v['goods_id']);
        }
        if($order){
           return $message = [
                "code"=>00003,
                "success"=>true,
                "message"=>"下单成功",
                'result'=>$order_id
            ];
        }
        
    }
    // 默认地址
    public function moren($id){
        $UserAddressModel=new User_Address();
        $regs=$UserAddressModel->where('is_del',1)->update(['is_moren'=>1]);
        $reg=$UserAddressModel->where('id',$id)->update(['is_moren'=>2]);
    
        if($reg){
        
        return redirect('/order/index');
        }
    }
    // 删除
    public function del($id){
        $UserAddressModel=new User_Address();
        $reg=$UserAddressModel->where('id',$id)->update(['is_del'=>2]);
        if($reg){
           return redirect('/order/index');
        }
    }
    public function index_do(){
        // print_R(request()->all());
            $goods_id=request()->goods_id;
        $goods_id=explode(",",$goods_id);
        // dd(trim(request()->goods_price));
        $cary=new Cary;
        $user_id=session('reg');
        $user_id=$user_id['user_id'];
        // dd($user_id);
        $cary=[];
        foreach($goods_id as $k=>$v){
           $goods_info= Cary::leftjoin("goods","cary.goods_id","=","goods.goods_id")->where("goods.goods_id",$v)->first();
            $cary['user_id']=$user_id;
            $cary['goods_id']=$v;
            $cary['buy_number']=$goods_info['buy_number'];
            $cary['order_price']=$goods_info['buy_number']*$goods_info['goods_price_one'];
            // $cary['number']=1;
            // $cary['goods_price_one']=$goods_info['goods_price'];
            $result=Order_goods::insert($cary);
        }
        print_R($result);
    }
}
