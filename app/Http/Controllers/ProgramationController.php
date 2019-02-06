<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cable;
use App\Internet;
use App\Telephone;
use App\Channel;
use App\Programation;

class ProgramationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pro=new Programation;
        $pro->name=$request->name;
        $pro->start_hour=$request->start_hour;
        $pro->end_hour=$request->end_hour;
        $pro->day=$request->day;
        $pro->channel_id=$request->channel_id;
        $pro->save();
        flash('Programation loaded!')->success();
        $net=Internet::all();
        $tlp=Telephone::all();
        $cable=Cable::all();
        $cha=Channel::all();
     
        return view('admin/index',compact("net","tlp","cable","cha"));
    }

}
