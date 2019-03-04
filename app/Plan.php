<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table='plans';
    protected $fillable=['user_id','cable_id','internet_id','telephone_id','packservice_id'];

}
