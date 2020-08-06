<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_Address extends Model
{
    protected  $table='user_address';
    protected $primaryKey='id';
    public $timestamps=false;
    protected  $guarded=[];
}
