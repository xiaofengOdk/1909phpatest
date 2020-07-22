<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attr extends Model
{
    protected $table='attr';//指定表
    protected $primaryKey='attr_id';//指定主键id
    public $timestamps=false;//关闭时间戳
    protected $guarded=[];//黑名单为空
}
