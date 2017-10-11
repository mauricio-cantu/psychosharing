// cadastrar exercício através de AJAX post
function cadastrarExercicio(){
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
			alertSuccess();			
		},
		error: function(data){
			console.log(data.responseText);
			showErrors(data);			
		}
	});

}

function getDetails(id){

	var myData;

	$.ajax({
		type: 'get',
		url: '/testeJson/'+id,
		dataType: 'json'
	}).done(function(data){		
		$('#chips').material_chip({data:data.keys});
	});
	
}
