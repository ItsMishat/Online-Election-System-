<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model; 

class User extends Authenticatable  
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */      
    protected $fillable = [
        's_id','name', 'email', 'password', 'dob', 'gender'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
     
    //boot model

    public static function boot(){
        parent::boot();

        static::creating(function($user){
            $user->token = str_random(40);
        });
    }

    public function hasActivated(){
          $this->activated = 1;
          $this->token = null;
          $this->save();
        }
}



/**
* 
*/

