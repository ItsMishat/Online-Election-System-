<?php

namespace App\Http\Controllers;

use App\g_message;
use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class g_messageController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('supreme'); 
    }

      protected function create(array $data)
    {
        return g_message::create([

            'g_name' => $data['g_name'],
            'g_email' => $data['g_email'],
            'message' => $data['message'],
        ]);
    }

    public function message(Request $request){
        $this->validate($request, [
            'g_name' => 'required|max:255',
            'g_email' => 'email|required|max:255',
            'message' => 'required|max:255',
            ]);

        g_message::create($request->all());
        return redirect ('/');
    }

    public function g_message(){
        $g_messages = DB::table('g_messages')
                            ->paginate(5);

        return view('/users/g_messages', ['g_messages' => $g_messages]);
    }

  

  
}
