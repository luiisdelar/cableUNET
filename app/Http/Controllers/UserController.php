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
use App\Channel;

class UserController extends Controller
{   

    /*  public function __construct(){
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
        $cha=Channel::all();
        return view('users/index',compact("cable","net","tlf","pack","plan","cha"));
    }

    public function packChannel(Request $request){
        $user=User::find($request->user_id);
        $user->packchannel_id=$request->packchannel_id;
        $user->save();
        
        $cable=Cable::all();
        $net=Internet::all();
        $tlf=Telephone::all();
        $pack=Packservice::all();
        $plan=Plan::all();
        $packcha=Packchannel::all();
        flash('Package of channels adquired!')->success()->important();
        return view('users/index',compact("cable","net","tlf","pack","plan","packcha"));
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
        
        try{ 
            $user->save();              
        }catch(\Illuminate\Database\QueryException $ex){ 
            flash('Email duplicate in system')->error()->important();
            return view('users/create');
        }

        flash('User registrer!')->success()->important();
        return view('auth/login');
    }

    public function list(){
        $us=User::orderBy('id','asc')->paginate(4);
        return view('admin/list',compact("us"));
    }

    public function request(Request $request){
        $xxx=User::find($request->user_id);

        if(isset($request->user)){
            $xxx->type="user";
            if($request->user_id==$request->user_auth){
                $xxx->save();
                return redirect('admin');
            }
        }else{
            $xxx->type="admin";
        }
        
        $xxx->save();
        $us=User::orderBy('id','asc')->paginate(4);
        return view('admin/list',compact("us"));
    }

}
