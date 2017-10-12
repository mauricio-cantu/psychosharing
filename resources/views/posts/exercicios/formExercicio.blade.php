<?php $type = "exercício" ?>

@extends('principal.principal')

@section('conteudo')

<div class="hoverable card post-form">

	<h3 class="center-align"><i class="fa fa-lightbulb-o"></i> Compartilhar exercícios e dicas</h3>
	
	<div id="errors" class="card errors"></div>

	<br>

	<input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">

	<!-- inclusão de campos comuns  -->
	@include('commom.tituloInput')

	@include('commom.descricaoInput')

	@include('commom.linhaInput')
	
	<br>
	
	<label>Torne sua publicação mais acessível, adicione palavras-chave (pressione enter para adicionar outras):</label>
	
	<div class="chips chips-initial" id="chips"></div>

	<br>

	<div class="center-align">

		<button class="btn" id="submit">compartilhar</button>
		
	</div>
	

</div>	


<script src="{{ asset('js/posts/exercicio.js') }}"></script>

@stop