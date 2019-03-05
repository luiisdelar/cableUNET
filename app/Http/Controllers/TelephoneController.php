<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cable;
use App\Internet;
use App\Telephone;
use App\Channel;

class TelephoneController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tel=new Telephone;
        $tel->name=$request->name;
        $tel->minutes=$request->minutes;
        $tel->price=$request->price;
        $tel->save();
        flash('Plan Telephone created')->success()->important();
        $net=Internet::all();
        $tlp=Telephone::all();
        $cable=Cable::all();
        $cha=Channel::all();
     
        return view('admin/index',compact("net","tlp","cable","cha"));
    }

}
