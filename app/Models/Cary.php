<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cary extends Model
{
    protected $table='cary';//指定表
      protected $primaryKey='cary_id';//指定主键id
      public $timestamps=false;//关闭时间戳
      protected $fillable = ["user_id","goods_id","buy_number","add_time","id","goods_price_one","goods_totall"];
	 protected $guarded=[];
}
