<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BrandModel;
use App\Models\Goods;
use App\Models\Sku;
class GoodsController extends Controller
{
    
    public function gadd(){
        $bModel=new BrandModel();
        $Bdata=$bModel->where('is_del',1)->get();//查询品牌数据
        // dd($Bdata);
        return view('admin.goods.gadd',['Bdata'=>$Bdata]);
    }

    public function gdo(){
        $data=request()->all();
        dd($data);
    }
}
