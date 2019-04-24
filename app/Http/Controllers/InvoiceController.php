<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\User;

class InvoiceController extends Controller
{
    
    public function index()
    {   
        //$user=User::all();
        $user=User::orderBy('id','asc')->paginate(5);
        return view("invoice/index",compact('user'));
    }

}
