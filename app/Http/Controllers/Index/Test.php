<?php
namespace App\Http\Controllers\Index;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class Test extends Controller
{
    public function payMoney1(){
    require_once app_path('libs/alipay/wappay/service/AlipayTradeService.php');
    require_once app_path('libs/alipay/wappay/buildermodel/AlipayTradeWapPayContentBuilder.php');
    $config=config('alipay');
    // dd($config);
    // if (!empty($order_no)&& trim($order_no!="")){
        // 商户订单号，商户网站订单系统中唯一订单号，必填
        $out_trade_no = "151555";
        //订单名称，必填
        $subject = "22";
        //付款金额，必填
        $total_amount = "22";
        //商品描述，可空
        $body = "很好";
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
   




