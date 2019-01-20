<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table='invoices';
    protected $fillable=['price','user_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
