<?php
namespace App\Http\Controllers\Index;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cate;
use App\Models\Goods;
use App\Models\Area;
use App\Models\Cary;
use App\Models\NavModel;
use App\Models\FootModel;
use App\Models\BrandModel;
use App\Models\Answer;
class AnswerController extends Controller{
    public function answer(){
        $cart=Cary::get();
        $cart=count($cart);
        $nav = NavModel::get();//导航
        $footInfo=FootModel::get();//底部导航
        $brand = BrandModel::limit(7)->get();//热卖
        $AnswerModel=new Answer();
        $reg=$AnswerModel->where('is_del',1)->orderBy('add_time','desc')->get();
      
        return view('index.answer.answer',
                  ['cart'=>$cart,'nav'=>$nav,'footInfo'=>$footInfo,'brand'=>$brand,
                    'reg'=>$reg
                  ]

            );
    }

    public function answer_add(){
        $res=session('reg');
        if(empty($res)){

         
            echo "<script>alert('请先登录');location.href='/index/login';</script>";
            exit;
        }
        $user_id=$res->user_id;
        $answer_name=request()->answer_name;
        $answer_content=request()->answer_content;
        $data=[];
        $data['answer_name']=$answer_name;
        $data['answer_content']=$answer_content;
        $data['add_time']=time();
        $data['user_id']=$user_id;
        
        $AnswerModel=new Answer();
        $reg=$AnswerModel->insert($data);
        if($reg){
            return redirect('/user/answer');
        }
       
    }

   
}

?>