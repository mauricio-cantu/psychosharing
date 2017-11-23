<div class="comentario">
    <h5>
        <a class="right" href="/users/{{ $comentario->user->id }}">
        @if($comentario->user->foto_perfil)
        <img class="circle responsive-img" style="height: 100px; width: 100px;" src="{{ asset('/storage/profile-pics/' . $comentario->user->foto_perfil) }}">
        @else
        <i class="large material-icons">account_circle</i>
        @endif
    </a>
    {{ $comentario->user->name }} comentou:
        
    </h5>

    <blockquote>{{ $comentario->conteudo }}</blockquote>
    <span>{{ date('d/m/Y, H:i', strtotime($comentario->created_at)) }}</span>
</div>