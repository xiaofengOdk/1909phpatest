<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class AttrvalModel extends Model
{
    protected  $table='attrval';
    protected $primaryKey='id';
    public $timestamps=false;
    protected  $guarded=[];
}
