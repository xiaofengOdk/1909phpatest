<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected  $table='slide';
    protected $primaryKey='slide_id';
    public $timestamps=false;
    protected  $guarded=[];
}
