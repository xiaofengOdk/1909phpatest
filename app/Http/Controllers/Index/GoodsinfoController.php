<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\Goods;
use Illuminate\Http\Request;
use App\Models\NavModel;
use App\Models\FootModel;
use App\Models\BrandModel;

class GoodsinfoController extends Controller
{
	public function goods_desc($id){
		return view('index.goods_desc.goods_desc');
	}
}