<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table='plans';
    protected $fillable=['user_id','cable_id','internet_id','telephone_id','ncable_id','ninternet_id','ntelephone_id'];

}
