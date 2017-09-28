@extends('principal.principal')
@section('conteudo')

<div class="container hoverable z-depth-3" style="padding: 20px;">
	
	<h3 class="center-align"><i class="small material-icons">casino</i> Compartilhar exercícios</h3>
	
	<hr>

	<br>
	
	<form action="/exercicios/cadastrar" method="post">

		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<div class="input-field">

			<input type="text" name="titulo" id="titulo" class="validate {{ $errors->has('titulo') ? 'invalid':'' }}" value="{{ old('titulo') ? old('titulo') : '' }}">
			<label for="titulo">Título</label>

			@if ($errors->has('titulo'))
		          <span class="red-text">
		          	{{ $errors->first('titulo') }}
		          </span>
		          <br>
        	@endif

		</div>

		<div class="input-field">

			<textarea name="descricao" id="descricao" class="materialize-textarea validate {{ $errors->has('descricao') ? 'invalid':'' }}">{{ old('descricao') ? old('descricao') : '' }}</textarea>
			<label for="descricao">Descrição</label>

			@if ($errors->has('descricao'))
		          <span class="red-text">
		          	{{ $errors->first('descricao') }}
		          </span>
		          <br>
        	@endif

		</div>

		<div class="input-field">

			<textarea name="experiencia" id="experiencia" class="materialize-textarea validate {{ $errors->has('experiencia') ? 'invalid':'' }}">{{ old('experiencia') ? old('experiencia') : '' }}</textarea>
			<label for="experiencia">Comente sobre suas experiências anteriores com este exercício:</label>

			@if ($errors->has('experiencia'))
		          <span class="red-text">
		          	{{ $errors->first('experiencia') }}
		          </span>
		          <br>
        	@endif

		</div>

		<div class="input-field">

			<input type="text" name="linha_terapeutica" id="linha_terapeutica" class="validate {{ $errors->has('linha_terapeutica') ? 'invalid':'' }}" value="{{ old('linha_terapeutica') ? old('linha_terapeutica') : '' }}">
			<label for="linha_terapeutica">Este exercício está vinculado a alguma linha terapêutica? Informe abaixo:</label>

			@if ($errors->has('linha_terapeutica'))
		          <span class="red-text">
		          	{{ $errors->first('linha_terapeutica') }}
		          </span>
		          <br>
        	@endif

		</div>

		<div class="input-field">

			<input type="hidden" name="palavras_chave" id="palavras_chave">
			<label for="palavras_chave">Torne sua publicação mais visível, adicione palavras-chave:</label>
			<br><br>

		</div>

		<!-- <label for="chips">Torne sua publicação mais visível, adicione palavras-chave:</label> -->
		<div class="chips" id="chips"></div>

		<br>

		<div class="center-align">

			<button class="btn" type="submit">compartilhar</button>
			
		</div>


	</form>	

</div>	

<br>

<script type="text/javascript">
	
	$('.chips').material_chip();

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

	

	// $(document).ready(function(){
	// 	var data= $('#chips').material_chip('data');
	// 	alert(data[0].tag);
	// });

</script>

@stop