<?php $type = "exercício" ?>

@extends('principal.principal')

@section('conteudo')

<div class="hoverable card post-form">

	<h3 class="center-align" id="action"><i class="fa fa-lightbulb-o"></i> {{ $editar ? 'Editar exercício' : 'Compartilhar exercícios'}}</h3>


	<br>

		<form action="{{ $editar ? '/exercicios/editar/'.$post->id : '/exercicios/cadastrar' }}" id="form">

			<!-- input escondido que armazena o token de requisição post -->
			<input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">

			<!-- inclusão de campos comuns  -->
			@include('commom.tituloInput')

			@include('commom.descricaoInput')

			@include('commom.linhaInput')
			
			<br>
			
			<label>Torne sua publicação mais acessível, adicione palavras-chave (pressione enter para adicionar outras)</label>
			
			<div class="chips" id="chips"></div>

			<br>

			<div class="center-align">

				<button class="btn" type="submit" id="submit">Concluir</button>
				
			</div>

		</form>
			
</div>	


<script src="{{ asset('js/posts/exercicio.js') }}"></script>

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