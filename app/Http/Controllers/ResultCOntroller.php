<?php

namespace App\Http\Controllers;

use votes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

use Illuminate\Http\Request;

class ResultCOntroller extends Controller
{
    //
    public function result(){

    $results = DB::table('votes')
    			->select('s_id', 'Candidates_ID')
    			->groupBy('Candidates_ID')
    			->get();

    return view('layouts.results', ['results' => $results]);
    }
}
