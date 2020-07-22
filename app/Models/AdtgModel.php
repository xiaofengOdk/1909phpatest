<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class AdtgModel extends Model
{
    protected  $table='ad';
    protected $primaryKey='g_id';
    public $timestamps=false;
    protected  $guarded=[];
}
