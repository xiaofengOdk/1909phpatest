<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\Attr;
use App\Models\AttrVal;
use App\Models\Cate;
use App\Models\Goods;
use App\Models\Sku;
use Illuminate\Http\Request;
use App\Models\NavModel;
use App\Models\FootModel;
use App\Models\BrandModel;
use Illuminate\Support\Facades\DB;

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
        return view('index/goods/goodslist',["nav"=>$nav,"brand"=>$brand,"footInfo"=>$footInfo,'brandInfo'=>$brandInfo,'goodsInfo'=>$goodsInfo,'cate'=>$cate,'goods_hot'=>$goods_hot,'attr'=>$attr,'attrval'=>$attrval,'price'=>$price]);
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
            // dump($end);
            // number_format — 以千位分隔符方式格式化一个数字
            $price[]=number_format($start,0).'-'.number_format($end,0);
        }
        $price[]=$max_price.'及以上';
        return $price;
    }
    //根据条件获取新数据
    public function getnewinfo(Request $request){
//        $all = $request->all();
//        print_r($all);
        $cate_id = $request->cate_id;
        $where=[
            ['is_del','=',1],
            ['cate_id','=',$cate_id]
        ];
        $brand_id=$request->brand_id;
        if(!empty($brand_id)){
            $where[]=['brand_id','=',$brand_id];
        }
        $price = $request->goods_price;
        //处理价格
        if(!empty($price)){
            //价格中是否有-
            if(substr_count($price,'-')>0){
                //根据-分割
                $price=explode('-',$price);
//                dd($price);
                $where[]=['goods_price','>=',$price[0]];
                $where[]=['goods_price','<=',$price[1]];
            }else{
                //否则
                //把字符串转化为整数 数据类型 强制转化 自动转化
                $goods_price=(float)$price;
                $where[]=['goods_price','>=',$goods_price];
            }
        }
        $field = $request->field;

        if(!empty($field)){
            $where[]=[$field,'=',1];
        }
        //分页  待完成
        $page = $request->page;
        //sku 待完成
        $sku = $request->sku;
//        echo $sku;exit;
        if(!empty($sku)){
//            echo 123;exit;
            $info = Sku::where('sku',$sku)->get()->toArray();
//            var_dump($info);exit;
            if(!empty($info)){
//                echo 123;exit;
                foreach($info as $k=>$v){
                    $where2 = [
                        ['goods.is_del','=',1],
                        ['goods.cate_id','=',$cate_id],
                        ['goods.goods_id','=',$v['goods_id']]
                    ];
                    $goodsInfo = Goods::leftjoin('sku','goods.goods_id','=','sku.goods_id')->where($where2)->paginate(10);
                }
            }else{
                $goodsInfo='';
            }
        }else{
            $goodsInfo = Goods::where($where)->orderBy('goods_price','asc')->paginate(10);
        }
//        var_dump(123);exit;
        return view('index/goods/newinfo',['goodsInfo'=>$goodsInfo,'field'=>$field]);
    }
}
