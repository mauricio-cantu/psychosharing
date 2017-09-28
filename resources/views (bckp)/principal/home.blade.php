@extends('principal.principal')

@section('conteudo')

<style type="text/css">
    
    h1, h3{
        font-weight: 300;
    }


</style>

<div class="container">

    <div class="card">
    
        <h1 class="indigo-text text-darken-2 center-align">Bem-vindo, {{ Auth::user()->name }}!</h1>
        
        <h3 class="center-align">Compartilhe seu conhecimento!</h3> 

        <br>

        <div class="row card z-depth-2">
            <div class="col s3 center-align">
                <a href="" class="indigo-text">
                    <i class="medium material-icons">date_range</i>
                    <br>
                    <span>Evento</span>
                </a>
            </div>

            <div class="col s3 center-align">
                <a href="" class="indigo-text">
                    <i class="medium material-icons">format_align_left</i>
                    <br>
                    <span>Relato de Caso</span>
                </a>
            </div>

            <div class="col s3 center-align">
                <a href="/exercicios/cadastrar" class="indigo-text">
                    <i class="medium material-icons">casino</i>
                    <br>
                    <span>Exercício</span>
                </a>
            </div>

            <div class="col s3 center-align">
                <a href="" class="indigo-text">
                    <i class="medium material-icons">book</i>
                    <br>
                    <span>Material</span>
                </a>
            </div>
        </div>

        <br>    

        <!-- <div class="row center-align" style="padding: 20px;"> 
            <div class="input-field col s10">
                <input type="text" name="busca">
            </div>

            <div class="input-field col s2">
                <button class="btn"><i class="medium material-icons">search</i></button>
            </div>
        </div> -->
    </div> 

</div>
@endsection
