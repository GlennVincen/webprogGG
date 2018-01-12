<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PokeMart</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
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

            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->

                <ul class="nav navbar-nav">

                    @if(Auth::guest())
                        <li><a href="{{ url('/home') }}"><h5>Home</h5></a></li>
                    @elseif(Auth::user()->role=='Admin')
                        <li><a href="{{ url('/home') }}"><h5>Home</h5></a></li>
                        <li><a href="{{ url('/updateUser') }}"><h5>Update User</h5></a></li>
                        <li><a href="{{ url('/deleteUser') }}"><h5>Delete User</h5></a></li>
                        <li><a href="{{ url('/insertPokemon') }}"><h5>Insert Pokemon</h5></a></li>
                        <li><a href="{{ url('/insertElement') }}"><h5>Insert Element</h5></a></li>
                        <li><a href="{{ url('/updateElement') }}"><h5>Update Element</h5></a></li>
                        <li><a href="{{ url('/pokemonList') }}"><h5>Pokemon List</h5></a></li>
                        <li><a href="{{ url('/transaction') }}"><h5>Transaction List</h5></a></li>
                        <li><a href="{{ url('/deleteTransaction') }}"><h5>Delete Transaction</h5></a></li>
                    @elseif(Auth::user()->role=='Member')
                        <li><a href="{{ url('/home') }}"><h5>Home</h5></a></li>
                        <li><a href="{{ url('/pokemonList') }}"><h5>Pokemon List</h5></a></li>
                        <li><a href="{{ url('/cart') }}"><h5>Cart</h5></a></li>
                        <li><a href="{{ url('/profileUpdate/{userId}') }}"><h5>Update Profil</h5>e</a></li>

                    @elseif(Auth::user()->role=='User')
                        <li><a href="{{ url('/home') }}"><h5>Home</h5></a></li>
                        <li><a href="{{ url('/pokemonList') }}"><h5>Pokemon List</h5></a></li>
                        <li><a href="{{ url('/cart') }}"><h5>Cart</h5></a></li>
                        <li><a href="{{ url('/profileUpdate/{userId}') }}"><h5>Update Profile</h5></a></li>
                    @endIf

                </ul>



                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->email }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
