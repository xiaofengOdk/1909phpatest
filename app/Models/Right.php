<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Right extends Model
{
      protected $table='right';//指定表
      protected $primaryKey='right_id';//指定主键id
      public $timestamps=false;//关闭时间戳
      protected $guarded=[];//黑名单为空
}
