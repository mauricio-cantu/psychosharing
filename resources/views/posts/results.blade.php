@extends('principal.principal')

@section('conteudo')

<!-- @foreach($posts as $p)
	@if($p->tipo == 'exercicio')
		<h1>{{ $p->exercicio->titulo }}</h1>
		<h3>Por {{ $p->tipo }}</h3>
	@elseif($p->tipo == 'material')
		<h1>{{ $p->material->titulo }}</h1>
		<h3>Por {{ $p->tipo }}</h3>
	@elseif($p->tipo == 'relato')
		<h1>{{ $p->tipo }}</h1>
	@elseif($p->tipo == 'evento')
		<h1>kkkk {{ $p->tipo }}</h1>
	@endif
@endforeach -->

<div class="card" id="result-tabs">
    <h3 class="center">Resultados para '{{ app('request')->input('key') }}'</h3>
    <ul id="tabs" class="tabs center">
        <li class="tab col s3"><a href="#exercicio">Exercícios e dicas <span class="badge indigo white-text">{{ $counts['exercicios'] }}</span></a></li>
        <li class="tab col s3"><a href="#eventos">Eventos <span class="badge indigo white-text">{{ $counts['eventos'] }}</span></a></li>
        <li class="tab col s3"><a href="#relatos">Relatos <span class="badge indigo white-text">{{ $counts['relatos'] }}</span></a></li>
        <li class="tab col s3"><a href="#materiais">Materiais <span class="badge indigo white-text">{{ $counts['materiais'] }}</span></a></li>
    </ul>
    <br>
    <div id="exercicio" class="col s12 blue">Test 1</div>
    <div id="eventos" class="col s12 red">Test 2</div>
    <div id="relatos" class="col s12 cyan">Test 2</div>
    <div id="materiais" class="col s12 green">Test 4</div>
</div>



@stop