<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cable extends Model
{
    protected $table='cables';
    protected $fillable=['name'];
}
