@extends('principal.principal')

@section('conteudo')

<div class="hoverable card" id="user-profile">

<h3 class="center"> {{ $user->name }} </h3>

<div class="row">
    <div class="col s12 l3" id="pic-name">
        @if($user->foto_perfil)
            <img class="img-responsive circle" style="height: 180px; width: 180px;" src="{{ asset('/storage/profile-pics/' . $user->foto_perfil) }}">
        @else
            <i class="large material-icons">account_circle</i>
        @endif
    </div>

    <div class="col s12 l8">
        
            <div class="col s6 l8">
                <h4>Entrou em</h4>
                <p>{{ date('d/m/Y', strtotime($user->created_at)) }}</p>
            </div>

            <div class="col s6 l4">
                <h4>CRP</h4>
                
                <p>{{ $user->crp }}</p>
            </div>

            <div class="col s6 l8">
                <h4>Linha terapêutica</h4>                
                <p>{{ $user->linha_teorica }}</p>
            </div>

            <div class="col s6 l4">
                <h4>Localização</h4>                
                <p>{{ $user->cidade }}</p>
            </div>
          
    </div>
</div>

    <hr>

    <div class="center">
        <p class="label">Últimos compartilhamentos de {{ $user->name }}</p>
    </div>
    <div class="row" style="padding: 15px;">
        @foreach($user->posts as $post)
            @include('commom.thumbnail-post')
        @endforeach
    </div>

    

</div>

@stop
