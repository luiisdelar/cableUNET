<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internet extends Model
{
    protected $table='internet';
    protected $fillable=['speed','price'];
}
