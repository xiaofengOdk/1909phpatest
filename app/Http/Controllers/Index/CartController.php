<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\AttrVal;
use App\Models\Cary;
use App\Models\Goods;
use App\Models\Sku;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\NavModel;
use App\Models\BrandModel;
use App\Models\FootModel;
use Symfony\Component\HttpFoundation\Cookie;

class CartController extends Controller
{
    //购物车展示
    public function cart_list(Request $request)
    {
        $cart=Cary::get();
        $cart=count($cart);
        $xx=request()->all();
        $reg=session('reg');
        $user_id = $reg['user_id'];
        $footInfo=FootModel::get();
        $brand = BrandModel::where("brand_show",1)->get();//热卖
        $nav = NavModel::get();//导航
        #搜索
        $goods_name= $request->goods_name;
        $where1 = [];
        if($goods_name){
            $where1[] = ['goods_name',"like","%$goods_name%"];
        }
        $where2=[
            ['cary.user_id',"=",$user_id]
        ];
        $where=[
            ['cary.is_del','=',1]
        ];

        #判断用户是否登录(展示cookie中的值)
        if(empty($reg)){
//            dd(json_decode($request->cookie('test'),true));
            $cartinfo=$this->getCookie(request());
                if(empty($cartinfo)){
                    return redirect('/index/login');
                }
        }else{

            $cartinfo=Cary::leftjoin('goods','cary.goods_id','=','goods.goods_id')
                ->leftjoin('user','cary.user_id','=','user.user_id')
                ->leftjoin('sku','cary.id','=','sku.id')
                ->where($where1)
                ->where($where)
                ->where($where2)
                ->get();
        }
        $cate_id=$request->cate_id;
        $history_goods=Goods::where([
            ["cate_id"=>$cate_id],
            ['is_show','1'],['is_del','1']
        ])->limit(8)->get();
        $dels_vl=Cary::where('user_id',4)->where('is_del','2')->get();
        $sum_up=count($dels_vl);
        foreach($dels_vl as $r1=>$r2){
            $property=Sku::where('id',$r2['id'])->first();

            $sku_vl_id=$this->explode_id($property);
            $sku_vl_val=AttrVal::wherein('id',$sku_vl_id)->where('is_del','1')->get();
            $property['sku']=$sku_vl_val;

            $r2['id']=$property;
            $goods=Goods::where([['goods_id',$r2['goods_id']],['is_del','1']])->first();
            $r2['goods_id']=$goods;
        }
        return view('index.cart.add',
            [
                'nav'=>$nav,
                'brand'=>$brand,
                'footInfo'=>$footInfo,
                'cartinfo'=>$cartinfo,
                'history_goods'=>$history_goods,
                'dels_vl'=>$dels_vl,
                'cart'=>$cart
            ]);
    }
    //未登录 展示cookie中的值
    public function getCookie($request)
    {
     #   取cookie的值
        $cartInfo=request()->cookie('test');
        $cartInfo = json_decode($cartInfo,true);
//    dd($cartInfo);
        if(!empty($cartInfo)){
            #循环根据商品id 查询商品表中的数据
            $shop = [];
            foreach ($cartInfo as $k=>$v){
                $shop[] =$v['goods_id'];
        }
            $cartInfo = collect(Goods::leftjoin("cary","goods.goods_id","=","cary.goods_id")
                ->whereIn("goods.goods_id",$shop)
                ->get())
                ->toArray();
            return $cartInfo;
        }
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

    //购物车中间的数字
    public function cart_nums(Request $request)
    {
        $res=$request->all();
        $a1=array_key_exists('cary_id',$res); //判断键名有没有k
        $a2=array_key_exists('goods_store',$res);
        $a3=array_key_exists('sku_id',$res);
        if($a1==false||$a2==false||$a3==false){
            $fh=['a1'=>'1','a2'=>'参数缺失'];
            return json_encode($fh);exit;
        }
        $eva_f1=Cary::where([['cary_id',$res['cary_id']],['is_del','1']])->first(); //查询购物车


        $eva_f2=Sku::where('id',$res['sku_id'])->first(); //关联表 查库存

        $shu_b=$eva_f1['buy_number']; //购物车的商品数量
        $shu_c=$eva_f2['goods_store'];   //关联表的商品库存
        $stocks=0;
        if($res['goods_store']>$shu_b){
            $goods_store=$shu_b;
        }else{
            $goods_store=$res['goods_store'];
        }
        $price_total=$goods_store*$shu_c;
        $xg=Cary::where([['cary_id',$res['cary_id']],['is_del','1']])->update([
            'buy_number'=>$goods_store,
            'goods_totall'=>$price_total
        ]);
        $goods_vl=['jk_1'=>$goods_store,'jk_2'=>$price_total];
        if($xg){
            $fh=['a1'=>'0','a2'=>'修改成功','a3'=>$goods_vl];
        }else{
            $fh=['a1'=>'1','a2'=>'修改失败'];
        }
        return json_encode($fh);
    }

    //删除提示信息
    public function message($code,$msg,$url=''){
        $message = [
            'code'=> $code,
            'msg'=> $msg,
            'url'=> $url
        ];
        return json_encode($message,JSON_UNESCAPED_UNICODE);
    }

    //购物车删除
    public function cart_del(Request $request)
    {
        $cary_id=$request->post('cary_id');
        $bol=Cary::where('cary_id',$cary_id)->update(['is_del'=>2]);
        if($bol){
            return $this->message('00000','删除成功','/index/cart_list');
        }else{
            return $this->message('00001','删除失败');
        }
    }

    /**
     * 批量删除
     * @return string
     */
    public function cart_dels(){
        $xx=request()->all();
        $a1=array_key_exists('cary_id',$xx);
        if($a1==false){
            $fh=['a1'=>'1','a2'=>'参数缺失'];
            return json_encode($fh);exit;
        }
        $xx['cary_id']=explode(',',$xx['cary_id']);
        $dels=Cary::wherein('cary_id',$xx['cary_id'])->where('is_del','1')->update(['is_del'=>'2']);

        $dels_vl=Cary::wherein('cary_id',$xx['cary_id'])->where('is_del','2')->get();
        $sum_up=count($dels_vl);
        foreach($dels_vl as $r1=>$r2){
            $property=Sku::where('id',$r2['id'])->first();

            $sku_vl_id=$this->explode_id($property);
            $sku_vl_val=AttrVal::wherein('id',$sku_vl_id)->where('is_del','1')->get();
            $property['sku']=$sku_vl_val;

            $r2['id']=$property;
            $goods=Goods::where([['goods_id',$r2['goods_id']],['is_del','1']])->first();
            $r2['goods_id']=$goods;
        }
        if($dels){
            $fh=['a1'=>'0','a2'=>'删除成功','a3'=>$dels_vl,'a4'=>$sum_up];
        }else{
            $fh=['a1'=>'1','a2'=>'删除失败'];
        }
        return json_encode($fh);
    }

    //sku才分数组
    public function explode_id($xxi){
        $sxing=[];
        $c=0;
        $v=$xxi;
        $sku=explode(',',$v['sku']);
        foreach($sku as $f=>$g){
            $a1=strpos($g,'[')+1;
            $a2=strpos($g,':');
            $a2_s=$a2-$a1;
            $a3=substr($g,$a1,$a2_s);//属性id

            $a=strpos($g,':')+1;
            $b=strpos($g,']');
            $b_s=$b-$a;
            $c=substr($g,$a,$b_s);//属性值id
            if(array_key_exists($a3,$sxing)){
                $yvl=$sxing[$a3];
                $yvl_s=explode(',',$yvl);
                $num_s=0;
                foreach($yvl_s as $y1=>$y2){
                    if($y2==$c){
                        $num_s=$num_s+1;
                    }
                }
                if($num_s==0){
                    $sxing[$a3]=$yvl.$c.',';
                }
            }else{
                // $yvl='';
                $sxing[$a3]=$c.',';
            }
            // $sxing[$a3]=$yvl.$c.',';

        }

        foreach($sxing as $r=>$t){
            if(strlen($t)>1){
                $cd=strlen($t)-1;
                $sxing[$r]=substr($t,0,$cd);
            }else{
                $sxing[$r]='';
            }
        }

        $sxing=array_unique($sxing);
        return $sxing;
    }

    //重新加入
    public function cart_num_del_new(){
        $xx=request()->all();
        $a1=array_key_exists('cary_id',$xx);
        if($a1==false){
            $fh=['a1'=>'1','a2'=>'参数缺失'];
            return json_encode($fh);exit;
        }
        $del_new=Cary::where([['cary_id',$xx['cary_id']],['is_del','2']])->update(['is_del'=>'1']);
        $new_vl=Cary::where([['cary_id',$xx['cary_id']],['is_del','1']])->get();
        foreach($new_vl as $r1=>$r2){
            $property=Sku::where('id',$r2['id'])->first();

            $sku_vl_id=$this->explode_id($property);
            $sku_vl_val=AttrVal::wherein('id',$sku_vl_id)->where('is_del','1')->get();
            $property['sku']=$sku_vl_val;

            $r2['id']=$property;
            $goods=Goods::where([['goods_id',$r2['goods_id']],['is_del','1']])->first();
            $r2['goods_id']=$goods;
        }
        if($del_new){
            $fh=['a1'=>'0','a2'=>'重新加入成功','a3'=>$new_vl];
        }else{
            $fh=['a1'=>'1','a2'=>'重新加入失败'];
        }
        return json_encode($fh);
    }

    //彻底删除
    public function cart_delds(Request $request)
    {
        $cary_id=$request->post('cary_id');
        $bol=Cary::where('cary_id',$cary_id)->update(['is_del'=>3]);
        if($bol){
            return $this->message('00000','删除成功','/index/cart_list');
        }else{
            return $this->message('00001','删除失败');
        }

    }
    public function goshop(){
        // print_R(request()->all());
        $goods_id=request()->goods_id;
        $goods_id=explode(",",$goods_id);
        // dd($goods_id);
        $cary=new Cary;
        $user_id=session('reg');
        $user_id=$user_id['user_id'];
        // dd($user_id);
        $cary=[];
        foreach($goods_id as $k=>$v){
           $goods_info= Goods::where("goods_id",$v)->first();
            $cary['user_id']=$user_id;
            $cary['goods_id']=$v;
            $cary['buy_number']=1;
            $cary['add_time']=time();
            $cary['id']=1;
            $cary['goods_price_one']=$goods_info['goods_price'];
            $result=Cary::insert($cary);
        }
        // dd($result);
        if($result){
            return [
                'code'=>"0000",
                'message'=>"成功"
            ];
        }else{
            return [
                'code'=>"0004",
                "message"=>"失败"
            ];
        }
    }
}
