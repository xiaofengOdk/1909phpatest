<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin_role extends Model
{
	protected $table='shop_admin_role';//指定表
	protected $primaryKey='admin_id';//指定主键id
	public $timestamps=false;//关闭时间戳
	protected $guarded=[];//黑名单为空
    //
}
