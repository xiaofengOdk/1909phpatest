<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\Attr;
use App\Models\AttrVal;
use App\Models\Cary;
use App\Models\Cate;
use App\Models\Goods;
use App\Models\Sku;
use Illuminate\Http\Request;
use App\Models\NavModel;
use App\Models\FootModel;
use App\Models\BrandModel;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class GoodsController extends Controller
{
    /**
     * 商品列表
     */
    public function goods_list($id){
//        echo "<script>alert('添加成功');location.href='/'</script>";
//        echo $id;
        $nav = NavModel::get();//导航
        $footInfo=FootModel::get();//底部导航
        $brand = BrandModel::where("brand_show",1)->limit(7)->get();//热卖
        $brandInfo = BrandModel::where('cate_id',$id)->get();
        $cate = Cate::where('cate_id',$id)->first();
        $goodsdata = Goods::where('cate_id',$id)->get()->toArray();
//        dd($goodsdata);
        $cart=Cary::get();
        $cart=count($cart);
        $where=[
            ['is_del','=',1],
            ['is_show','=',1],
            ['cate_id','=',$id]
        ];

        $goodsInfo = Goods::where($where)->paginate(10);
        $hotwhere = [
            ['is_hot','=',1],
            ['is_del','=',1]
        ];
        $goods_hot = Goods::where($hotwhere)->limit(4)->get();

        //获取属性
        $attr = Attr::where('is_del',1)->get();
        //属性值
        $attrval = AttrVal::get();
        $max_price = Goods::where($where)->max('goods_price');
        $price=$this->getSectionPrice($max_price);
        return view('index/goods/goodslist',["nav"=>$nav,"brand"=>$brand,"footInfo"=>$footInfo,'brandInfo'=>$brandInfo,'goodsInfo'=>$goodsInfo,'cate'=>$cate,'goods_hot'=>$goods_hot,'attr'=>$attr,'attrval'=>$attrval,'price'=>$price,'cart'=>$cart,'goodsdata'=>$goodsdata]);
    }
    //获取价格区间字段
    public function getSectionPrice($max_price){
        $price=[];
        $one_price=$max_price/5;
        // echo $one_price;
        for($i=0;$i<=4;$i++){
            // dump($i);
            $start=$one_price*$i;
            // dump($start);
            $end=$one_price*($i+1)-1;
//            $price[]=$start.'-'.$end;
            // dump($end);
            // number_format — 以千位分隔符方式格式化一个数字
            $price[]=number_format($start,0).'-'.number_format($end,0);
        }
        $price[]=$max_price.'及以上';
        return $price;
    }
    //重新获取区间价格
    public function getGoodsPrice(){
        $cate_id=cookie('cid');
        $brand_id=input('brand_id');
        // print_r($cate_id);
        // echo $brand_id;
        $where=[];
        if(!empty($cate_id)){
            $where[]=['cate_id','in',$cate_id];
        }
        if(!empty($brand_id)){
            $where[]=['brand_id','=',$brand_id];
        }
        $goods_model=new GoodsModel();
        $max_price=$goods_model->where($where)->value('max(goods_price)');
        $price=$this->getSectionPrice($max_price);
        // print_r($price);
        // 将数组转化为json类型
        echo json_encode($price);
    }
    //根据条件获取新数据
    public function getnewinfo(Request $request){
//        $all = $request->all();
//        print_r($all);
        $cate_id = $request->cate_id;
        $where=[
            ['goods.is_del','=',1],
            ['goods.cate_id','=',$cate_id]
        ];
        $brand_id=$request->brand_id;
        if(!empty($brand_id)){
            $where[]=['goods.brand_id','=',$brand_id];
        }
        $price = $request->goods_price;
        //处理价格
        if(!empty($price)){
            //价格中是否有-
            if(substr_count($price,'-')>0){
                //根据-分割
                $price=explode('-',$price);
                $price[0]=str_replace(',','',$price[0]);
                $price[1]=str_replace(',','',$price[1]);
//                dd($price);
                $where[]=['goods.goods_price','>=',$price[0]];
                $where[]=['goods.goods_price','<=',$price[1]];
            }else{
                //否则
                //把字符串转化为整数 数据类型 强制转化 自动转化
                $goods_price=(float)$price;
                $where[]=['goods.goods_price','>=',$goods_price];
            }
        }
        $field = $request->field;

        if(!empty($field)){
            $where[]=["goods.$field",'=',1];
        }
        //sku 待完成
        $sku = $request->sku;
        if(!empty($sku)){
//            echo $sku;exit;
            $where[]= ['sku.sku','like',"%$sku%"];
        }

        //分页  待完成
        $goodsInfo = Goods::leftjoin('sku','goods.goods_id','=','sku.goods_id')->where($where)
            ->paginate(10,['goods.goods_price','goods.goods_id','goods.goods_img','goods.goods_name','sku.sku'])->toArray();
//        dd($goodsInfo);

        if(!empty($price)){
            if(is_array($price)){
                $price=implode($price,'-');
            }
        }

//        dd($price);
        return view('index/goods/newinfo',['goodsInfo'=>$goodsInfo,'field'=>$field,'sku'=>$sku,'price'=>$price,'brand_id'=>$brand_id]);
    }
}
