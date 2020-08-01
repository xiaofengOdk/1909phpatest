<?php
namespace App\Http\Controllers\Index;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class Test extends Controller
{


    public function payMoney1(){
      $config=config("alipay.");
      // print_R($config);exit;
    require_once '../extend/alipay/pagepay/service/AlipayTradeService.php';
    require_once '../extend/alipay/pagepay/buildermodel/AlipayTradePagePayContentBuilder.php';
dd(1);
  //   //商户订单号，商户网站订单系统中唯一订单号，必填
    $out_trade_no = "2222222222222";

  //   //订单名称，必填
    $subject = "电商支付";

  //   //付款金额，必填
    $total_amount = "10";

  //   //商品描述，可空
    $body = "";

  // //构造参数
  $payRequestBuilder = new \AlipayTradePagePayContentBuilder();
  $payRequestBuilder->setBody($body);
  $payRequestBuilder->setSubject($subject);
  $payRequestBuilder->setTotalAmount($total_amount);
  $payRequestBuilder->setOutTradeNo($out_trade_no);

  $aop = new \AlipayTradeService($config);
 
 
  $response = $aop->pagePay($payRequestBuilder,$config['return_url'],$config['notify_url']);

  //输出表单
  var_dump($response);
    }  
    }  
   




