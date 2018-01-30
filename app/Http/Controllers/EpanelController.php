<?php

namespace App\Http\Controllers;

use App\election;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EpanelController extends Controller
{
    //
 	 public function __construct()
    {
        $this->middleware('supreme'); 
    }

      public function election(Request $request){
         $this->validate($request, [
            'position' => 'required|max:255',
            'begins_at' => 'date|required|max:255',
            'ends_at' => 'date|required|max:255',
    ]);  
        election::create($request->all());
        return view ('/election/success');
    }
    
          protected function create(array $data)
    {
        return election::create([

            'position' => $data['position'],
            'begins_at' => $data['begins_at'],
            'ends_at' => $data['ends_at'],
        ]);
    }

      public function epanel()
    {
         $e_candidates = DB::table('candidates')
                            ->join('cforms', 'cforms.s_id', '=', 'candidates.Candidates_ID')
                            ->select('cforms.*')
                            ->get();
                            
        $election = DB::table('elections')
                    ->get();
                            
            return view ('election/epanel', ['candidates' => $e_candidates], ['elections' => $election]);
    }
  
}
