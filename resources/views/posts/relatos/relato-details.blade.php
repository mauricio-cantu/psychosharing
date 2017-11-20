@extends('principal.principal')
@section('conteudo')

<div class="card hoverable" id="post-details">
    <div>
        <h3>{{ $relato->post->titulo }}
		
            <a style="color: white;" href="/users/{{ $relato->post->user->id }}">
                @if($relato->post->user->foto_perfil)
                    <img class="circle responsive-img right" style="height: 100px; width: 100px;" src="{{ asset('/storage/profile-pics/' . $relato->post->user->foto_perfil) }}">
                @else
                    <i class="medium material-icons">account_circle</i>
                @endif
            </a>
        </h3>
        <p>Por <a href="/users/{{$relato->post->user->id}}"> {{ $relato->post->user->name }}</a>, {{ date('d/m/Y', strtotime($relato->post->created_at)) }} </p>
        <hr>
    </div>

    <div class="col s6 l4">
        <h4>Linha terapêutica</h4>
        <p>{{ $relato->post->linha_terapeutica }}</p>
    </div>

    <div class="col s12">
        <h4>Relato de caso</h4>
        <p class="flow-text">{{ $relato->conteudo }}</p>
    </div>

    <hr>

    <div class="center">
        <p class="label">Comentários</p>
    </div>
    <div class="comentario">
        <p>
            Deixe seu comentário!
        </p>

        <form action="/comentarios/cadastrar/{{ $relato->post->id }}" method="post">
            <div class="row">
                <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                <textarea name="comentario" class="col s12 l10 materialize-textarea validate" required=""></textarea>
                <button type="submit" class="btn right">enviar</button>
            </div>
        </form>
    </div>
    
    <div class="row">
        @foreach($relato->post->comentarios()->latest()->get() as $comentario)
            @include('commom.comentario')
        @endforeach
    </div>

</div>

@stop