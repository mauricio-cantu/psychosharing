@extends('principal.principal')
@section('conteudo')

<div class="hoverable card" style="padding: 20px;">

	<h3 class="center-align"><i class="fa fa-align-left"></i> Compartilhar relato</h3>

	<br>

	<form action="/relatos/cadastrar" method="post">

		<input type="hidden" name="_token" value="{{ csrf_token() }}">

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

			<button class="btn" type="submit">compartilhar</button>
			
		</div>

	</form>

</div>

@stop