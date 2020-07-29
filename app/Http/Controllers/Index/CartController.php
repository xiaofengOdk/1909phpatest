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


    public function aa(Request $request){
        $a=cookie('cartInfo');
        dump($a);
    }
    //修改购买数量
    public function changeBuyNumber(Request $request){
        $buy_number=$request->post('buy_number');
        $goods_id=$request->post('goods_id');
        //判断用户是否登录
        if($this->checkHistory()){
            $result=$this->changeBuyNumberDb($goods_id,$buy_number);
        }else{
            $result=$this->changeBuyNumberCookie($goods_id,$buy_number);
        }
        if($result!==false){
            $this->successly('');
        }else{
            $this->fail('操作有误');
        }
    }
    //修改购买数量----数据库
    public function changeBuyNumberDb($goods_id,$buy_number){
        $where=[
            ['goods_id','=',$goods_id],
            ['user_id','=',$this->getUserId()],
            ['is_del','=',1]
        ];
        // dump($where);die;
        $res=Cary::where($where)->update(['buy_number'=>$buy_number]);//1    0     false
        // dump($res);die;
        return $res;
    }
    //修改购买数量----cookie
    public function changeBuyNumberCookie($goods_id,$buy_number){
        $cartInfo=cookie('cartInfo');
        // dump($cartInfo);
        if(!empty($cartInfo)){
            //获取要购买的数量
            $cartInfo[$goods_id]['buy_number']=$buy_number;
            cookie('cartInfo',$cartInfo);
            return true;
        }
    }
    //获取小计
    public function getTotal(Request $request){
        $goods_id=$request->post('goods_id');
        $goods_price=Goods::where('goods_id','=',$goods_id)->value('goods_price');
        //判断是否登录
        if($this->checkHistory()){
            $total=$this->getTotalDb($goods_id,$goods_price);
        }else{
            $total=$this->getTotalCookie($goods_id,$goods_price);
        }
        $this->successly($total);
    }
    //获取小计-----数据库
    public function getTotalDb($goods_id,$goods_price){
        $where=[
            ['goods_id','=',$goods_id],
            ['user_id','=',$this->getUserId()],
            ['is_del','=',1]
        ];
        $buy_number=Cary::where($where)->value('buy_number');
        return $goods_price*$buy_number;
    }

    //获取小计-----cookie
    public function getTotalCookie($goods_id,$goods_price){
        $cartInfo=cookie('cartInfo');
        if(!empty($cartInfo)){
            //根据goods_id获取cookie中的购买数量
            $buy_number=$cartInfo[$goods_id]['buy_number'];
            //单价*购买数量
            return $goods_price*$buy_number;
        }
    }

    //获取总价
    public function getMoney(Request $request){
        $goods_id=$request->post('goods_id');
        // 判断用户是否登录
        if($this->checkHistory()){
            $money=$this->getMoneyDb($goods_id);
        }else{
            $money=$this->getMoneyCookie($goods_id);
        }
        echo $money;
    }
    //获取总价-----数据库
    /*
    public function getMoneyDb($goods_id){
        $where=[
            ['user_id','=',$this->getUserId()],
            ['g.goods_id','in',$goods_id],
            ['is_del','=',1]
        ];
        $res=Cary::field("buy_number,goods_price")
            ->alias('c')
            ->leftjoin('goods g','c.goods_id=g.goods_id')
            ->where($where)
            ->select();
        // print_r($res);
        $money=0;
        foreach($res as $k=>$v){
            $money+=$v['buy_number']*$v['goods_price'];
        }
        return $money;
    }
    */

    //获取总价-----cookie
    public function getMoneyCookie($goods_id){
        $cartInfo=cookie('cartInfo');
        //根据id查询商品表中的单价
        $goods_id=explode(',',$goods_id);
        if(!empty($cartInfo)){
            $money=0;
            foreach ($cartInfo as $k=>$v) {
                //查询cookie中的购买数量
                if(in_array($k,$goods_id)){
                    $goods_price=Goods::where('goods_id',$k)->value('goods_price');
                    $money+=$v['buy_number']*$goods_price;
                    // $v['goods_price']=$goods_price;
                }
            }
            return $money;
        }
    }

    //删除
    public function cartDel(Request $request){
        $goods_id=$request->post('goods_id');
        //判断用户是否登录
        if($this->checkHistory()){
            //删除数据库中的数据
            $res=$this->cartDelDb($goods_id);
        }else{
            //删除cookie中的数据
            $res=$this->cartDelCookie($goods_id);
        }
        if($res){
            $this->successly('');
        }else{
            $this->fail('删除失败');
        }
    }

    //删除数据库中的数据
    public function cartDelDb($goods_id){
        $where=[
            ['user_id','=',$this->getUserId()],
            ['goods_id','in',$goods_id],
            ['is_del','=',1]
        ];
        $res=Cary::where($where)->update(['is_del'=>2]);
        return $res;
    }

    //删除cookie中的数据
    public function cartDelCookie($goods_id){
        $cartInfo=cookie('cartInfo');
        if(!empty($cartInfo)){
            if(substr_count($goods_id,',')>0){
                $goods_id=explode(',',$goods_id);
                foreach($cartInfo as $k=>$v){
                    if(in_array($k,$goods_id)){
                        unset($cartInfo[$k]);
                    }
                }
            }else{
                unset($cartInfo[$goods_id]);
            }
            cookie('cartInfo',$cartInfo);
            return true;
        }
    }

    //确认订单
    /*
    public function confirmMoney(Request $request){
        //判断用户是否登录

        //接收商品id
        $goods_id=$request->post('goods_id');
        $where=[
            ['user_id','=',$this->getUserId()],
            ['is_del','=',1],
            ['g.goods_id','in',$goods_id]
        ];

        $info=Cary::field('g.goods_id,goods_img,goods_name,goods_price,goods_num,buy_number')
            ->alias('c')
            ->leftjoin('goods g','g.goods_id=c.goods_id')
            ->where($where)
            ->select();
        //获取总价
        $money=0;
        foreach($info as $k=>$v){
            $money+=$v['buy_number']*$v['goods_price'];
        }
        //查询收货地址信息
        $addressInfo=$this->getAddressInfo();
        $this->cateinfo();
        $this->assign('info',$info);
        $this->assign('money',$money);
        $this->assign('addressInfo',$addressInfo);
        return $this->fetch();
    }
    */

    //分类
    /*
    public function cateinfo()
    {
        $category_model=new CategoryModel();
        $where=[
            ['pid','=',0],
            ['is_nav_show','=',1]
        ];
        $data=$category_model->where($where)->limit(7)->select();
        $this->assign('data',$data);
        $info=$category_model->select();
        $leftInfo=getLeftInfo($info);
        $this->assign('leftInfo',$leftInfo);

    }
    */

    //获取收货地址列表信息
    /*
    public function getAddressInfo(){
        //收货地址展示
        $address_model=model('Address');
        $where=[
            ['user_id','=',$this->getUserId()],
            ['is_del','=',1]
        ];

        $addressInfo=$address_model->where($where)->select();
        if(!empty($addressInfo)){
            $addressInfo=$addressInfo->toArray();
        }
        // print_r($addressInfo);exit;
        // $area_model=new AreaModel();
        $area_model=model('Area');
        foreach($addressInfo as $k=>$v){
            $addressInfo[$k]['province']=$area_model->where('id',$v['province'])->value('name');
            $addressInfo[$k]['city']=$area_model->where('id',$v['city'])->value('name');
            $addressInfo[$k]['area']=$area_model->where('id',$v['area'])->value('name');
        }
        // dump($addressInfo);exit;
        return $addressInfo;
    }
    */

    /**
     * 模板变量赋值
     * @access protected
     * @param  mixed $name  要显示的模板变量
     * @param  mixed $value 变量的值
     * @return $this
     */
    protected function assign($name, $value = '')
    {
        $this->view->assign($name, $value);

        return $this;
    }
    /**
     * 加载模板输出
     * @access protected
     * @param  string $template 模板文件名
     * @param  array  $vars     模板输出变量
     * @param  array  $config   模板参数
     * @return mixed
     */
    protected function fetch($template = '', $vars = [], $config = [])
    {
        return Response::create($template, 'view')->assign($vars)->config($config);
    }


}
