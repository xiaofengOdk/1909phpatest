<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attr extends Model
{
    protected  $table='attr';
    protected $primaryKey='attr_id';
    public $timestamps=false;
    protected  $guarded=[];
}
