<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cable extends Model
{
    protected $table='cables';
    protected $fillable=['name','price'];

    public function packservice(){
        return $this->hasOne('App\Packservice');
    }
    
    public function packchannels(){
        return $this->hasMany('App\Packchannel');
    }
}
