@extends('layouts.app')
@section('content')
<style>


.navbar nav ul { list-style: none; margin: 0 0 15px 0; }
.navbar nav li { margin: 0 0 5px 0; }
.navbar nav li a { background-color: #909673; overflow: visible !important; font-size: 20px; padding: 4px; width: 215px; display: block; color: white; position: relative; left: -30px; text-indent: 26px; }
.navbar nav li a em { font-size: 13px; }
.navbar nav li:nth-child(1) a, nav li:nth-child(1) a span { background-color: #5c5d91; }
.navbar nav li:nth-child(2) a, nav li:nth-child(2) a span { background-color: #647484; }
.navbar nav li:nth-child(3) a, nav li:nth-child(3) a span { background-color: #728c8c; }
.navbar nav li:nth-child(4) a, nav li:nth-child(4) a span { background-color: #768c72; }
.navbar nav li:nth-child(5) a, nav li:nth-child(5) a span { background-color: #909673; }
.navbar nav li a:hover { text-decoration: none; background-color: #666; }
.navbar nav li a:hover span { background-color: #666; }
h1{ 
color:#386FA3;
background-color:#EBF0F3; 
}
</style>



    
	<div class="container">
    <div class="row">
    <div class="panel-body">
    <h1 class = "panel-heading" align="center" >Admin panel</h1> 
        <div class="col-md-5">
            <h1>Hello, {{$user->name}}</h1>
            <div class="col-md-3 col-md-offset-3">
            <img src= "/uploads/image/{{$user->image}}"  style="width:200px; height:200px;margin-right:25px; border-radius: 20%;">
            </div>
            </div></br>
      <div class="col-md-3 col-md-offset-2">
            <div class= "navbar">
                <nav>
                <ul class="nav navbar-top-links">
                    <li class="navbar" {{ (Request::is('/') ? 'class="active"' : '') }}>
                            <a href="{{ url ('') }}">Homepage</a>
                        </li>
                    <li class="navbar"><a href="users/uview">View users</a></li>
                    <li class="navbar"><a href="create">Create Users</a></li>
                    <li class="navbar">
                                
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                    Nomination forms<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                          <a href="{{ url('/cform/cpview') }}" target="_blank">
                                            President
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/cform/cvpview') }} " target="_blank" 
                                            >
                                            Vice-president
                                        </a> 
                                    </li>
                                    </ul>
                                 </li>

                                 <li class="navbar">
                                
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                    Elections<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                          <a href="{{ url('/election/vote_p') }}" target="_blank">
                                            Election for President
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/election/vote_vp') }} " target="_blank" 
                                            >
                                            Election for Vice-president
                                        </a> 
                                    </li>
                                    </ul>
                                 </li>
                    <li class="navbar"><a href="/election/epanel" target="_blank">Create an Election</a></li>
                    <li class="navbar"><a href="/users/g_messages" target="_blank">Guest messages</a></li>

                            </ul>
                        </nav>
                    </div>  
                </div>
            </div>
        </div>
    </div>
            
			
@endsection
