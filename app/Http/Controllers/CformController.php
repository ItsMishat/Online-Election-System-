<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\cform;
use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\View\Middleware\ShareErrorsFromSession;


class CformController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth'); 
    }

    public function cform(){
    return view('cform');
    }
    
      protected function create(array $data)
    {
        return cform::create([
            'cimage' => $data['cimage'], 
            's_id' => $data['s_id'],
            'cgpa' => $data['cgpa'] ,
            'position' => $data['position'],
            'planguage' => $data['p_language'],
            'cproject' => $data['c_project'],
            'event' => $data['event'],
            'docs' => $data['docs'],
        ]);
    }

    public function upload(Request $request){

     ///////////validation//////////////

       $this->validate($request, [
         'cimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            's_id' => 'unique:cforms|required|max:255',
            'cgpa' => 'required|max:255',
            'position' => 'required|max:255',
            'planguage' => 'max:255',
            'cproject' => 'max:255',
            'event' => 'max:255',
            'docs'=>'file|mimes:jpg,jpeg,png,pdf,zip|max:4096',
    ]);  
    ///////////////file/////////////
    if($request->hasFile('docs')){
    $docs = $request->file('docs');  
    $name1 = $request->file('docs')->getClientOriginalName();
    $docs = $request->file('docs')->move(public_path('uploads/docs'), 
            $name1);
    $fileTempName = $request->file('docs')->getPathname();
      DB::table('cforms')
            ->update(['docs' => $name1]);
      }

          ///////////////image/////////////
    if($request->hasFile('cimage')){
    $cimage = $request->file('cimage');  
    $name2 = $request->file('cimage')->getClientOriginalName();
    $cimage = $request->file('cimage')->move(public_path('uploads/cimage'), 
            $name2);
    DB::table('cforms')
            ->update(['cimage' => $name2]);
      }
      cform::create($request->all());
           
            
      DB::table('users')
            ->update(['submitted' => 1]);  

    return redirect('cform')->with('status', 'Your form has been submitted for the admin review.');
}


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
   
}
