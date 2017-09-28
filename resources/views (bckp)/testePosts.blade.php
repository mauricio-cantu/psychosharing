@extends('principal.principal')

@section('conteudo')

@foreach($posts as $p)
	@if($p->tipo == 'exercicio')
		<h1>{{ $p->exercicio->titulo }}</h1>
		<h3>Por {{ $p->user->name }}</h3>
	@elseif($p->tipo == 'material')
		<h1>{{ $p->material->titulo }}</h1>
		<h3>Por {{ $p->user->name }}</h3>
	@elseif($p->tipo == 'relato')
		<h1>{{ $p->relato->titulo }}</h1>
	@elseif($p->tipo == 'evento')
		<h1>{{ $p->evento->titulo }}</h1>
	@endif
@endforeach
@stop