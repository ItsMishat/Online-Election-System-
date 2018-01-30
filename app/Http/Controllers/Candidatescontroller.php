<?php

namespace App\Http\Controllers;

use App\candidates;
use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Candidatescontroller extends Controller
{
    //
    public function store(Request $request){

     $this->validate($request, [
         'Candidates_ID' => 'unique:candidates|required|max:255',
    ]);  
    candidates::create($request->all());
    return view ('election/epanel');
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return candidate::create([
            'Candidates_ID' => $data['Candidates_ID']
        ]);
    }
}
