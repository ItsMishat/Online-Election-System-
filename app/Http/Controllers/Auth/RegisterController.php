<?php

namespace App\Http\Controllers\Auth;



use Mail;
use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Mail\ConfirmationEmail;
use App\Http\Controllers\Controller;

use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\View\Middleware\ShareErrorsFromSession; 

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            's_id' => 'unique:users|required|max:255|regex:/^131-35-\d{3}$/',
            'name' => 'required|max:255',
            'email' => 'unique:users|required|email|max:255',
            'dob' => 'required|max:255',
            'gender' => 'required|',
            'password' => 'required|min:6|confirmed',
        ]);
    }
    
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            's_id' => $data['s_id'],
            'name' => $data['name'],
            'email' => $data['email'],
            'dob' => $data['dob'],
            'gender' => $data['gender'],
            'password' => bcrypt($data['password']),
        ]);
    }

        public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        Mail::to($user->email)->send(new ConfirmationEmail($user));

        return back()-> with('status','Please confirm your E-mail address');
    }

    public function confirmEmail($token){

        User::whereToken($token)->firstOrFail()->hasActivated(); 
        return redirect('login')->with('status', 'Account activated, you may proceed.');
    }

}
