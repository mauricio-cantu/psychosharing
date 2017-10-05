<?php $type = "exercício" ?>
@extends('principal.principal')

<!-- <head>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>


  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

 </head> -->

@section('conteudo')



<div class="hoverable card" style="padding: 20px;">
	
	

	<h3 class="center-align"><i class="fa fa-lightbulb-o"></i> Compartilhar exercícios e dicas</h3>
	
	<div id="errors" class="card" style="padding: 10px; display:none;"></div>

	<br>
	
	<!-- <form action="/exercici	os/cadastrar" method="post"> -->

		<input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
 
		@include('commom.tituloInput')

		@include('commom.descricaoInput')

		<!-- <div class="input-field">

			<input type="text" name="linha_terapeutica" id="linha_terapeutica" class="validate {{ $errors->has('linha_terapeutica') ? 'invalid':'' }}" value="{{ old('linha_terapeutica') ? old('linha_terapeutica') : '' }}">
			<label for="linha_terapeutica">Este exercício está vinculado a alguma linha terapêutica? Informe abaixo:</label>

			@if ($errors->has('linha_terapeutica'))
		          <span class="red-text">
		          	{{ $errors->first('linha_terapeutica') }}
		          </span>
		          <br>
        	@endif

		</div> -->

		@include('commom.linhaInput')

		@include('commom.palavrasChavesInput')

		<!-- <div class="input-field">

			<input type="hidden" style="display: none;" name="palavras_chave" id="palavras_chave">
			<label for="palavras_chave">Torne sua publicação mais acessível, adicione palavras-chave (pressione enter para adicionar outras):</label>
			<br><br>

		</div>
		
		<div class="chips" id="chips"></div> -->

		<br>

		<div class="center-align">

			<button class="btn" onclick="cadastrar()" id="submit">compartilhar</button>
			
		</div>


	</form>	

</div>	

<br>

<script type="text/javascript">
	function cadastrar(){
		var titulo = $('#titulo').val();
		var descricao = $('#descricao').val();
		var linha = $('#linha_terapeutica').val();
		var token = $('#token').val();
		var chips = $('#chips').material_chip('data');
		
		$.ajax({
			type: 'post',
			url: '/exercicios/cadastrar',
			data: {
				titulo: titulo,
				descricao: descricao,
				linha_terapeutica: linha,
				palavras_chave: chips,
				_token: token
			},
			dataType: 'json',
			success: function(data){
				console.log(data);
				// window.location = "http://localhost:8000/home";

			},
			error: function(data){
				console.log(data);
				var errors = data.responseJSON;

				$('#errors').empty();
				$('#errors').show();
				
				$.each(errors, function(key, value){
					$('#errors').append(value+'<br>');
				});
			}
		});


	}	
</script>

@stop