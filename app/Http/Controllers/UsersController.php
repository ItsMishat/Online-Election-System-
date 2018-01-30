<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;



class UsersController extends Controller
{
    //
    public function create (){

    return view('create');
    }


    public function store(Request $request){

    User::create($request->all());

    return view ('users.ucreate');
    }

    public function uview(){

    //$users= DB::table ('users') -> paginate(5);
    $users = User::paginate(5);

    return view('users.uview', ['users' => $users]);
    }

}
