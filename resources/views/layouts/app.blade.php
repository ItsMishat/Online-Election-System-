<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SWE Club-OES') }}</title>

    <!-- Styles -->
  
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-theme.css">
  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <script src="../js/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="../js/sweetalert/dist/sweetalert.css">
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    

  <!-- head -->
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/welcome') }}" color="#000">
                        {{ config('app.name', 'SWE Club-OES') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                             <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                               <li class="button">
                                <a href="/supreme" aria-expanded="false" style="width:50px; height:50px;top:12px; left:-50px; border-radius:20%">
                                Supreme
                                </a>
                                </li>
                                  <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:right; width:50px; height:50px; top:12px; left:15px;padding-right:60px; ">Vote
                                </a>

                                <ul class="dropdown-menu" role="menu">

                                      <li>
                                          <a href="{{ url('/election/vote_p') }}" >
                                            Vote for President
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/election/vote_vp') }}">
                                            Vote for Vice-president
                                        </a>
                                    </li>
                                </ul>
                                </li>
                            <li class="dropdown">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relaive; padding-left:50px;">
                                <img src="/uploads/image/{{ Auth::user()->image }}" style="width:50px; height:50px; position:left; top:12px; left:15px; border-radius:20%">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">

                                      <li>
                                          <a href="{{ url('/profile') }}" class= "fa fa-btn fa-user"  >
                                            {{ Auth::user()->s_id }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/logout') }} " class="fa fa-btn fa-sign-out"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
 
</body>
</html>
