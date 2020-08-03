<?php
namespace App\Http\Controllers\Index;
use Illuminate\Http\Request;
use App\models\Order_goods;
use App\models\Order_info;
use App\Http\Controllers\Controller;
class Test extends Controller
{
    public function payMoney1($id){
        // Order_goods::leftjoin("order","order_goods.order_id","=","order.order_id")->get();
        // $where=[];
        $user_id=session('reg');
        $user_id=$user_id['user_id'];
        $order_info=Order_info::where(["order_id"=>$id,"user_id"=>$user_id])->first();
    require_once app_path('libs/alipay/wappay/service/AlipayTradeService.php');
    require_once app_path('libs/alipay/wappay/buildermodel/AlipayTradeWapPayContentBuilder.php');
    $config=config('alipay');
    // dd($config);
    // if (!empty($order_no)&& trim($order_no!="")){
        // 商户订单号，商户网站订单系统中唯一订单号，必填
        $out_trade_no = $order_info['order_sn'];
        //订单名称，必填
        $subject = "奥利给";
        //付款金额，必填
        $total_amount = $order_info['order_amount'];
        //商品描述，可空
        $body = "正在等待评价";
        //超时时间
        $timeout_express="10m";
        $payRequestBuilder = new \AlipayTradeWapPayContentBuilder();
        $payRequestBuilder->setBody($body);
        $payRequestBuilder->setSubject($subject);
        $payRequestBuilder->setOutTradeNo($out_trade_no);
        $payRequestBuilder->setTotalAmount($total_amount);
        $payRequestBuilder->setTimeExpress($timeout_express);
        $payResponse = new \AlipayTradeService($config);
        $result=$payResponse->wapPay($payRequestBuilder,$config['return_url'],$config['notify_url']);
        return ;
    // }
  }
  public function return_url(){
    echo 1111111;
    }
  }  
   




