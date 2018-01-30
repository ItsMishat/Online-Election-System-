<?php
namespace App\Http\Controllers;

use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class SupremeController extends Controller
{
    
  
    //
    public function __construct()
    {
        $this->middleware('supreme'); 
    }


    
    /**public function __construct()
    
        $this->middleware('supreme');
    } 
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     *//////
    public function Supreme()
    {
        return view('supreme', array('user'=>Auth::user()));
    }
}
