<?php $type = "material" ?>

@extends('principal.principal')
@section('conteudo')

<div class="hoverable card post-form">

	<h3 class="center-align"><i class="fa fa-book"></i> Compartilhar material</h3>

	<br>	

	<form id="form" action="{{ $editar ? '/materials/editar/'.$post->id : '/materials/cadastrar' }}" method="POST" enctype="multipart/form-data">

		<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

		@include('commom.tituloInput')

		@include('commom.descricaoInput')

		@include('commom.linhaInput')

		@include('commom.linkInput')		

		<div class="file-field input-field">

      		<button class="btn">anexo</button>
        		
        	<input type="file" name="anexo" class="anexo" id="anexo">
      		
      		<div class="file-path-wrapper">
        		<input class="file-path validate anexo" type="text">
      		</div>

   		</div>

		<br>
		
		<label>Torne sua publicação mais acessível, adicione palavras-chave (pressione enter para adicionar outras)</label>
		
		<div class="chips" id="chips"></div>

   		<div class="center-align">

			<button class="btn" type="submit" id="submit">compartilhar</button>
			
		</div>

	</form>

</div>

<script src="{{ asset('js/posts/material.js') }}"></script>

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