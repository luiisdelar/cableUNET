<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $table='channels';
    protected $fillable=['name','packchannel_id'];

    public function packchannel(){
        return $this->belongsTo('App\Packchannel');
    }
}
