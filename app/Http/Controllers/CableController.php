<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cable;
use App\Internet;
use App\Telephone;
use App\Channel;

class CableController extends Controller
{   

    public function __construct(){
        $this->middleware('guest',['only'=>'loggeado']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cable=new Cable;
        $cable->name=$request->name;
        $cable->price=$request->price;
        $cable->save();
        flash("Cable created!")->success()->important();
        $net=Internet::all();
        $tlp=Telephone::all();
        $cable=Cable::all();
        $cha=Channel::all();
     
        return view('admin/index',compact("net","tlp","cable","cha"));
    }
}
