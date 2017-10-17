
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <!-- Torna as medidas responsivas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PsychoSharing</title>

    <!-- Styles -->
    <link href="{{ asset('css/materialize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">  
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">    

    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  
    <link href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Scripts -->    
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>    

</head>

<body> 
    <!-- Se não estiver logado, aparece o link para logar e cadastrar -->
    @if(Auth::guest())
      <nav class="z-depth-4">
          <div class="nav-wrapper">

            <a href="/" title="Home" class="brand-logo" style="padding-left: 15px;"><i class="fa fa-home"></i></a>
            <ul class="right hide-on-med-and-down">
                  <li><a href="/login"><i class="fa fa-check"></i> Login</a></li>
                  <li><a href="/register"><i class="fa fa-plus"></i> Cadastro</a></li>
            </ul>
          </div>
      </nav>
    
    @else

<!-- Caso esteja logado, fica disponível o menu lateral e o cabeçalho com o botão do usuário -->
<!-- Menu lateral -->
<ul id="slide-out" class="side-nav">
  <li>
    <div class="user-view">
      <div class="background indigo darken-2">
        
      </div>
      <a href=""><img class="circle" src="{{ asset('imgs/profile.jpg') }}"></a>
      <a href="" class="name white-text">{{Auth::user()->name}}</a>
      <a href="" class="white-text">{{Auth::user()->email}}</a>
      <hr>
      <a href="/users/edit-profile" class="white-text">Configurações</a>
    </div>
  </li>
  <li><a href="#!">First Sidebar Link</a></li>
  <li><a href="#!">Second Sidebar Link</a></li>
  <li class="no-padding">
    <ul class="collapsible collapsible-accordion">
      <li>
        <a class="collapsible-header">Dropdown<i class="material-icons">arrow_drop_down</i></a>
        <div class="collapsible-body">
          <ul>
            <li><a href="#!">First</a></li>
            <li><a href="#!">Second</a></li>
            <li><a href="#!">Third</a></li>
            <li><a href="#!">Fourth</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </li>
</ul> 


<header>

<!-- Menu do cabeçalho caso esteja logado -->
<nav>
    <div class="nav-wrapper">
      <a href="#!" data-activates="slide-out" id="bt-menu"><i class="material-icons" style="display: inline;">menu</i></a>
      <ul class="right show-on-small hide-on-med-and-up">
        <a href="\home"><i class="material-icons" style="display: inline;">home</i></a>
      </ul>     

      <a href="/" alt="home" title="home" class="brand-logo center hide-on-small-only"><i class="material-icons" style="display: inline;">home</i> PsychoSharing</a>
      
      <ul class="right hide-on-med-and-down">        
        <li><a class="btn waves-effect waves-light dropdown-button" data-activates="options">{{ Auth::user()->name }}</a></li>

        <ul id='options' class='dropdown-content' style="width: 300px !important">
          <li><a href="/users/edit-profile">Configurações</a></li>
          <li><a href="#!">Dashboard</a></li>
          <li class="divider"></li>
          <li><a onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a></li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </ul>

      </ul>
    </div>
  </nav>   
  
</header>

@endif
      
<main>
  <!-- Conteúdo das outras páginas ficam sempre dentro de um container -->
	<div class="container">
	  @yield('conteudo')
	<div>

</main>

</body>

</html>