<?php $type = "exercício" ?>

@extends('principal.principal')

@section('conteudo')



<div class="hoverable card" style="padding: 20px;">

	<h3 class="center-align"><i class="fa fa-lightbulb-o"></i> Compartilhar exercícios e dicas</h3>
	
	<div id="errors" class="card" style="padding: 10px; padding-left: 20px; display:inline-block;"></div>

	<br>
	
	<!-- <form action="/exercicios/cadastrar" method="post"> -->

		<input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
 
		@include('commom.tituloInput')

		@include('commom.descricaoInput')

		@include('commom.linhaInput')
		
		<br>
		<label>Torne sua publicação mais acessível, adicione palavras-chave (pressione enter para adicionar outras):</label>
		<div class="chips" id="chips"></div>

		<br>

		<div class="center-align">

			<button class="btn" onclick="cadastrarExercicio()" id="submit">compartilhar</button>
			
		</div>


	

</div>	

<br>

<script src="{{ asset('js/posts.js') }}"></script>

@stop