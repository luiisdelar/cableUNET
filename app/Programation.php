<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programation extends Model
{
    protected $table='programations';
    protected $fillable=['name','start_hour','end_hour','day','channel_id'];
}
