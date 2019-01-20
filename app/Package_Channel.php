<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package_Channel extends Model
{
    protected $table='package_channels';
    protected $fillable=['name','price'];
}
