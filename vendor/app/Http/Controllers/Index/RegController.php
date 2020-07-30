<?php
namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use App\Models\Code;
use App\Models\User;
use App\Models\PhoneCode;
use App\Models\Cary;
use App\Models\Goods;
class RegController extends Controller
{
    public function reg(){
        return view('index.reg.reg');
    }

    //执行注册
    public function regdo(){
        $data=request()->all();
        // dd($data);
        $codeModel=new Code();
        //判断验证码
        //  $where=['user_tel'=>$data['user_tel']];
         //$reg=$codeModel->where("user_tel",$data['user_tel'])->orderBy('code_id','desc')->first();
         $reg=$codeModel->where(['code'=>$data['code'],'user_tel'=>$data['user_tel']])->first();
         if(!$reg){
            $message=[
                        "code"=>'00001',
                        'message'=>'验证码错误',
                        'result'=>[]
                    ];
                    return json_encode($message,JSON_UNESCAPED_UNICODE);
                       die;
         }
          if(time()-$reg['over_time']>=0){
            $message=[
                "code"=>'00002',
                'message'=>'验证码过期',
                'result'=>[]
            ];
            return json_encode($message,JSON_UNESCAPED_UNICODE);
               die;
          }else{
              $datas=[
                  'user_name'=>$data['user_name'],
                  'user_tel'=>$data['user_tel'],
                  'user_pwd'=>$data['user_pwd'],
                  'add_time'=>time()
              ];
             $Umodel=new User();
             $resylt=$Umodel->where('user_tel',$datas['user_tel'])->first();
            if($resylt){
                $message=[
                    "code"=>'00003',
                    'message'=>'手机号以被注册',
                    'result'=>[]
                ];
            return json_encode($message,JSON_UNESCAPED_UNICODE);
               die;
            }else{
                $regs=$Umodel->insert($datas);
                //dd($regs);
                if($regs){
                   $message=[
                      "code"=>'00004',
                      'message'=>'注册成功 ',
                      'result'=>[]
                  ];
              return json_encode($message,JSON_UNESCAPED_UNICODE);
                 die;
                }else{
                  $message=[
                      "code"=>'00005',
                      'message'=>'注册失败',
                      'result'=>[]
                  ];
                 return json_encode($message,JSON_UNESCAPED_UNICODE);
                 die;
                }
            }
            
            
          }
        
        //  dd(time()-$reg['over_time']);
         //select * from code wehre num=$num and tel = $phone  and overtime >= time（）
        //  if(empty($reg)){
        //     $message=[
        //         "code"=>'00001',
        //         'message'=>'没有找到你的验证码',
        //         'result'=>[]
        //     ];
        //     return json_encode($message,JSON_UNESCAPED_UNICODE);
        //     die;
        //  }

        //     //对比验证码是否正确
        //     if($data['code'] !=$reg['code']){
        //         $message=[
        //             "code"=>'00005',
        //             'message'=>'您的验证码错误',
        //             'result'=>[]
        //         ];
        //         return json_encode($message,JSON_UNESCAPED_UNICODE);
        //         die;
        //     }
      
         
    }

   //验证码
   public function verify(){
         $user_tel=request()->user_tel;
        
            
             //调用短息验证码接口
             $Pmodel=new PhoneCode();
             $reg=$Pmodel->setCode($user_tel);
             if($reg){
                $message=[
                    "code"=>'00001',
                    'message'=>'验证码发送成功',
                    'result'=>[]
                ];
           }else{
               $message=[
                   "code"=>'00002',
                   'message'=>'验证码发送失败',
                   'result'=>[]
               ];
           }

         return json_encode($message,JSON_UNESCAPED_UNICODE);
                
     }    
       
     
     //登录
     public function login(){
         return view('index.login.login');
     }
   
     public function logindo(){
         $data=request()->all();
         $Umodel=new User();
         $where=[
             
             'user_tel'=>$data['user_admin'],
             'user_pwd'=>$data['user_pwd']
         ];

         $wheres=[
            'user_name'=>$data['user_admin'],
            'user_pwd'=>$data['user_pwd']
         ];
         if(is_numeric($data['user_admin'])){
            // echo 1;
            $reg=$Umodel->where($where)->first();
            // dd($regs);
            if(empty($reg)){
                session(['reg'=>$reg]);
                $message= [
                    "code"=>"00001",
                    "message"=>"账户或密码错误"
                ];
                return json_encode($message,JSON_UNESCAPED_UNICODE);
                exit;
            }else{
                $message= [
                    "code"=>"00000",
                    "message"=>"登录成功"
                ];
                return json_encode($message,JSON_UNESCAPED_UNICODE);
                exit;
            }
         }else{
           
            $reg=$Umodel->where($wheres)->first();
            if($reg){
                 session(['reg'=>$reg]);
                 $cookie = request()->cookie('test');
                 $cookie=json_decode($cookie,true);
                 $reg = session("reg");
                 $user_id = $reg['user_id'];
                // $cookie=$cookie->toArray();
                //   dd($cookie);
                $shop = [];
                 foreach($cookie as $k=>$v){
                    // $data = [
                    //     $k=>$v,
                    // ];
                        $shop[$k] =$v;
                        
                }
                $goods_id = $shop['goods_id'];
                $buy_number = $shop['buy_number'];
                $add_time = $shop['add_time'];
                
                // exit;
                 $goods = Goods::where("goods_id",$goods_id)->first();
                 

                // 判断库存
                
                $cart = Cary::where("goods_id",$goods_id)->first();
                if($cart){
                    //累加
                    $buy_number = $cart->buy_number+$buy_number;
                    if($goods->goods_store<$buy_number){
                        $buy_number = $goods->goods_store;
                    }
                    $res = Cary::where(["user_id"=>$user_id,"goods_id"=>$goods_id])->update(['buy_number'=>$buy_number,'add_time'=>$add_time]);
                }else{
                    $data = [
                        "goods_id"=>$goods_id,
                        "buy_number"=>$buy_number,
                        "add_time"=>$add_time,
                        "user_id"=>$user_id,
                    ];
                    $res2 = Cary::insert($data);
                }
                Cookie::queue("test",null);
               echo "成功";
                exit;
                //  if($cookie)
                  $message= [
                    "code"=>"00000",
                    "message"=>"登录成功"
                ];
              
                    
                return json_encode($message,JSON_UNESCAPED_UNICODE);
                exit;
            }else{
                $message= [
                    "code"=>"00001",
                    "message"=>"账户或密码错误"
                ];
                return json_encode($message,JSON_UNESCAPED_UNICODE);
                exit;
            }
         }

         
       
     }
        
   }

