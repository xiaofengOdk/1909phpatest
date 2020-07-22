<?php

namespace App\Http\Middleware;
use App\Models\Admin;
use Closure;
use App\Models\Right;
use App\Models\Role_right;
use App\Models\Admin_role;
class Checkrc
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
     $user=session('reg');
     // dd($user['admin_id']);
        if(!$user){
            return redirect('/admin/login');
        }
                $url = $request->path();

         $uid=$user['admin_id'];
        $result=Admin::where("admin_name",$user['admin_name'])->first();
         $quanxian=Admin::
                    leftjoin("admin_role","admin.admin_id","=","admin_role.admin_id")
                ->leftjoin("role","admin_role.role_id","=","role.role_id")
                ->leftjoin("role_right","role.role_id","=","role_right.role_id")
                ->leftjoin("right","right.right_id","=","role_right.right_id")
                ->where("admin.admin_id",$uid)
                ->get();
          // dd($quanxian);      
    foreach($quanxian as $k=>$v){
            if($v->role_name == '后台经理'){
                return $next($request);
            }
            // print_R($v->role_name);
        }
        foreach($quanxian as $key=>$val){
            $p_url[]=$val->right_url;
                    // print_R($val['right_url']);
        }
        // print_R($p_url);exit;
        // exit;
        if(empty($p_url)){
            echo "<script>alert('抱歉，您没有权限访问,请找管理员添加权限');window.history.go(-1);</script>";
        }
        if(!in_array($url,$p_url)){
            echo "<script>alert('没有权限访问');window.history.go(-1);</script>";
        }


//         $url=$request->url();
//          if($result){
//             // echo 1;exit;
//                 $uid=$user['admin_id'];
//             // $Admin=new Admin();
//              $quanxian=Admin_role::
//                     leftjoin("admin","admin_role.admin_id","=","admin.admin_id")
//                 ->leftjoin("role","admin_role.role_id","=","role.role_id")
//                 ->leftjoin("role_right","admin_role.role_id","=","role_right.role_id")
//                 ->where("admin.admin_id",$uid)
//                 ->get()->toArray();
//             // dd($quanxian['right_url']);    
//                 // $stringsss="";
//             foreach($quanxian as  $k=>$v){
//                 // print_Rol

//                     $result=Role_right::where("right_id",$v['right_id'])->get();

//                     // $stringsss .= "," . $result->right_url . ",";
//                 // var_dump($result);
//             } 
//             // print_R(count($result));exit;
//              $info=Admin_role::
//                 leftjoin("admin","admin_role.admin_id","=","admin.admin_id")
//                 ->leftjoin("role","admin_role.role_id","=","role.role_id")
//                 ->leftjoin("role_right","admin_role.role_id","=","role_right.role_id")
//                 ->where("admin.admin_id",$uid)
//                 ->get();
//                 // dd($info);exit;
//             if(count($info)<2){
//                 // echo 1;
//                  $infoone=Admin_role::
//                     leftjoin("admin","admin_role.admin_id","=","admin.admin_id")
//                     ->leftjoin("role","admin_role.role_id","=","role.role_id")
//                     ->leftjoin("role_right","admin_role.role_id","=","role_right.role_id")
//                     ->where("admin.admin_id",$uid)
//                     ->first();
//                     // dd($infoone['right_id']);
//                     $infosss=Right::where("right_id",$infoone['right_id'])->first();
//                     // dd($infosss['right_url']);
// // 

//                     if($infosss['right_url'] !='/create' ){
//                         // return redirect('/admin/ushow');
//                      echo "<script>alert('没有权限');location.href='http://www.1909a3.com/admin/login'</script>";die;

//                     }
//                     if($infosss['right_url'] !='/add' ){
//                         echo "<script>alert('没有权限');location.href='http://www.1909a3.com/admin/login'</script>";     die;  
//                          }                  
//                    if($infosss['right_url'] !='/del' ){
//                     echo "<script>alert('没有权限');location.href='http://www.1909a3.com/admin/login'</script>";die;
//                     }
//                 }

//                     return $next($request);

//         }

                    return $next($request);
    }

}
