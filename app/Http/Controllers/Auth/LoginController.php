<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\User;

class LoginController extends Controller
{   

    public function __construct(){
        $this->middleware('guest',['only'=>'loggeado']);
    }

    public function username(){
        return 'email';
    }

    public function loggeado(){
        return view('auth/login');
    }
    
    public function login(){
        
        $credentials=$this->validate(request(),[
            $this->username() => 'email|required|string',
            'password' => 'required|string'
        ]);
        
        if(Auth::attempt($credentials)){
            $user=User::where($this->username(),$credentials['email'])->get();
            
            if(strcmp($user[0]->type,'user')==0){
                return  redirect()->route('user');
            }else{
                return  redirect()->route('admin');
            }
       
        }

        return back()->withErrors(['email'=>'Email not found'])->withInput(request(['email']));

    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

}
