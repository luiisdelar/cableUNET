<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cable;
use App\Internet;
use App\Telephone;
use App\Channel;
use App\Packservice;

class PackserviceController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $net=Internet::all();
        $tlp=Telephone::all();
        $cable=Cable::all();
        $cha=Channel::all();
        return view("admin/index",compact("net","tlp","cable","cha"));        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $packs=new Packservice;
        $packs->name=$request->name;
        $packs->internet_id=$request->internet_id;
        $packs->cable_id=$request->cable_id;
        $packs->telephone_id=$request->telephone_id;
        /**
         * Aqui se asigna el precio del package 
         * pero no lo hare aun 
         */
        $packs->price=100;
        $packs->save();
        flash('Package of services created!')->success();
        $net=Internet::all();
        $tlp=Telephone::all();
        $cable=Cable::all();
        $cha=Channel::all();
     
        return view('admin/index',compact("net","tlp","cable","cha"));
    }
}
