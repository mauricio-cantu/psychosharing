@extends('principal.principal')
@section('conteudo')

<div class="hoverable card post-form">

	<h3 class="center-align"><i class="fa fa-align-left"></i> Compartilhar relato</h3>

	<div id="errors" class="card errors"></div>

	<br>

	<form action="{{ $editar ? '/relatos/editar/'.$post->id : '/relatos/cadastrar' }}" id="form">

		<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

		@include('commom.tituloInput')

		<br>
		
		<div class="input-field">

			<textarea name="conteudo" id="conteudo" class="materialize-textarea validate {{ $errors->has('conteudo') ? 'invalid':'' }}" placeholder="Descreva aqui o seu relato de caso">{{ old('conteudo') ? old('conteudo') : '' }}</textarea>
			<span class="errors red-text">Favor preencher este campo</span>
			<label for="relato">Relato</label>

		</div>

		@include('commom.linhaInput')

		<br>

		<label>Torne sua publicação mais acessível, adicione palavras-chave (pressione enter para adicionar outras)</label>
			
		<div class="chips" id="chips"></div>


		<div class="center-align">

			<button class="btn" type="submit" id="submit">Concluir</button>
			
		</div>
</div>

<script src="{{ asset('js/posts/relato.js') }}"></script>

@if($editar)

	<!-- O script abaixo só é executado quando a página é chamada para editar um exercício (quando '$editar' for true) -->
	<script>
		
		// quando a página for carregada, o método getDetails é executado para preencher os campos com informações da publicação 
		$(function(){
			getDetails( {{ $post->id }} )
		});

	</script>

@endif

@stop