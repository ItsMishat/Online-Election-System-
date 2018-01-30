<?php

namespace App;

use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\View\Middleware\ShareErrorsFromSession;


class election extends Model
{
    //
         use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */      
    protected $fillable = [
        'position', 'begins_at', 'ends_at'
    ];
}
