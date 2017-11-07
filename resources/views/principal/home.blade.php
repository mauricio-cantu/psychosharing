@extends('principal.principal')
@section('conteudo')

<!-- FAB Button com opções de compartilhamento -->
<div class="fixed-action-btn horizontal">
    <a class="btn-floating waves-effect waves-light btn-large pulse amber accent-3" title="Compartilhe">
      <i class="large material-icons black-text">add</i>
    </a>
    <ul id="actions">
      <li><a class="btn-floating waves-effect waves-light red tooltipped" data-position="top" data-delay="50" data-tooltip="Evento" title="Evento" href="eventos/cadastrar"><i class="material-icons">date_range</i></a></li>
      <li><a class="btn-floating waves-effect waves-light yellow darken-1 tooltipped" data-position="top" data-delay="50" data-tooltip="Relato de caso" href="relatos/cadastrar"  title="Relato de caso"><i class="material-icons">format_align_left</i></a></li>
      <li><a class="btn-floating waves-effect waves-light green tooltipped" data-position="top" data-delay="50" data-tooltip="Exercícios e dicas" href="exercicios/cadastrar"  title="Exercícios e dicas"><i class="material-icons">casino</i></a></li>
      <li><a class="btn-floating waves-effect waves-light blue tooltipped" data-position="top" data-delay="50" data-tooltip="Materiais" href="materials/cadastrar" title="Material"><i class="material-icons">book</i></a></li>
    </ul>
  </div>

    @if(session('status'))
        <br>
        <div class="success z-depth-4">
            <i class="fa fa-check"></i> {{ session('status') }}
        </div>
        <br>
        <br>
    @endif

    <div class="card">
        
        @if( Auth::user()->sexo == "Masculino" )
            <h2 class="indigo-text text-darken-2 center-align">Bem-vindo, {{ Auth::user()->name }}!</h2>
        @elseif( Auth::user()->sexo == "Feminino" )
            <h2 class="indigo-text text-darken-2 center-align">Bem-vinda, {{ Auth::user()->name }}!</h2>
        @else
            <h2 class="indigo-text text-darken-2 center-align">Olá, {{ Auth::user()->name }}!</h2>
        @endif

        <p class="center">O que deseja descobrir hoje? Busque abaixo por palavra-chave!</p>
        
        
            <div class="input-field row">
                <form action="/posts/results" method="get">
                    <input required="" name="key" type="text" class="validate autocomplete col l11"/>
                    <button type="submit" class="btn right"><i class="fa fa-search"></i> </button>
                </form>
            </div>
    </div>

    <center>
        <div class="label z-depth-3">
            {{ Auth::user()->linha_teorica }}
        </div>
    </center>
    <br>
    <div class="row" class="legenda">
        @foreach($posts as $post)
            @include('commom.thumbnail-post')
        @endforeach
    </div>
    <hr>    
    <center>
        <div class="label z-depth-3">
            Últimos compartilhamentos
        </div>
    </center>
    <br>
    <div class="row">
        @foreach($ultimos as $post)
            @include('commom.thumbnail-post')
        @endforeach
    </div>


@endsection


