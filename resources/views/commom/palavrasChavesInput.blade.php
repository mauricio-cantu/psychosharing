<div class="input-field">

	<input type="hidden" style="display: none;" name="palavras_chave" id="palavras_chave">
	<label for="palavras_chave">Torne sua publicação mais visível, adicione palavras-chave (pressione enter para adicionar outras):</label>
	<br><br>

</div>

<div class="chips" id="chips"></div>

<script type="text/javascript">
	

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

	

</script>