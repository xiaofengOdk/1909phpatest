<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_goods extends Model
{
    protected $table='order_goods';
    protected $primaryKey='order_goods_id';
    public $timestamps=false; 
}
