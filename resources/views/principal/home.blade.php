<style>
.fixed-action-btn{ margin-right: 20px; }

</style>

@extends('principal.principal')


@section('conteudo')

<div class="fixed-action-btn horizontal">
    <a class="btn-floating btn-large pulse amber accent-3" title="Compartilhe">
      <i class="large material-icons black-text">add_circle_outline</i>
    </a>
    <ul>
      <li><a class="btn-floating red tooltipped" data-position="top" data-delay="50" data-tooltip="Evento" title="Evento" href="eventos/cadastrar"><i class="material-icons">date_range</i></a></li>
      <li><a class="btn-floating yellow darken-1 tooltipped" data-position="top" data-delay="50" data-tooltip="Relato de caso" href="relatos/cadastrar"  title="Relato de caso"><i class="material-icons">format_align_left</i></a></li>
      <li><a class="btn-floating green tooltipped" data-position="top" data-delay="50" data-tooltip="Exercícios e dicas" href="exercicios/cadastrar"  title="Exercícios e dicas"><i class="material-icons">casino</i></a></li>
      <li><a class="btn-floating blue tooltipped" data-position="top" data-delay="50" data-tooltip="Materiais" href="materiais/cadastrar" title="Material"><i class="material-icons">book</i></a></li>
    </ul>
  </div>


    <div class="card" style="padding-top: 10px;">
        
        @if( Auth::user()->sexo == "Masculino" )
            <h1 class="indigo-text text-darken-2 center-align">Bem-vindo, {{ Auth::user()->name }}!</h1>
        @elseif( Auth::user()->sexo == "Feminino" )
            <h1 class="indigo-text text-darken-2 center-align">Bem-vinda, {{ Auth::user()->name }}!</h1>
        @else
            <h1 class="indigo-text text-darken-2 center-align">Olá, {{ Auth::user()->name }}!</h1>
        @endif
        
        <h3 class="center-align">Com qual conhecimento deseja contribuir hoje?</h3> 

        <br>

        <!-- <div class="row card z-depth-2" style="padding: 10px;">
            <div class="col s3 center-align">
                <a class="btn-floating btn-large red" title="Evento"><i class="material-icons">date_range</i></a>
            </div>

            <div class="col s3 center-align">
            <a class="btn-floating btn-large yellow darken-1" title="Relato de caso"><i class="material-icons">format_align_left</i></a>
            </div> -->
      
      <!-- <a class="btn-floating yellow darken-1" title="Relato de caso"><i class="material-icons">format_align_left</i></a>
      <a class="btn-floating green" title="Exercícios e dicas"><i class="material-icons">casino</i></a>
      <a class="btn-floating blue" title="Material"><i class="material-icons">book</i></a> -->
    

            <!-- <div class="col s3 center-align">
                <br>
                <a href="/eventos/cadastrar" class="indigo-text">
                    <i class="fa fa-calendar fa-4x"></i>
                    <br>
                    <span>Evento</span>
                </a>
            </div>

            <div class="col s3 center-align">
                <a href="/relatos/cadastrar" class="indigo-text">
                <br>
                    <i class="fa fa-align-left fa-4x"></i>
                    <br>
                     <span>Relato de Caso</span>
                </a>
            </div>

            <div class="col s3 center-align">
                <a href="/exercicios/cadastrar" class="indigo-text modal-trigger">
                <br>
                    <i class="fa fa-lightbulb-o fa-4x"></i>
                    <br>
                    <span>Exercícios e dicas</span>
                </a>
            </div>

            <div class="col s3 center-align">
                <a href="/materiais/cadastrar" class="indigo-text">
                <br>
                    <i class="fa fa-book fa-4x"></i>
                    <br>
                    <span>Material</span>
                </a>
            </div> -->
        <!-- </div> -->

        <br>    


    </div>

@endsection


