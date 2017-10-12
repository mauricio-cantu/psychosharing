// cadastrar exercício através de AJAX post

$('#submit').click(() => {
	cadastrarExercicio();
});

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
		success: (data) => {
			console.log(data.responseJSON);
			alertSuccess();			
		},
		error: (data) => {
			console.log(data.responseJSON);
		}
	});

}

getDetails = (id) => {

	$.ajax({
		type: 'get',
		url: '/testeJson/'+id,
		dataType: 'json'
	}).done((data) => {		
		$('#chips').material_chip({data:data.keys});
	});
	
}
