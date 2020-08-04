<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table='answer';//指定表
    protected $primaryKey='answer_id';//指定主键id
    public $timestamps=false;//关闭时间戳
    protected $guarded=[];//黑名单为空
}
