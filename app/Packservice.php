<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Packservice extends Model
{
    protected $table='packservices';
    protected $fillable=['name','price','internet_id','cable_id','telephone_id'];

    public function internet(){
        return $this->belongsTo('App\Internet');
    }

    public function telephone(){
        return $this->belongsTo('App\Telephone');
    }

    public function cable(){
        return $this->belongsTo('App\Cable');
    }

    public function users(){
        return $this->hasMany('App\User');
    }
}
