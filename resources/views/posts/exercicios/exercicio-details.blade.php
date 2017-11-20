@extends('principal.principal')
@section('conteudo')

<div class="card hoverable" id="post-details">
    <div>
        <h3>{{ $exercicio->post->titulo }}
		
            <a style="color: white;" href="/users/{{ $exercicio->post->user->id }}">
                @if($exercicio->post->user->foto_perfil)
                    <img class="circle responsive-img right" style="height: 100px; width: 100px;" src="{{ asset('/storage/profile-pics/' . $exercicio->post->user->foto_perfil) }}">
                @else
                    <i class="medium material-icons">account_circle</i>
                @endif
            </a>
        </h3>
        <p>Por <a href="/users/{{$exercicio->post->user->id}}"> {{ $exercicio->post->user->name }}</a>, {{ date('d/m/Y', strtotime($exercicio->post->created_at)) }} </p>
        <hr>
    </div>

    <div class="col s6 l4">
        <h4>Linha terapêutica</h4>
        <p>{{ $exercicio->post->linha_terapeutica }}</p>
    </div>

    <div class="col s12">
        <h4>Descrição</h4>
        <p class="flow-text">{{ $exercicio->descricao }}</p>
    </div>

    <hr>

    <div class="center">
        <p class="label">Comentários</p>
    </div>
    <div class="comentario">
        <p>
            Deixe seu comentário!
        </p>

        <form action="/comentarios/cadastrar/{{ $exercicio->post->id }}" method="post">
            <div class="row">
                <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                <textarea name="comentario" class="col s12 l10 materialize-textarea validate" required=""></textarea>
                <button type="submit" class="btn right">enviar</button>
            </div>
        </form>
    </div>
    
    <div class="row">
        @foreach($exercicio->post->comentarios()->latest()->get() as $comentario)
            @include('commom.comentario')
        @endforeach
    </div>

</div>

@stop