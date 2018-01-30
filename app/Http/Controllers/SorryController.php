<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SorryController extends Controller
{
	

    //
    public function Sorry()
    {
    return view ('sorry');
    }
}