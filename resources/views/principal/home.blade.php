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
      <li><a class="btn-floating waves-effect waves-light blue tooltipped" data-position="top" data-delay="50" data-tooltip="Materiais" href="materiais/cadastrar" title="Material"><i class="material-icons">book</i></a></li>
    </ul>
  </div>

    <div class="card">
        
        @if( Auth::user()->sexo == "Masculino" )
            <h2 class="indigo-text text-darken-2 center-align">Bem-vindo, {{ Auth::user()->name }}!</h2>
        @elseif( Auth::user()->sexo == "Feminino" )
            <h2 class="indigo-text text-darken-2 center-align">Bem-vinda, {{ Auth::user()->name }}!</h2>
        @else
            <h2 class="indigo-text text-darken-2 center-align">Olá, {{ Auth::user()->name }}!</h2>
        @endif

        <p class="center">O que deseja descobrir hoje?</p>
        
      


    </div>


@endsection


