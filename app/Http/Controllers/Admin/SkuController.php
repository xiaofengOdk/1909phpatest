<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SkuController extends Controller
{
    //属性表
    //添加、展示
    public function attr_add()
    {
        return view('admin.sku.attr_add');
    }
    //属性值表
    //添加、展示
    public function attrval_add()
    {
        return view('admin.sku.attrval_add');
    }

}
