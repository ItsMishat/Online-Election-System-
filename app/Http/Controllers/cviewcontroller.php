<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class cviewcontroller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('supreme'); 
    }


        public function cpview(){
   
   //$sql = DB::select("SELECT * FROM `cforms` WHERE `s_id` NOT IN (SELECT `Candidates_ID` FROM `candidates`)");

   /* $candidates = DB::select('SELECT * from `cforms` where `s_id` NOT IN (SELECT `Candidates_ID` FROM `candidates`)');
*/

         $e_candidates = DB::table('candidates')
                            ->join('cforms', 'cforms.s_id', '=', 'candidates.Candidates_ID')
                            ->where('position', 'president')
                            ->select('cforms.*')
                            ->get();


      	$candidates = DB::table('cforms')
                        ->leftJoin('candidates','cforms.s_id','=','candidates.Candidates_ID')
                        ->whereNull('Candidates_ID')
                        ->where('position', 'president')
                        ->select('cforms.*')
                        ->paginate(3);
                        
        return view ('cform.cpview', ['cforms' => $candidates], ['candidates' => $e_candidates]);
        }
        
        public function cvpview(){

      	$candidates = DB::table('cforms')
                       ->leftJoin('candidates', 'cforms.s_id', '=' , 'candidates.Candidates_ID')
                       ->whereNull('Candidates_ID') 
					             ->where('position', 'Vice-President')
                       ->select('cforms.*')
                       ->paginate(3);
                        
       $e_candidates = DB::table('candidates')
                            ->join('cforms', 'cforms.s_id', '=', 'candidates.Candidates_ID')
                            ->where('position', 'Vice-President')
                            ->select('cforms.*')
                            ->get();
                    return view('cform.cvpview', ['cforms' => $candidates],  ['candidates' => $e_candidates] );                             
        }
}
