<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    protected  $table='role';
    protected $primaryKey='role_id';
    public $timestamps=false;
    protected  $guarded=[];
}
