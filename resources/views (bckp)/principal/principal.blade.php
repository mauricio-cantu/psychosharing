<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PsychoSharing</title>

    <!-- Styles -->
    <!-- <link href="{{ asset('css/materialize.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/material-kit.css') }}" rel="stylesheet"> 

    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Scripts -->    
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/material-kit.js') }}"></script> 
    <!-- <script src="{{ asset('js/materialize.min.js') }}"></script> -->

    <style type="text/css">
      /*body{ background-color: #F5F5F5; }*/

      .btn{
        color: black;
      }

      h2{
        font-weight: 300;
      }
    </style>


</head>

<body> 

    @if(Auth::guest())
      <nav>
          <div class="nav-wrapper">

            <a href="/" title="Home" class="brand-logo" style="padding-left: 15px;"><i class="material-icons right">home</i></a>
            <a data-activates="menu-mobile" class="button-collapse">
                <i class="material-icons">menu</i>
            </a>
            <ul class="right hide-on-med-and-down">
                  <li><a href="/login""><i class="material-icons left">done</i> Login</a></li>
                  <li><a href="/register"><i class="material-icons left">add</i> Cadastro</a></li>
            </ul>
            <ul class="side-nav" id="menu-mobile">
                  <li><a href="/login"><i class="material-icons left">done</i> Login</a></li>
                  <li><a href="/register"><i class="material-icons left">add</i> Cadastro</a></li>
            </ul>
          </div>
      </nav>
    @else
      <nav>
          <div class="nav-wrapper">

            <a href="/home" title="Home" class="brand-logo" style="padding-left: 15px;"><i class="material-icons right">home</i></a>
            <a data-activates="menu-mobile" class="button-collapse">
                <i class="material-icons">menu</i>
            </a>
            <ul class="right hide-on-med-and-down">
              <li><a href="/login""><i class="material-icons left">account_circle</i> {{Auth::user()->name}}</a></li>
              <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="material-icons left">close</i> Logout</a></li>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
            </ul>

            <ul class="side-nav" id="menu-mobile">
              <li><a href="/login""><i class="material-icons left">account_circle</i> {{Auth::user()->name}}</a></li>
              <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="material-icons left">close</i> Logout</a></li>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
            </ul>
            
          </div>
      </nav>

      @endif
    <br>
    
      @yield('conteudo')

    <script type="text/javascript">
        $(function(){
          $(".button-collapse").sideNav();
        });               
    </script>

</body>
</html>
