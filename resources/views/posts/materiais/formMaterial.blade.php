<?php $type = "material" ?>

@extends('principal.principal')
@section('conteudo')

<div class="hoverable card post-form">

	<h3 class="center-align"><i class="fa fa-book"></i> Compartilhar material</h3>

	<br>

	<form action="/materiais/cadastrar" method="POST" enctype="multipart/form-data">

		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		@include('commom.tituloInput')

		@include('commom.descricaoInput')

		@include('commom.linkInput')
		

		<div class="file-field input-field">
      		<button class="btn">anexo</button>
        		
        	<input type="file" name="anexo" class="anexo">
      		
      		<div class="file-path-wrapper">
        		<input class="file-path validate anexo" type="text">
      		</div>
   		</div>
        	<input type="checkbox" id="noFile" class="filled-in">
        	<label for="noFile">Não possuo arquivo</label>

   		@if ($errors->has('anexo'))
		          <span class="red-text">
		          	{{ $errors->first('anexo') }}
		          </span>
		          <br>
        	@endif

   		<div class="center-align">

			<button class="btn" type="submit">compartilhar</button>
			
		</div>



	</form>

</div>



@stop