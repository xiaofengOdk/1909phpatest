<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NavModel extends Model
{
    protected $table='nav';
    protected $primaryKey='nav_id';
    public $timestamps=false; 
}
