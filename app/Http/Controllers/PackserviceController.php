<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cable;
use App\Internet;
use App\Telephone;
use App\Channel;
use App\Packservice;
use Auth;

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
        
        if(strcmp(auth()->user()->type,"admin")==0){
            return view("admin/index",compact("net","tlp","cable","cha"));        
        }else{
            Auth::logout();
            return redirect('/');
        }
        
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
        $cab=Cable::find($request->cable_id);
        $tel=Telephone::find($request->telephone_id);
        $int=Internet::find($request->internet_id);
        $packs->price=0;
        if(isset($cab)){
            $packs->price=$cab->price;
        }
        if(isset($tel)){
            $packs->price+=$tel->price;
        }
        if(isset($int)){
            $packs->price+=$int->price;
        }
        $packs->save();
        flash('Package of services created!')->success()->important();
        $net=Internet::all();
        $tlp=Telephone::all();
        $cable=Cable::all();
        $cha=Channel::all();
     
        return view('admin/index',compact("net","tlp","cable","cha"));
    }
}
