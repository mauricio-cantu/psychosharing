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
	
	

	<br>
	
	<form action="/exercicios/cadastrar" method="post">

		<input type="hidden" name="_token" value="{{ csrf_token() }}">

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

			<button class="btn" type="submit">compartilhar</button>
			
		</div>


	</form>	

</div>	

<br>

<!-- <script type="text/javascript">
	$(document).ready(function () {
		$('.chips').material_chip();
	});		

	var inputKeys = $('#palavras_chave');
	
	$('.chips').on('chip.add', function(e, chip){

		var atualiza;		
		var valAtual = inputKeys.val();
		
		if (valAtual == "") {
			var atualiza = chip.tag;
		}else{
			var atualiza = valAtual + ", " + chip.tag;	
		}
		
    	inputKeys.val(atualiza);
  	});

  	$('.chips').on('chip.delete', function(e, chip){

  		var atualizado = "";  		
  		var data = $('#chips').material_chip('data');
  		
  		$.each(data, function(index, value){
  			if (index == 0) {
  				atualizado += value.tag; 	
  			} else {
  				atualizado += ", " + value.tag; 
  			}
  			
  		});

  		inputKeys.val(atualizado);
  	});

	

</script> -->

@stop