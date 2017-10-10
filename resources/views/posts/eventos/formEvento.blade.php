<?php $type = "evento" ?>
@extends('principal.principal')
@section('conteudo')


<div class="hoverable card" style="padding: 40px;">

	<h3 class="center-align"><i class="fa fa-calendar"></i> Compartilhar evento</h3>

	<div id="errors" class="card" style="padding: 10px; padding-left: 20px; display:inline-block;"></div>

	<br>

	<!-- <form action="/eventos/cadastrar" method="post"> -->

		<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

		@include('commom.tituloInput')

		<div class="input-field">

			<input type="text" name="local" id="local" class="validate {{ $errors->has('local') ? 'invalid':'' }}" value="{{ old('local') ? old('local') : '' }}" placeholder="Ex.: Av. Protásio Alves, 2854 - Petrópolis, Porto Alegre">
			<label for="local">Onde acontecerá?</label>

			@if ($errors->has('local'))
		          <span class="red-text">
		          	{{ $errors->first('local') }}
		          </span>
		          <br>
		          <br>
        	@endif

		</div>

		<div class="input-field">
			<label>Quando acontecerá?</label>
			<input id="data" type="text" placeholder="Clique para escolher a data" class="datepicker" value="{{ old('data') ? old('data') : '' }}" name="data">

			@if ($errors->has('data'))
		          <span class="red-text">
		          	{{ $errors->first('data') }}
		          </span>
		          <br>
		          <br>
        	@endif
		</div>

		@include('commom.descricaoInput')

		@include('commom.linkInput')

		@include('commom.palavrasChavesInput')

		<div class="center-align">

			<button class="btn" onclick="cadastrarEvento()">compartilhar</button>
			
		</div>

	

<script src="{{ asset('js/posts.js') }}"></script>
@stop