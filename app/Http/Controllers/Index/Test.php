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
        $config=config("alipay");
        require_once app_path('libs/alipay/wappay/service/AlipayTradeService.php');
        require_once app_path('libs/alipay/wappay/buildermodel/AlipayTradeWapPayContentBuilder.php');

        $arr=$_GET;
        $alipaySevice = new \AlipayTradeService($config); 
        $result = $alipaySevice->check($arr);

        /* 实际验证过程建议商户添加以下校验。
        1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
        2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
        3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
        4、验证app_id是否为该商户本身。
        */
        if($result) {//验证成功
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //请在这里加上商户的业务逻辑程序代码
            
            //——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
            //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

            //商户订单号

            $out_trade_no = htmlspecialchars($_GET['out_trade_no']);

            //支付宝交易号

            $trade_no = htmlspecialchars($_GET['trade_no']);
                
            echo "验证成功<br />外部订单号：".$out_trade_no;

            //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
            
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        }
        else {
            //验证失败
            echo "验证失败";
        }
    }
    public function notice_url(){
        // echo 11111;
        // dd(request()->all());
      require_once app_path('libs/alipay/wappay/service/AlipayTradeService.php');
        require_once app_path('libs/alipay/wappay/buildermodel/AlipayTradeWapPayContentBuilder.php');
        $config=config('alipay');
      // dd($config);
         $arr=request()->all();
         dd($arr);
        $alipaySevice = new \AlipayTradeService($config); 
        $alipaySevice->writeLog(var_export($arr,true));
        $result = $alipaySevice->check($arr);
        dd($result);
        /* 实际验证过程建议商户添加以下校验。
        1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
        2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
        3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
        4、验证app_id是否为该商户本身。
        */
        if($result) {//验证成功
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //请在这里加上商户的业务逻辑程序代

            
            //——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
            
            //获取支付宝的通知返回参数，可参考技术文档中服务器异步通知参数列表
    
            //商户订单号

            $out_trade_no = $order_no;

            //支付宝交易号

            $trade_no = $_POST['trade_no'];

            //交易状态
            $trade_status = $_POST['trade_status'];


            if($_POST['trade_status'] == 'TRADE_FINISHED') {

                //判断该笔订单是否在商户网站中已经做过处理
                    //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
                    //请务必判断请求时的total_amount与通知时获取的total_fee为一致的
                    //如果有做过处理，不执行商户的业务程序
                        
                //注意：
                //退款日期超过可退款期限后（如三个月可退款），支付宝系统发送该交易状态通知
            }else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {
                //判断该笔订单是否在商户网站中已经做过处理
                //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
                //请务必判断请求时的total_amount与通知时获取的total_fee为一致的
                //如果有做过处理，不执行商户的业务程序            
                //注意：
                //付款完成后，支付宝系统发送该交易状态通知
            }
            //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——        
            echo "success";     //请不要修改或删除
                
        }else {
            //验证失败
            echo "fail";    //请不要修改或删除

        }
    }
  }  
   




