<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Packchannel extends Model
{
    protected $table='packchannels';
    protected $fillable=['name','price','cable_id'];

    public function cable(){
        return $this->belongsTo('App\Cable');
    }

    public function channels(){
        return $this->hasMany('App\Channel');
    }
}
