<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role_right extends Model
{
    protected  $table='role_right';
    protected $primaryKey='id';
    public $timestamps=false;
    protected  $guarded=[];
}
