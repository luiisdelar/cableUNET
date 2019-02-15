<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Hash;
use App\Cable;
use App\Internet;
use App\Telephone;
use App\Packservice;
use App\Plan;

class UserController extends Controller
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
        $cable=Cable::all();
        $net=Internet::all();
        $tlf=Telephone::all();
        $pack=Packservice::all();
        $plan=Plan::all();
        return view('users/index',compact("cable","net","tlf","pack","plan"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("users/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=new User;
        $user->username=$request->username;
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->save();
    }

}
