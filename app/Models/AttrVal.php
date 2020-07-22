<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttrVal extends Model
{
    protected  $table='attrval';
    protected $primaryKey='id';
    public $timestamps=false;
    protected  $guarded=[];
}
