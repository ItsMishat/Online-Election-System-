<?php

namespace App\Http\Controllers;

use App\User;
use App\cform;
use App\vote;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class VoteController extends Controller
{
	
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function S_votes(Request $request){
    vote::create($request->all());
     
      DB::table('votes')
            ->update(['voted' => 1 ]);
      
    return redirect ('/welcome');
    }

    public function vote_p()
    {
    $e_candidates = DB::table('candidates')
                            ->join('cforms', 'cforms.s_id', '=', 'candidates.Candidates_ID')
                            ->where('position', 'president')
                            ->select('cforms.*')
                            ->get();

    $elections = DB::table('elections') 
                ->where('position','president')
                ->get();

    $voted = DB::table('votes')->pluck('voted');

    return view('election.vote_p', ['candidates' => $e_candidates],['voted' => $voted], ['elections' => $elections]);     
    }
 
 public function vote_vp()
    {

    $vp_candidates = DB::table('candidates')
                            ->join('cforms', 'cforms.s_id', '=', 'candidates.Candidates_ID')
                            ->where('position', 'vice-president')
                            ->select('cforms.*')
                            ->get(); 
    $elections = DB::table('elections') 
                ->where('position','president')
                ->get();
    $voted = DB::table('votes')->pluck('voted');

    return view('election.vote_vp', ['candidates' => $vp_candidates], ['voted' => $voted], ['elections' => $elections]);     
    }
         protected function create(array $data)
    {
        return vote::create([
           'Candidates_ID' => $data['Candidates_ID']
        ]);
    }
}
