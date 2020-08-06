<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $primaryKey='user_id';//指定 主键id
    protected $table='user';//指定表
    public $timestamps=false;//关闭时间戳
    protected $guarded=[];//黑名单为空
}
