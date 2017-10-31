
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

            <a href="/" title="Home" class="brand-logo center"><i style="display: inline;" class="fa fa-home"></i></a>
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
      <div class="background indigo darken-2"></div>
      <a href=""><img class="circle" src="{{ asset('imgs/profile.jpg') }}"></a>
      <hr>
      <a href="#" class="white-text"><i class="fa fa-user"></i>  {{Auth::user()->name}}</a><br> 
      <a href="/users/edit-profile" class="white-text"><i class="fa fa-pencil"></i>  Informações pessoais</a><br>
      <a href="#" class="white-text"><i class="fa fa-th-list"></i>  Gerenciar postagens</a>
    </div>
  </li>
  <li><a href="#!"><i class="material-icons">date_range</i> Eventos</a></li>
  <li><a href="#!"><i class="material-icons">casino</i> Exercícios e dicas</a></li>
  <li><a href="#!"><i class="material-icons">format_align_left</i> Relatos de caso</a></li>
  <li><a href="#!"><i class="material-icons">book</i> Materiais</a></li>
  <div class="divider"></div>
  <li class="no-padding">
    <ul class="collapsible collapsible-accordion">
      <li>
        <a class="collapsible-header">PsychoSharing<i class="material-icons">arrow_drop_down</i></a>
        <div class="collapsible-body">
          <ul>
            <li><a href="#!">Usuários cadastrados</a></li>
            <li><a href="#!">Artigo</a></li>
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