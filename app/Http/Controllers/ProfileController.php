<?php

namespace App\Http\Controllers;


use Auth;
use App\User;
use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\RedirectResponse;


class ProfileController extends Controller
{
    //


     public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile(){

    return view('profile', array('user'=>Auth::user()));
    }

    public function update(Request $request){
    	////////Handle the user upload of Images//////////
            $this->validate($request, 
          ['image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]); 
        
          

          

        if($request->hasFile('image')){
            $image = $request->file('image');
            $input['filename'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/image');
            $image->move($destinationPath, $input['filename']);
            $user = Auth::user();
            $user->image = $input['filename'];
            $user->save();
        }

        $user = Auth::user();
       if ($request->has('name')) {
        $user->name = $request->input('name');
        }
           if ($request->has('email')) {
        $user->email = $request->input('email');
        }
           if ($request->has('dob')) {
        $user->dob = $request->input('dob');
        }
           if ($request->has('password')) {
        $user->password = Hash::make($request->password);
        }

        $user->save();
   
        return view('profile', array('user'=>Auth::user()));

          //return redirect('profile')->with('status', 'Profile updated!');
    }

}
