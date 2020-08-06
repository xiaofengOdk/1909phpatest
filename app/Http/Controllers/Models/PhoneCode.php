<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhoneCode extends Model
{
   public function setCode($user_tel){
    $code=$this->code();
    $host = "http://yzxyzm.market.alicloudapi.com";
    $path = "/yzx/verifySms";
    $method = "POST";
    $appcode = "36654426d1e04ce4af9a9fbe5ed4bf82";
    $headers = array();
    array_push($headers, "Authorization:APPCODE " . $appcode);
    $querys = "phone=$user_tel&templateId=TP18040314&variable=code:".$code;
    $bodys = "";
    $url = $host . $path . "?" . $querys;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_FAILONERROR, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    if (1 == strpos("$".$host, "https://"))
    {
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    }
        //发送验证码的短信
         $reg=curl_exec($curl);
         $response=json_decode($reg,true);

    //     //测试代码，为了方便测试，不真正发送短信
    //     $response=[
    //         'return_code'=>00000
    //    ];

       if($response['return_code']==00000){

             $data=[
                 "user_tel"=>$user_tel,
                 "code"=>$code,
                 "add_time"=>time(),
                 'over_time'=>time()+180,
             ];
             $reg=Code::create($data);
                if($reg){
                    return true;
                }else{
                     return false;
                }
             return true;
        }else{
           return false;
       }
   }

   //生成验证密码
   public function code($len=3){
       //range 是将10到99列成一个数组 
        $numbers = range (10,99);
        //shuffle 将数组顺序随即打乱
        shuffle ($numbers);
          //取值起始位置随机
        $start = mt_rand(1,10);
         //取从指定定位置开始的若干数
        $result = array_slice($numbers,$start,$len);
        $code= "";
        for ($i=0;$i<$len;$i++){
            $code = $code.$result[$i];
        }
      
       return $code;
   }
}
