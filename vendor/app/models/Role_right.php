<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role_right extends Model
{
	protected $table='role_right';//指定表
	protected $primaryKey='id';//指定主键id
	public $timestamps=false;//关闭时间戳
	protected $guarded=[];//黑名单为空
}
