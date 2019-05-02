<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cable;
use App\Internet;
use App\Telephone;
use App\Packservice;
use App\Plan;
use App\User;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("plan/index");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $plans= Plan::all();

        foreach($plans as $p){
            if($p->user_id == auth()->user()->id){
                $newplan=$p;
            }
        }

        if(!isset($newplan)){
            $newplan= new Plan;
            $newplan->user_id=auth()->user()->id;
        }

        if(isset($request->internet)){
            $newplan->internet_id=$request->internet;
        }
        else if(isset($request->cable)){
            $newplan->cable_id=$request->cable;
        }
        else if(isset($request->telephone)){
            $newplan->telephone_id=$request->telephone;
        }else{
            $newplan->packservice_id=$request->pack;   
        }

        $newplan->save();
        flash("Request in process!")->success()->important();

        $cable=Cable::all();
        $net=Internet::all();
        $tlf=Telephone::all();
        $pack=Packservice::all();
        $plan=Plan::all();
        return view("users/index",compact("cable","net","tlf","pack","plan"));
    }

    public function authorization(){
        $plans=Plan::orderBy('id','asc')->paginate(4);
        $users=User::all();

        return view("admin/plans",compact("plans","users"));
    }

    public function accept(Request $request){
        $user=User::find($request->user_id);
        $plan=Plan::find($request->plan_id);

        if(isset($request->cable_id)){
            $user->cable_id=$request->cable_id;
            $plan->cable_id=null;
        }
        if(isset($request->internet_id)){
            $user->internet_id=$request->internet_id;
            $plan->internet_id=null;
        }
        if(isset($request->telephone_id)){
            $user->telephone_id=$request->telephone_id;
            $plan->telephone_id=null;
        }
        if(isset($request->packservice_id)){
            $user->packservice_id=$request->packservice_id;
            $plan->packservice_id=null;
        }

        $user->save();
        $plan->save();
        flash("Changes aprobbate!")->success()->important();
        $plans=Plan::orderBy('id','asc')->paginate(4);
        $users=User::all();
        return view("admin/plans",compact("plans","users"));
    }
}
