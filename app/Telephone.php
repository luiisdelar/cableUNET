<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telephone extends Model
{
    protected $table='telephones';
    protected $fillable=['minutes','price'];
}
