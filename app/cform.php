<?php

namespace App;


use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class cform extends Model
{
    //
     use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */      
    protected $fillable = [
        'cimage','s_id','position', 'cgpa', 'planguage','cproject', 'event', 'reason', 'docs',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
      protected $casts = [
        'planguage' => 'array',
        'cproject' => 'array',
        'event' => 'array',
    ];
}
