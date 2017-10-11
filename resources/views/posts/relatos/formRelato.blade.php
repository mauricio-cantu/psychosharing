@extends('principal.principal')
@section('conteudo')

<div class="hoverable card post-form">

	<h3 class="center-align"><i class="fa fa-align-left"></i> Compartilhar relato</h3>

	<div id="errors" class="card errors"></div>

	<br>

	<!-- <form action="/relatos/cadastrar" method="post"> -->

		<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

		@include('commom.tituloInput')
		
		<div class="input-field">

			<textarea name="conteudo" id="conteudo" class="materialize-textarea validate {{ $errors->has('conteudo') ? 'invalid':'' }}" placeholder="Descreva aqui o seu relato de caso">{{ old('conteudo') ? old('conteudo') : '' }}</textarea>
			<label for="relato">Relato</label>

			@if ($errors->has('conteudo'))
		          <span class="red-text">
		          	{{ $errors->first('conteudo') }}
		          </span>
		          <br>
        	@endif

		</div>

		@include('commom.linhaInput')
	
		@include('commom.palavrasChavesInput')


		<div class="center-align">

			<button class="btn" onclick="cadastrarRelato()">compartilhar</button>
			
		</div>

	

</div>
<script src="{{ asset('js/posts/relato.js') }}"></script>

@stop