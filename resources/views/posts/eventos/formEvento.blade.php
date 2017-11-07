<?php $type = "evento" ?>
@extends('principal.principal')
@section('conteudo')


<div class="hoverable card post-form">

	<h3 class="center-align"><i class="fa fa-calendar"></i> Compartilhar evento</h3>

	<br>

	<form action="{{ $editar ? '/eventos/editar/'.$post->id : '/eventos/cadastrar' }}" id="form">

		<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

		@include('commom.tituloInput')

		<div class="input-field">

			<input type="text" name="local" id="local" class="validate {{ $errors->has('local') ? 'invalid':'' }}" value="{{ old('local') ? old('local') : '' }}" placeholder="Ex.: Av. Protásio Alves, 2854 - Petrópolis, Porto Alegre">
			<span class="errors red-text">Favor preencher este campo</span>
			<label for="local">Onde acontecerá?</label>

		</div>

		<div class="input-field">
			<label>Quando acontecerá?</label>
			<input id="data" type="text" placeholder="Clique para escolher a data" class="datepicker" value="{{ old('data') ? old('data') : '' }}" name="data">
			<span class="errors red-text">Favor preencher este campo</span>
		</div>

		@include('commom.linhaInput')

		@include('commom.descricaoInput')

		@include('commom.linkInput')

		<br>

		<label>Torne sua publicação mais acessível, adicione palavras-chave (pressione enter para adicionar outras):</label>
		<div class="chips" id="chips"></div>

		<div class="center-align">

			<button class="btn" type="submit" id="submit">Concluir</button>
			
		</div>

	</form>

<script src="{{ asset('js/posts/evento.js') }}"></script>

@if($editar)

	<!-- O script abaixo só é executado quando a página é chamada para editar um exercício (quando '$editar' for true) -->
	<script>

		// quando a página for carregada, o método getDetails é executado para preencher os campos com informações da publicação 
		$(function(){
			getDetails( {{ $post->id }} );
		});

	</script>

@endif


@stop