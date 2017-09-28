@extends('principal.principal')


@section('conteudo')


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

        <div class="row card z-depth-2">
            <div class="col s3 center-align">
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
            </div>
        </div>

        <br>    


    </div> 



@endsection


