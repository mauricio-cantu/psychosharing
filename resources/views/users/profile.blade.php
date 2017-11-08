@extends('principal.principal')

@section('conteudo')

<div class="hoverable card">

    <center>
        <img class="img-responsive circle" style="height: 180px; width: 180px;" src="{{ asset('/storage/profile-pics/' . $user->foto_perfil) }}">
        <h2> {{ $user->name }} </h2>
    
        <div class="row">
            <div class="col s4">
                <p>Número de compartilhamentos</p>
                <hr>
                <p>{{ $user->posts->count() }}</p>
            </div>

            <div class="col s4">
                <p>Linha terapêutica que aplica</p>
                <hr>
                <p>{{ $user->linha_teorica }}</p>
            </div>

            <div class="col s4">
                <p>Localização</p>
                <hr>
                <p>{{ $user->cidade }}</p>
            </div>          
            

        </div>
    </center>
    

</div>

@stop