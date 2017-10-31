<div class="col s12 m4">
          <div class="card indigo darken-1">
            <div class="card-content white-text">
              <span class="card-title">{{$post->titulo}}</span>
              @if($post->tipo == "exercicio")
              <p>Exercício</p>
              @elseif($post->tipo == "relato")
              <p>Relato</p>
              @elseif($post->tipo == "evento")
              <p>Evento</p>
              @elseif($post->tipo == "material")
              <p>Material</p>
              @endif
              <br>
              <span class="info-post">Por <a href="#">{{$post->user->name}}</a>, {{ date('d/m/Y', strtotime($post->created_at)) }} </span>
            </div>
            <div class="card-action">
              <a href="{{ $post->tipo }}s/{{ $post->id }}">Ver mais</a>
            </div>
          </div>
        </div>