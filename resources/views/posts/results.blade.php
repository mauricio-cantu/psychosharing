@extends('principal.principal')

@section('conteudo')


<div class="card" id="result-tabs">
    <h3 class="center">Resultados para '{{ app('request')->input('key') }}'</h3>
    <hr>
    <br>
    <ul id="tabs" class="tabs center">
        <li class="tab col s3"><a href="#exercicio">Exercícios e dicas <span class="badge indigo white-text">{{ $counts['exercicios'] }}</span></a></li>
        <li class="tab col s3"><a href="#eventos">Eventos <span class="badge indigo white-text">{{ $counts['eventos'] }}</span></a></li>
        <li class="tab col s3"><a href="#relatos">Relatos <span class="badge indigo white-text">{{ $counts['relatos'] }}</span></a></li>
        <li class="tab col s3"><a href="#materiais">Materiais <span class="badge indigo white-text">{{ $counts['materiais'] }}</span></a></li>
    </ul>
    <br>
    <div id="exercicio">
        <div class="row">
            @foreach($posts->where('tipo','exercicio') as $post)
                @include('commom.thumbnail-post')
            @endforeach
        </div>

    </div>
    <div id="eventos">
        <div class="row">
            @foreach($posts->where('tipo','evento') as $post)
                @include('commom.thumbnail-post')
            @endforeach
        </div>
    </div>
    <div id="relatos">
        <div class="row">
            @foreach($posts->where('tipo','relato') as $post)
                @include('commom.thumbnail-post')
            @endforeach
        </div>
    </div>
    <div id="materiais">
        <div class="row">
            @foreach($posts->where('tipo','material') as $post)
                @include('commom.thumbnail-post')
            @endforeach
        </div>
    </div>
</div>



@stop