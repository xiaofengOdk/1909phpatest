<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cary;
class CartshopController extends Controller
{
    public function cart_add($id){
        $reg = session("res");
        $user_id = $reg['user_id'];
        dd($reg);
       $data = [
           "goods_id"=>$id,
           "user_id"=>$user_id,
       ];
    }
}
