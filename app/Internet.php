<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internet extends Model
{
    protected $table='internets';
    protected $fillable=['speed','price','name'];

    public function packservice(){
        return $this->hasOne('App\Packservice');
    }
}
